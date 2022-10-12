<?php


use App\Models\Governorate;

function get_default_lang(){
    return Config::get('app.locale');
}


function returnSuccessMessage( $msg = "", $errNum="S000", $data = null)
{
    return ['status' => 'true', 'errNum' => $errNum, 'msg' => $msg, 'data'=> $data];
}
