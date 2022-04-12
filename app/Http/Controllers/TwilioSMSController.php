<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\SentData;

class TwilioSMSController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $receiverNumber = "+919791252556";
        $message = "SMS laravel";
        
        try {
  
            $account_sid = config("sms.TWILIO_SID");
            $auth_token = config("sms.TWILIO_TOKEN");
            $twilio_number = config("sms.TWILIO_FROM");
            
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            dd('SMS sent successfully'); 
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function sendSms(Request $request) {


        $receiverNumber = $request->input('phone_no');
        $message = $request->input('message');

        $account_sid = config("sms.TWILIO_SID");
        $auth_token = config("sms.TWILIO_TOKEN");
        $twilio_number = config("sms.TWILIO_FROM");
            
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($receiverNumber, [
            'from' => $twilio_number, 
            'body' => $message]);

        SentData::create([
            'phone_no' => $request->input('phone_no'),
            'message' => $request->input('message'),
        ]);

        return back()->with('status', 'Message sent Successfully');
       
    }
}
