<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Service;
use App\Models\Vehicle;
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
      
        $vehicles = Vehicle::pluck('id','name');
        return view('admin.services.index',compact('services','vehicles'));
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
            'category' => $request->category,
            'is_popular'=> $request->is_popular,  
            
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
