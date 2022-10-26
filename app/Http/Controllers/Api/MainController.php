<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Client;
use App\Traits\GeneralTrait;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function get_default_lang;
use function response;
use function returnSuccessMessage;

class MainController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function governorates()
    {
        $governorate = Governorate::where(function ($query){
            if (get_default_lang() === 'en'){
                $query->select('governorate_name_en')->get();
            } else {
                $query->select('governorate_name_ar')->get();
            }
        })->get();
        return returnSuccessMessage('success', '200', $governorate);
        //return response() ->json($response);

    }

    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use($request){
            if ($request->has('governorate_id'))
            {
                if (get_default_lang() === 'en') {
                    $query->select('city_name_en')->where('governorate_id', $request->governorate_id);
                }else{
                    $query->select('city_name_ar')->where('governorate_id', $request->governorate_id);
                }
            }
        })->get();

        $response = returnSuccessMessage('success', '200', $cities);
        return response() ->json($response);

    }

    public function settings()
    {
        $settings = Setting::all();
        return response() ->json(['success', '200', $settings]);

    }

    public function categories()
    {
        $categories = Category::all();
        return response() ->json(['success', '200', $categories]);

    }

    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();
        return response() ->json(['success', '200', $bloodTypes]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function posts()
    {
        $posts = Post::with('category')->paginate(10);
        return response() ->json(['success', '200', $posts]);

    }


    public function post(Request $request)
    {
        $rules = [
            'post_id' => 'required|exists:posts,id',
        ];

        $validator = validator()->make($request->all(),$rules);
        if ($validator->fails())
        {
            return response()->json([0,$validator->errors()->first(),$validator->errors()]);
        }

        $post = Post::where('id', $request->post_id)->get();

        return response()->json([1, 'Success', $post]);
    }

    public function postFavourite(Request $request)
    {
        //RequestLog::create([''=> $request->all(),'service' => 'post toggle favourite']);
        $rules = [
            'post_id' => 'required|exists:posts,id',
        ];

        $validator = validator()->make($request->all(),$rules);
        if ($validator->fails())
        {
            return response()->json([0,$validator->errors()->first(),$validator->errors()]);
        }
        $toggle = $request->user()->favourites()->toggle($request->post_id);
        return response()->json([1, 'Success', $toggle]);
    }

    public function toggleFavourite(Request $request)
    {
        $post_id = $request->post_id;
        $toggleFavourite = $request->user()->favourites()->toggle($post_id);
        return response()->json([1,'تم تبديل الحاله بنجاح', $toggleFavourite]);
    }
    /**
     * myFavourite a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function myFavourite(Request $request)
    {
        $posts = $request->user()->favourites()->latest()->paginate(20);
        return response()->json([1, 'Loaded...', $posts]);
    }

    public function donationRequest(Request $request)
    {
        $donation = DonationRequest::with('city', 'client')->find($request->donation_id);
        return response()->json([1, 'Loaded...', $donation]);
    }

    public function contact(Request $request)
    {
        $clientId = Auth::guard('api')->user();
        $message = Contact::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'client_id' => $clientId->id
        ]);
        return responseJson($message);
    }

}
