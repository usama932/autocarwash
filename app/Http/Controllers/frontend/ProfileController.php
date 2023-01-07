<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = User::where('id',auth()->user()->id)->first();
        if(auth()->user()->roled == 'admin'){
            return view('admin.profile.profile',compact('user'));
        }
        elseif(auth()->user()->roled == 'user'){
            return view('users.profile.profile',compact('user'));
        }
        else{
            return "404";
        }
        
    }
    public function update_profile(Request $request){
        $user = User::where('id',$request->id)->first();
        $image = $user->image;
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image =  $image->move($destinationPath, $profileImage);

        }
       
        $user = User::where('id',$request->id)->update([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  =>$request->password,
            'image'     => $image,
            'sex'       =>$request->sex,
            'mobile'    =>$request->mobile,
            'address'   =>$request->address, 
            'status'    =>$request->status,
        ]);
        return redirect()->back()->with('success',"Profile Updated Successfully");
    }
}
