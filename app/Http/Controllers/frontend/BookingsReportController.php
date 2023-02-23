<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Team;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Bookings;
use App\Models\Reward;
use Auth;

class BookingsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('roled','!=','admin')->get(); 
        $services = Service::pluck('id','name');
        $vehicles = Vehicle::pluck('id','name');
        $bookings = Bookings::all();
        return view('admin.bookings.index',compact('bookings','vehicles','services','users'));
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
     
        $this->validate($request,[
            'service'=>'required',
            'user'=>'required',
            'vehicle_type'      => 'required',
            'vehicle_no'        => 'required', 
            'appointment_date'  => 'required',  

         ]);
         $services = Service::where('id',$request->service)->first();
        //  $discounted_price = 0;
        //  if($$requestdiscount > 0){
        //     $discounted_price = $services->price - ($services->price * discount / 100);
        //  }
        $totol_price = $services->price;
         if($request->polish == "yes"){
            $totol_price = $services->price + 35;
         }
       $booking = Bookings::create([
        'user'              => $request->user,
        'vehicle_type'      => $request->vehicle_type,
        'vehicle_no'        => $request->vehicle_no,
        'appointment_date'  => $request->appointment_date,
        'time_frame'        => $request->time_frame,
        'approx_hour'       => $request->approx_hour,
        'booked_by'         => auth()->user()->name,
        // 'discount'          => $request->discount,
        'polish'            => $request->polish,
        'status'            => 'pending',
        'service'           =>  $services->name,
        'service_id'         => $services->id,
        'total_price'       =>  $totol_price,
        // 'dis_prce'          =>  $discounted_price
       ]);
       return redirect()->route('bookings.index')->with('success',"Booking Created Successfully");
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
           $this->validate($request,[
            'user'=>'required',
            'vehicle_type'      => 'required',
            'vehicle_no'        => 'required', 
            'appointment_date'  => 'required',  

         ]);
         $services = Service::where('id',$request->service)->first();
       $booking = Bookings::where('id',$id)->update([
        'user'              => $request->user,
        'vehicle_type'      => $request->vehicle_type,
        'vehicle_no'        => $request->vehicle_no,
        'appointment_date'  => $request->appointment_date,
        'time_frame'        => $request->time_frame,
        'approx_hour'       => $request->approx_hour,
        'booked_by'         => auth()->user()->name,
        'status'            => $request->status,
        'total_price'       => $request->totol_price,
        'service'           =>  $services->name,
        'service_id'         => $services->id,
       ]);
       return redirect()->route('bookings.index')->with('success',"Booking Updated   Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $booking = Bookings::find($id);
      
        if(!empty($booking)){
            $booking->delete();
            return redirect()->route('bookings.index')->with('danger','Deleted Succesfully');
        }
        else
        {
            return redirect()->route('bookings.index')->with('danger','Something went wrong');
            
        }
    }
}
