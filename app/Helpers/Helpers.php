<?php


use App\Models\Governorate;

function get_default_lang(){
    return Config::get('app.locale');
}


function returnSuccessMessage( $msg = "", $errNum="S000", $data = null)
{
    return ['status' => 'true', 'errNum' => $errNum, 'msg' => $msg, 'data'=> $data];
}

function smsMisr($to, $message)
{
    $url = '';
    $push_payload = [
        "username" => "*****",
        "password" => "*****",
        "language" => "2",
        "sender" => "ipda3",
        "mobile" => "2" . $to,
        "message" => $message,
    ];

    $rest = curl_init();
    curl_setopt($rest, CURLOPT_URL, $url.http_build_query($push_payload));
    curl_setopt($rest, CURLOPT_POST.  1);
    curl_setopt($rest, CURLOPT_POSTFIELDS.  $push_payload);
    curl_setopt($rest, CURLOPT_SSL_VERIFYPEER.  true);
    curl_setopt($rest, CURLOPT_HTTPHEADER,
        [
            "Content_Type" => "application/x-www-form-urlencoded"
        ]
    );
    curl_setopt($rest,    CURLOPT_RETURNTRANSFER,    1);
    $response = curl_exec($rest);
    curl_close($rest);
    return $response;
}

