<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Bookings; 

class HomeController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function about(){
        return view('frontend.about');
    }
    public function service(){
        return view('frontend.service');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function web_login(Request $request){
        
        $credentials = $request->only('email', 'password');
       
        if(Auth::attempt($credentials))
        {
            $user = User::where('email',$request->email)->first();
            if ($user->roled == 'admin') {
                $employees = Employee::count();
                $service_s  = Service::count();
                $vehicle  = Vehicle::count();
                $total_price = Bookings::where('status','complete')->sum('total_price');
                
                return view('admin.dashboard',compact('employees','service_s','vehicle','total_price'))->with('success','Login Successfully');
            }
            elseif($user->roled == 'user')
            {
                return view('admin.dashboard')->with('success','Login Successfully');
            }
            
            else{
                return "404";
            }
        }
        else{
            return redirect()->back()->with('success','Unauthroized user'); 
        }
        
        
       
    }
    public function front_login(Request $request){
        
        $credentials = $request->only('email', 'password');
       
        if(Auth::attempt($credentials))
        {
            $user = User::where('email',$request->email)->first();
            if($user->roled == 'user')
            {
                return back();
            }
            
            else{
                return "404";
            }
        }
        else{
            return redirect()->back()->with('success','Unauthroized user'); 
        }
        
        
       
    }

}
