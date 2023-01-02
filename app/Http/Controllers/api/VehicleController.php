<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        $res = [
            'vehicles' => $vehicles,
           
        ];
        return response()->json($res, 200);
    }
    public function store(Request $request)
    {
        

        $vehicles = Vehicle::create([
            'name' => $request->name,
            'type' => $request->type,
            'model' => $request->model,
        ]);
        $res = [
            'vehicles' => $vehicles,
            'message' => 'vehicle created succesfully',
           
        ];
        return response()->json($res, 200);
    }
    public function update(Request $request, $id)
    {
       
        $vehicles = Vehicle::where('id',$id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'model' => $request->model,
        ]);
        $res = [
            'vehicles' => $vehicles,
            'message' => 'vehicle Updated succesfully',
           
        ];
        return response()->json($res, 200); 
    }
    public function delete($id){
      
        $vehicles = Vehicle::find($id);
           
        
        if(!empty($vehicles)){
            $vehicles->delete();
            $res = [
                
                'message' => 'vehicles deleted succesfully',
               
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
