<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reward;
use Illuminate\Support\Facades\Hash;
use Response;

class HomeController extends Controller
{
    public function login(Request $request)
        {
            $data = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);

            $user = User::where('email', $data['email'])->first();

            if (!$user || !Hash::check($data['password'], $user->password)) {
                return response([
                    'msg' => 'incorrect username or password'
                ], 401);
            }

            $token = $user->createToken('apiToken')->plainTextToken;

            $res = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json($res, 200);
        }
    public function sign_up(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile' => $request->mobile,   
            'roled' => 'user'
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($res, 200);
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }
    public function reward()
    {
        $rewards = Reward::where('user_id',auth()->user()->id)->first();
        $reward = $rewards->uuid % 10 ;
        if($reward > 10 || $reward == 0){
            $reward = 'Congratulation ..! Your Next  Booking is  free. (Only Valid For Premium Service)';
        }
        else{
            $reward = 'Book More Get Free';
        }
        $res = [
            'reward' => $reward,
          
        ];
        return response()->json($res, 200);
    }
}
