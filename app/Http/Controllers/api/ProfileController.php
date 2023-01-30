<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class ProfileController extends Controller
{
    public function index(){
        $user = User::where('id',auth()->user()->id)->first();
        $res = [
            'user' => $user,
           
        ];
        return response()->json($res, 200);
        
    }
    public function update_profile(Request $request){
        $user = User::where('id',$request->id)->first();
        $image = null;
        if(!empty($request->image)){
            $image = $user->image;
        }

       
        
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
        $res = [
            'user' => $user,
            'message' => 'user Updated succesfully',
        ];
        return response()->json($res, 200);
        
    }
}
