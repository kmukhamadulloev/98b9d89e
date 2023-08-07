<?php

namespace App\Core;

use Twilio\Rest\Client;

class SmsSender
{
    private Client $twilio;

    public function __construct()
    {
        $this->twilio = new Client(SMS_USER_ID, SMS_AUTH_KEY);
    }

    public function sendSms(string $toNumber, string $message) : bool
    {
        try {
            $this->twilio->messages->create(
                $toNumber,
                [
                    'from' => SMS_NUMBER,
                    'body' => $message,
                ]
            );
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}