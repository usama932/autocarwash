<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $res = [
            'services' => $services,
           
        ];
        return response()->json($res, 200);
    }
    public function store(Request $request)
    {
        

        $service = Service::create([
            'name' =>$request->name ,
            'description' =>$request->description ,
            'vehicle' =>$request->vehicle ,
            'price' =>$request->price ,
            'washing_plan_1'=> $request->washing_plan_1,  
            'washing_plan_2'=> $request->washing_plan_2,
            'washing_plan_3' =>$request->washing_plan_3,
            'washing_plan_4' => $request->washing_plan_4,
        ]);
        $res = [
            'services' => $service,
            'message' => 'service created succesfully',
           
        ];
        return response()->json($res, 200);
    }
    public function update(Request $request, $id)
    {
       
        $service = Service::where('id',$id)->update([
            'name' =>$request->name ,
            'description' =>$request->description ,
            'vehicle' =>$request->vehicle ,
            'price' =>$request->price ,
            'washing_plan_1'=> $request->washing_plan_1,  
            'washing_plan_2'=> $request->washing_plan_2,
            'washing_plan_3' =>$request->washing_plan_3,
            'washing_plan_4' => $request->washing_plan_4,
        ]);
        $res = [
            'services' => $service,
            'message' => 'service Updated succesfully',
           
        ];
        return response()->json($res, 200); 
    }
    public function delete($id){
        $service = Service::find($id);
      
        if(!empty($service)){
            $service->delete();
            $res = [
                
                'message' => 'service deleted succesfully',
               
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
