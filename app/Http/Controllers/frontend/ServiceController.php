<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Service;
use Auth;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index',compact('services'));
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
        $service= Service::create($request->all());
        return redirect()->route('services.index')->with('success',"Service Created Successfully");     
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
        $service= Service::where('id',$id)->update([
            'name' =>$request->name ,
            'description' =>$request->description ,
            'vehicle' =>$request->vehicle ,
            'price' =>$request->price ,
            'washing_plan_1'=> $request->washing_plan_1,  
            'washing_plan_2'=> $request->washing_plan_2,
            'washing_plan_3' =>$request->washing_plan_3,
            'washing_plan_4' => $request->washing_plan_4,
        ]);
        return redirect()->route('services.index')->with('success',"Service Updated Successfully");    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
      
        if(!empty($service)){
            $service->delete();
            return redirect()->route('services.index')->with('danger','Deleted Succesfully');
        }
        else
        {
            return redirect()->route('services.index')->with('danger','Something went wrong');
            
        }
    }
}
