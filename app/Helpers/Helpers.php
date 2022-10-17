<?php


use App\Models\Governorate;

function get_default_lang(){
    return Config::get('app.locale');
}


function returnSuccessMessage( $msg = "", $errNum="200", $data = null)
{
    return ['status' => 'true', 'errNum' => $errNum, 'msg' => $msg, 'data'=> $data];
}

function responseJson( $status="200", $msg = "", $data = null)
{
    return ['status' => $status, 'msg' => $msg, 'data'=> $data];
}
function smsMisr($to,$message)
{
    $url = 'https://smsmisr.com/api/webapi/?';
    $push_payload = array(
        "username" => "*****",
        "password" => "*****",
        "language" => "2",
        "sender" => "ipda3",
        "mobile" => '2' . $to,
        "message" => $message,
    );

    $rest = curl_init();
    curl_setopt($rest, CURLOPT_URL, $url.http_build_query($push_payload));
    curl_setopt($rest, CURLOPT_POST, 1);
    curl_setopt($rest, CURLOPT_POSTFIELDS, $push_payload);
    curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, true);  //disable ssl .. never do it online
    curl_setopt($rest, CURLOPT_HTTPHEADER,
        [
            "Content-Type" => "application/x-www-form-urlencoded"
        ]);
    curl_setopt($rest, CURLOPT_RETURNTRANSFER, 1); //by ibnfarouk to stop outputting result.
    $response = curl_exec($rest);
    curl_close($rest);
    return $response;
}
function notifyByFirebase($title,$body,$tokens,$data = [])        // paramete 5 =>>>> $type
{
    $registrationIDs = $tokens;
    $fcmMsg = array(
        'body' => $body,
        'title' => $title,
        'sound' => "default",
        'color' => "#203E78"
    );
    $fcmFields = array(
        'registration_ids' => $registrationIDs,
        'priority' => 'high',
        'notification' => $fcmMsg,
        'data' => $data
    );
    //dd(env('FIREBASE_API_ACCESS_KEY'));
    $headers = [
        'Authorization: key='.env('FIREBASE_API_ACCESS_KEY'),
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

