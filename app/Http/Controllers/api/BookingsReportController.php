<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Team;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Bookings;
use Auth;

class BookingsReportController extends Controller
{
    public function index()
    {
        
        $bookings = Bookings::all();
        $res = [
            'bookings' => $bookings,
           
        ];
        return response()->json($res, 200);
    }
    public function store(Request $request)
    {   
       
       $booking = Bookings::create([
        'user'              => $request->user,
        'vehicle_type'      => $request->vehicle_type,
        'vehicle_no'        => $request->vehicle_no,
        'appointment_date'  => $request->appointment_date,
        'time_frame'        => $request->time_frame,
        'approx_hour'       => $request->approx_hour,
        'booked_by'         => auth()->user()->name,
        'discount'          => $request->discount,
        'status'            => 'pending',
        'service'           =>  $request->service,
       ]);
        $res = [
        'booking' => $booking,
        'message' => 'booking created succesfully',
       
        ];
        return response()->json($res, 200);
    }
    public function update(Request $request, $id)
    {
         
       $booking = Bookings::where('id',$id)->update([
        'user'              => $request->user,
        'vehicle_type'      => $request->vehicle_type,
        'vehicle_no'        => $request->vehicle_no,
        'appointment_date'  => $request->appointment_date,
        'time_frame'        => $request->time_frame,
        'approx_hour'       => $request->approx_hour,
        'booked_by'         => auth()->user()->name,
        'status'            => $request->status,
        'service'           =>  $request->service,
       ]);
       $res = [
        'booking' => $booking,
        'message' => 'booking updated succesfully',
       
        ];
        
        return response()->json($res, 200);
    }
    public function delete($id)
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
