<?php

function sdevs_send_sms($phone_number, $content)
{
    $sid = get_option("twilio_sid");
    $token = get_option("twilio_token");

    $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $sid . '/Messages.json';
    $myvars = 'To=' . $phone_number . '&Body=' . $content . '&From=' . get_option("twilio_sending_phone_number");

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
    curl_setopt($ch, CURLOPT_USERPWD, $sid . ':' . $token);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $response = json_decode($response);
}
