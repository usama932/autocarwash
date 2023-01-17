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
use Auth;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::pluck('id','name');
        $vehicles = Vehicle::pluck('id','name');
        $bookings = Bookings::where('user_id',auth()->user()->id)->get();
        return view('users.bookings.index',compact('bookings','vehicles','services'));
    }

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
            'vehicle_type'      => 'required',
            'vehicle_no'        => 'required', 
            'appointment_date'  => 'required',  

         ]);
       $booking = Bookings::create([
        'user_id'           => auth()->user()->id,
        'user'              => auth()->user()->name,
        'vehicle_type'      => $request->vehicle_type,
        'vehicle_no'        => $request->vehicle_no,
        'appointment_date'  => $request->appointment_date,
        'time_frame'        => $request->time_frame,
        'approx_hour'       => $request->approx_hour,
        'booked_by'         => auth()->user()->name,
        'discount'          => '5',
        'status'            => 'pending',
        'service'           =>  $request->service,
       ]);
       return redirect()->route('user_booking.index')->with('success',"Service Created Successfully");
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
            return redirect()->route('user_booking.index')->with('danger','Deleted Succesfully');
        }
        else
        {
            return redirect()->route('user_booking.index')->with('danger','Something went wrong');
            
        }
    }
}
