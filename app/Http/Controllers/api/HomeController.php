<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reward;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Bookings; 


class HomeController extends Controller
{
    public function login(Request $request)
        {
            $data = $request->validate([
                'email' => 'required',
                'password' => 'required|string'
            ]);

            $user = User::where('email', $data['email'])->orwhere('mobile',$request->email)->first();

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
            'mobile' => 'required|numeric|unique:users,mobile',
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
        if(!empty($rewards)){
            $reward = $rewards->uuid % 10 ;
            if( $reward == '0'){
                $reward = 'Congratulation ..! Your Next  Booking is  free. (Only Valid For Premium Service)';
            }
            else{
                $reward = 'Book More Get Free';
            }
        }
       
        $res = [
            'reward' => $rewards,
          
        ];
        return response()->json($res, 200);
    }
    public function dashboard(){
        $employees = Employee::count();
        $services  = Service::count();
        $vehicle  = Vehicle::count();
        $total_price = Bookings::where('status','complete')->sum('total_price');
        $res = [
            'employees' => $employees,
            'services' => $services,
            'vehicle' => $vehicle,
            'total_earnings' => $total_price,
        ];

        return response()->json($res, 200);
    }
}
