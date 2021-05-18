<?php

namespace SpringDevs\SMS\Ajax;

/**
 * Verify Class
 */
class Verify
{

    /**
     * Initialize the class
     */
    public function __construct()
    {
        add_filter('sms_verify_api_twilio', [$this, 'twilio_api_verify'], 10, 2);
    }

    public function twilio_api_verify(array $result, array $post_data)
    {
        $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $post_data['twilio_sid'] . '/IncomingPhoneNumbers.json?Beta=false';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, $post_data['twilio_sid'] . ':' . $post_data['twilio_token']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $response = json_decode($response);

        if (isset($response->status) && $response->status == 401) {
            return ['result' => false, 'msg' => 'Wrong API Credentials !!'];
        } else {
            $incoming_phone_numbers = [];
            if (isset($response->incoming_phone_numbers) && is_array($response->incoming_phone_numbers)) {
                foreach ($response->incoming_phone_numbers as $r_incoming_phone_number) {
                    array_push($incoming_phone_numbers, $r_incoming_phone_number->phone_number);
                }
            }

            if (!in_array($post_data['twilio_sending_phone'], $incoming_phone_numbers)) {
                return ['result' => false, 'msg' => 'Sender phone number not found !!'];
            }
        }

        return $result;
    }
}
