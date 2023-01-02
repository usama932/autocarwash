<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('roled','user')->get();
        $res = [
            'customers' => $customers,
           
        ];
        return response()->json($res, 200);
    }
    public function store(Request $request)
    {
        $image = "unset";
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image =  $image->move($destinationPath, $profileImage);

        }
        $customers = User::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  =>Hash::make($request->password),
            'image'     => $image,
            'roled'     => 'user',
            'sex'       =>$request->sex,
            'mobile'    =>$request->mobile,
            'address'   =>$request->address, 
            'status'    =>$request->status,
        ]);
        $res = [
            'customers' => $customers,
            'message' => 'Team created succesfully',
           
        ];
        return response()->json($res, 200);
    }
    public function update(Request $request, $id)
    {
        
        $user = User::where('id',$id)->first();
        $image = $user->image;
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image =  $image->move($destinationPath, $profileImage);

        }
        $customers = User::where('id',$id)->update([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  =>Hash::make($request->password),
            'image'     => $image,
            'roled'     => 'user',
            'sex'       =>$request->sex,
            'mobile'    =>$request->mobile,
            'address'   =>$request->address, 
            'status'    =>$request->status,
        ]);
        $res = [
            'customers' => $customers,
            'message' => 'Team Updated succesfully',
           
        ];
        return response()->json($res, 200); 
    }
    public function delete($id){
        $customer = User::find($id);
      
        if(!empty($customer)){
            $customer->delete();
            $res = [
                
                'message' => 'Team deleted succesfully',
               
            ];
            return response()->json($res, 200); 
            
        }
        else
        {
            $res = [
                
                'message' => 'Something went wrong',
               
            ];
            return response()->json($res, 200); 
        }
    }
}
