<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
      
      User::where('id',auth()->user()->id)->update([
        'device_token' => $request->token,
      ]);
     
      $res = [
       
        'message' => 'Token successfully stored.', ];
       
    }

    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();
            
        $serverKey = 'AAAA3IK0XVg:APA91bHpQ0h-46pABfk7NXI8LV7aHbG2feTW489i6vsrvdKz7zUYwTqqWM7H0abTxignxGUAIO-k3eX34wPgNn_KITxoJa0upMGexfTeFZr5MfjLi7BQWiFZzu1Yg_IbOHQxbpCkhXfV'; // ADD SERVER KEY HERE PROVIDED BY FCM
    
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }     

        // Close connection
        curl_close($ch);
        // FCM response
        $res = [
            'notification' => $result,
            'message' => $result,
           
            ];
            return response()->json($res, 200);
        
    }
    public function create(Request $request)
    {
        return view('admin.notfication.create');
    }
}