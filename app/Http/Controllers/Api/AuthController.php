<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Token;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{


    public function registerToken(Request $request)
    {
        $validation = validator::make($request->all(), [

            'token' => 'required',
            'type' => 'required|in:android,ios'
        ]);
        if ($validation->fails()) {
            $data = $validation->errors();
            return response()->json(0, $validation->errors()->first(), $data);
        }
        Token::where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return response()->json(1, 'تم التسجيل بنجاح');
    }

    public function removeToken(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'token' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return response()->json(0, $validation->errors()->first(), $data);
        }

        Token::where('token', $request->token)->delete();
        return response()->json('token', 'تم الحذف بنجاح');
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'd_o_b' => 'required',
            'blood_type_id' => 'required',
            'last_donation_date' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required|unique:clients',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails())
        {
            return response()->json([0, $validator->errors()->first(), $validator->errors()]);
        }

        $request->merge([
            'password'=> bcrypt($request->password),
            ]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        return response()->json([1, 'Client is added successfully', $client]);
    }

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(0, $validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('phone', $request->phone)->first();

        if ($client) {

            if (Hash::check($request->password, $client->password)) {
                return response()->json([1, 'تم تسجيل الدخول بنجاح',
                    'api_token' => $client->api_token,
                    'client' => $client
                ]);

            } else {
                return response()->json([0, 'بيانات الدخول غير صحيحة']);
            }
        }else {
                return response()->json([0, 'بيانات الدخول غير صحيحة']);

        }
    }

    public function resetPassword(Request $request){
        $validator = validator()->make($request->all(),[
            'phone' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(0,$validator->errors()->first(),$validator->errors());
        }

        $user = Client::where('phone',$request->phone)->first();
        if($user){
            $code = rand(1111, 9999);
            $update = $user->update(['pin_code' => $code]);
            if ($update) {
                smsMisr($request->phone,"your reset code is : " . $code);

                // send sms

                // send email



                return response()->json([1, 'برجاء فحص هاتفك', ['pin_code' => $code]]);
            } else {
                return response()->json([0, 'حدث خطأ ، حاول مرة اخرى']);
            }

        } else {
            return response()->json([0, 'حدث خطأ ، حاول مرة اخرى']);
        }
    }
  public function profile(Request $request)
  {
      $validation = validator()->make($request->all(), [
          'password' => 'confirmed',
          'email' => Rule::unique('clients')->ignore($request->user()->id),
          'phone' => Rule::unique('clients')->ignore($request->user()->id),
      ]);

      if ($validation->fails()) {
          $data = $validation->errors();
          return response()->json([0, $validation->errors()->first(), $data]);
      }

      $loginUser = $request->user();
      //$request->merge([]);
      $loginUser->update($request->all());

      if ($request->has('password'))
      {
          $loginUser->password = bcrypt($request->password);
      }

      $loginUser->save();


      if ($request->has('governorate_id'))
      {
          $loginUser->cities()->detach($request->city_id);
          $loginUser->cities()->attach($request->city_id);
      }


      if ($request->has('blood_type_id'))
      {
          $bloodType = BloodType::where('id', $request->blood_type_id)->first();
          $loginUser->bloodType()->detach($bloodType->id);
          $loginUser->bloodType()->attach($bloodType->id);
      }

      $data = [
          'user' => $request->user()->fresh()->load('carModel', 'photos', 'trustIcons')
      ];

      return response()->json([1, 'تم تحديث البيانات', $data]);
  }
}
