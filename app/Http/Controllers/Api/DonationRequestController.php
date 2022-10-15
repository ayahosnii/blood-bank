<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\Token;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function donationRequestCreate(Request $request)
    {
        $rules = [
            'patient_name' => 'required',
            'patient_age' => 'required:digits',
            'blood_type_id' => 'required',
            'bags_num' => 'required:digits',
            'hospital_address' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits:11',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['0', $validator->errors()->first(), $validator->errors()]);
        }
        // Create Donation Request
        $donationRequest = DonationRequest::create($request->all());

        //Find clients suitable for this donation request
        $clientsIds = $donationRequest->city->governorate
            ->client()->whereHas('bloodtypes', function ($q) use ($request) {
                $q->where('blood_types.id', $request->blood_type_id);
            })->pluck('clients.id')->toArray();





        if (count($clientsIds))
        {
            $notification = $donationRequest->notifications()->create([
                'title' => $request->user()->bloodtypes->name.'احتاج متبرع للفصيلة',
                'content' => $request->user()->name.'محتاج متبرع للفصيلة'
            ]);
        }

        $notification->clients()->attach($clientsIds);

        // Get Tokens For FCM (Push Notification Using Firebase Cloud)

        $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', null)->pluck('token')->toArray();

        if (count($tokens)) {

            $title = $notification->title;
            $body = $notification->content;
            $data = [

                'donation_request_id' => $donationRequest->id
            ];

            $send = notifyByFirebase($title, $body, $tokens, $data);
            return $send;
        }


        return response() ->json(['1', 'تم الاضافة بنجاح', $donationRequest]);

    }
}

?>
