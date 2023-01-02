<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $res = [
            'teams' => $teams,
           
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
        $team = Team::create([
            'name' => $request->name,
            'email' => $request->email,
            'sex' => $request->sex,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
            'phone' => $request->phone, 
            'address' => $request->address, 
            'join_date' => $request->join_date, 
            'status' => $request->status, 
            'post' => $request->post,
            'image'=> $image,
        ]);
        $res = [
            'teams' => $team,
            'message' => 'Team created succesfully',
           
        ];
        return response()->json($res, 200);
    }
    public function update(Request $request, $id)
    {
        $team = Team::where('id',$id)->first();
        $image = $team->image;
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image =  $image->move($destinationPath, $profileImage);

        }
        $team = Team::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'sex' => $request->sex,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
            'address' => $request->address, 
            'join_date' => $request->join_date, 
            'status' => $request->status, 
            'post' => $request->post,
            'image' => $image
        ]);
        $res = [
            'teams' => $team,
            'message' => 'Team Updated succesfully',
           
        ];
        return response()->json($res, 200); 
    }
    public function delete($id){
        $team = Team::find($id);
      
        if(!empty($team)){
            $team->delete();
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


