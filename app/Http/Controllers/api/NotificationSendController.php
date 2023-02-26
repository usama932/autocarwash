<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
      
        if(empty(auth()->user()->device_token)){
            User::where('id',auth()->user()->id)->update([
                'device_token' => $request->token,
              ]);
          }

        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $request)
    {
       dd($request->all());
}
}