<?php

use Twilio\Rest\Client;

function sdevs_send_sms($phone_number, $content)
{
    $sid    = get_option("twilio_sid");
    $token  = get_option("twilio_token");

    $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

    try {
        $swissNumberProto = $phoneUtil->parse($phone_number, WC()->customer->get_billing_country());
        $formatted_phone_number = $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);

        $twilio = new Client($sid, $token);

        $message = $twilio->messages
            ->create(
                $formatted_phone_number, // to
                array(
                    "from" => get_option("twilio_sending_phone_number"),
                    "body" => $content
                )
            );

    } catch (\libphonenumber\NumberParseException $e) {

    }
}
