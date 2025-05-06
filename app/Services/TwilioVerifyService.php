<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioVerifyService
{
    protected $twilio;
    protected $verifySid;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $this->verifySid = config('services.twilio.verify_sid');

        $this->twilio = new Client($sid, $token);
    }

    public function sendOTP($phone)
    {
        // ✅ Format phone number to E.164
        $formattedPhone = '+880' . ltrim($phone, '0');

        return $this->twilio->verify->v2->services($this->verifySid)
            ->verifications
            ->create($formattedPhone, 'sms');
    }

    public function verifyOTP($phone, $code)
    {
        $formattedPhone = '+880' . ltrim($phone, '0');

        return $this->twilio->verify->v2->services($this->verifySid)
            ->verificationChecks
            ->create([
                'to' => $formattedPhone,
                'code' => $code,
            ]);
    }
}
