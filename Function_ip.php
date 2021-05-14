<?php
function Getip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    /*
        go to ipinfo.io and take free api key;
    */
    /* api json ;
        "ip": "8.8.8.8",
        "city": "Mountain View",
        "region": "California",
        "country": "US",
        "loc": "37.3860,-122.0838",
        "postal": "94035",
        "timezone": "America/Los_Angeles"
    */
    $api_key = "";


    $details   = json_decode(file_get_contents("http://ipinfo.io/{$ip}?token={$api_key}"));
    $country   = $details -> country; 
    $hostname  = $details -> hostname;
    $city      = $details -> city;
    $ip        = $details -> ip;
    $time = date("M,d,Y h:i:s A");

    $ipinfo = $city."///".$ip."///".$country."///".$time;

    return $ipinfo;
}
echo Getip();




?>