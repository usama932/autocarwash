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
         $reward = Reward::where('user_id',auth()->user()->id)->first();
         $services = Service::where('id',$request->service)->first();
         $discount = '5';
         $totol_price = $services->price;
         if($request->polish == "yes"){
            $totol_price = $totol_price + 35;
         }
         if(!empty($reward) ){
            if($reward->uuid >= 10){
                $reward2 = $reward->uuid % 10;
                if($reward2 == 0){
                    $discounted_price = $totol_price;
                    $discount = 'full free';
                }
                else{
                    $discounted_price = ($totol_price * 5)/100;
                }
            }
            else{
                $discounted_price = ($totol_price * 5)/100;
            }
           
         }
         else{
            $discounted_price = ($totol_price * 5)/100;
         }
      
         $totol_price = $totol_price - $discounted_price;
       $booking = Bookings::create([
        'user_id'           => auth()->user()->id,
        'user'              => auth()->user()->name,
        'vehicle_type'      => $request->vehicle_type,
        'vehicle_no'        => $request->vehicle_no,
        'appointment_date'  => $request->appointment_date,
        'time_frame'        => $request->time_frame,
        'approx_hour'       => $request->approx_hour,
        'booked_by'         => auth()->user()->name,
        'discount'          => $discount,
        'status'            => 'pending',
        'service'           =>  $services->name,
        'service_id'         => $services->id,
        'polish'            => $request->polish,
        'total_price'       =>  $totol_price,
        'dis_price'          =>  $discounted_price
       ]);
       
      
       if(empty($reward)){
       
        $reward = Reward::create([

            'user_id' => $booking->user_id,
            'uuid' => 1
        ]);
       }
       else{
        
        $reward = Reward::where('id',$reward->id)->update([
            'user_id' => $booking->user_id,
            'uuid' => $reward->uuid + 1  
        ]);
       }
       return redirect()->route('user_booking.index')->with('success',"Booking Created Successfully");
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
