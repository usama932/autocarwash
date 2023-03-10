<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Service;
use Auth;
 
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.index',compact('teams'));
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
        return redirect()->route('teams.index')->with('success',"Team Created Successfully");  
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
            'phone' => $request->phone, 
            'address' => $request->address, 
            'join_date' => $request->join_date, 
            'status' => $request->status, 
            'post' => $request->post,
            'image' => $image
        ]);
        return redirect()->route('teams.index')->with('success',"Team Updated Successfully");  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        if(!empty($team)){
            $team->delete();
            return redirect()->route('teams.index')->with('danger',"Team Deleted Successfully");  
        }
        else
        {
            return redirect()->route('teams.index')->with('danger',"Something went wrong"); 
        }
       
    }
}
