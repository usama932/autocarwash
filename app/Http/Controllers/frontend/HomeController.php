<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
                
                return view('admin.dashboard');
            }
            elseif($user->roled == 'user')
            {
                return view('admin.dashboard');
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
