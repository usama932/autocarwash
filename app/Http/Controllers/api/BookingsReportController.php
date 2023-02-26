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
use App\Models\Reward;
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
       
        $services = Service::where('id',$request->service)->first();
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
            'status'            => 'pending',
            'service'           => $services->name,
            'polish'            => $request->polish,
            'total_price'       => $totol_price,
            'service_id'        => $services->id,
         ]);
        $res = [
        'booking' => $booking,
        'message' => 'booking created succesfully',
       
        ];
        return response()->json($res, 200);
    }
    public function update(Request $request, $id)
    {
  
        $services = Service::where('id',$request->service)->first();
        $as = Bookings::where('id',$id)->first();
        dd($as);
        $booking = Bookings::where('id',$id)->update([
        'user'              => $request->user,
        'vehicle_type'      => $request->vehicle_type,
        'vehicle_no'        => $request->vehicle_no,
        'appointment_date'  => $request->appointment_date,
        'time_frame'        => $request->time_frame,
        'approx_hour'       => $request->approx_hour,
        'status'             => $request->status,
         'service'           =>  $services->name,
         'total_price'       => $request->totol_price,
         'service_id'        => $services->id,
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
            $res = [
                'booking' => $booking,
                'message' => 'booking deleted succesfully',
               
                ];
                
                return response()->json($res, 200);
        }
        else
        {
            $res = [
                
                'message' => ' Something went wrong',
               
                ];
                
                return response()->json($res, 200);
            
        }
    }
}
