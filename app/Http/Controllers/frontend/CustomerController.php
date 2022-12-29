<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('roled','user')->get();
        return view('admin.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('customers.index')->with('success',"Customer created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'password'  =>$request->password,
            'image'     => $image,
            'sex'       =>$request->sex,
            'mobile'    =>$request->mobile,
            'address'   =>$request->address, 
            'status'    =>$request->status,
        ]);
        return redirect()->route('customers.index')->with('success',"Customer Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = User::find($id);
        if(!empty($customer)){
            $customer->delete();
            return redirect()->route('customers.index')->with('danger',"customer Deleted Successfully");  
        }
        else
        {
            return redirect()->route('customers.index')->with('danger',"Something went wrong"); 
        }
       
    }
}
