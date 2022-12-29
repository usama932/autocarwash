<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicle.index',compact('vehicles'));
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
        $vehicles = Vehicle::create([
            'name' => $request->anme,
            'type' => $request->type,
            'model' => $request->model,
        ]);
        return redirect()->route('vehicles.index')->with('success',"Vehicles Created Successfully");     
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
        $vehicles = Vehicle::where('id',$id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'model' => $request->model,
        ]);
        return redirect()->route('vehicles.index')->with('success',"Vehicles Updated Successfully");     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $vehicles = Vehicle::find($id);
          
        if(!empty($vehicles)){
            $vehicles->delete();
            return redirect()->route('vehicles.index')->with('danger',"Vehicles deleted Successfully");    
        }
        else
        {
            return redirect()->route('vehicles.index')->with('danger',"Something went wrong");    
            
        } 
    }
}
