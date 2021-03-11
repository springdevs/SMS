<?php

use Twilio\Rest\Client;

function sdevs_send_sms($phone_number, $content)
{
    $sid = get_option("twilio_sid");
    $token = get_option("twilio_token");

    $twilio = new Client($sid, $token);

    $message = $twilio->messages
        ->create(
            $phone_number, // to
            array(
                "from" => get_option("twilio_sending_phone_number"),
                "body" => $content
            )
        );
}
