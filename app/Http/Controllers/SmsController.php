<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendSms(){
        $account_sid = getenv('TWILIO_SID');
        $auth_token = getenv('TWILIO_TOKEN');
        $senderNumber = getenv('TWILIO_WHATSAPP_NUMBER');
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
        
        // A Twilio number you own with SMS capabilities
        $twilio_number = "+15017122661";
        
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            '+963930753380',
            array(
                'from' => $senderNumber,
                'body' => 'this meassage from Medicine dose tracker'
            )
        );
        dd('message sended successfuly');
    }
}
