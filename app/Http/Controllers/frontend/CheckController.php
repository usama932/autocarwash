<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class CheckController extends Controller
{
    public function index()
    {
        return view('admin.check')->with(['employees' => Employee::all()]);
    }

    public function CheckStore(Request $request)
    {
        
        if (isset($request->attd)) {
            foreach ($request->attd as $keys => $values) {
                
                foreach ($values as $key => $value) {
                  
                    if ($employee = Employee::whereId(request('emp_id'))->first()) {
                        if (
                            !Attendance::whereAttendance_date($keys)
                                ->whereEmp_id($key)
                                ->whereType(0)
                                ->first()
                        ) {
                            $data = new Attendance();
                            
                            $data->emp_id = $key;
                            $emp_req = Employee::whereId($data->emp_id)->first();
                            $data->attendance_time = Carbon::now();
                            $data->attendance_date = $keys;
                            $data->attendance_date = $keys;
                            $data->status = $value['status'];
                            $data->remarks = $value['remarks'];
                            // $emps = date('H:i:s', strtotime($employee->schedules->first()->time_in));
                            // if (!($emps >= $data->attendance_time)) {
                            //     $data->status = 0;
                           
                            // }
                            $data->save();
                        }
                    }
                }
            }
        }
        // if (isset($request->leave)) {
        //     foreach ($request->leave as $keys => $values) {
        //         foreach ($values as $key => $value) {
        //             if ($employee = Employee::whereId(request('emp_id'))->first()) {
        //                 if (
        //                     !Leave::whereLeave_date($keys)
        //                         ->whereEmp_id($key)
        //                         ->whereType(1)
        //                         ->first()
        //                 ) {
        //                     $data = new Leave();
        //                     $data->emp_id = $key;
        //                     $emp_req = Employee::whereId($data->emp_id)->first();
        //                     $data->leave_time = $emp_req->schedules->first()->time_out;
        //                     $data->leave_date = $keys;
        //                     // if ($employee->schedules->first()->time_out <= $data->leave_time) {
        //                     //     $data->status = 1;
                                
        //                     // }
        //                     // 
        //                     $data->save();
        //                 }
        //             }
        //         }
        //     }
        // }
        
        return back()->with('success', 'You have successfully submited the attendance !');
    }
    public function sheetReport()
    {

    return view('admin.sheet-report')->with(['employees' => Employee::all()]);
    }
}
