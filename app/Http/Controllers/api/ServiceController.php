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
            'category' => $request->category,
            'is_popular'=> $request->is_popular,  
            'is_push'=> $request->is_push,
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
            'category' => $request->category,
            'is_popular'=> $request->is_popular,  
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
