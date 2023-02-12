<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Remarks;
use Carbon\Carbon;

class CheckController extends Controller
{
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
                                $data->save();
                               
                               
                        }
                    }
                }
                
                
            }
            foreach ($request->remark as $keys => $values) {
                
                foreach ($values as $key => $value) 
                {
                    $data = Attendance::where('emp_id',$request->emp_id )->where('attendance_date',$keys)
                                        ->first();
                    if($value != null && $data != null){
                        if( !Remarks::whereAttendance_date($keys)
                        ->whereEmp_id($key)
                        ->whereAttendance_id($data->id)
                        ->first()){
                            $remark = new Remarks();
                            $remark->attendance_id = $data->id;
                            $remark->remarks = $value;
                            $remark->emp_id = $data->emp_id;
                            $remark->attendance_date = $data->attendance_date;
                            $remark->save();
                        }
                        
                    }
                   
            
                }
            }

        }
        
       
        
        return back()->with('success', 'You have successfully submited the attendance !');
    }
     public function newAttandance(Request $request){
        $check = new Attendance;
       
        $emp_req = Employee::where('id',$request->emp_id)->first();
      
        $check->emp_id = $emp_req->id;
        $check->attendance_time = date("Y-m-d H:i:s");
        $check->attendance_date = $request->attendance_date;
        $check->status = $request->status;
        $check->save();
        if($request->remarks){
            $remark = new Remarks();
            $remark->attendance_id = $check->id;
            $remark->remarks = $request->remarks;
            $remark->emp_id = $check->emp_id;
            $remark->attendance_date = $check->attendance_date;
            $remark->save();
        }
      
          
            
        
        $res = [
            'data' => $check,
            'remark' => $remark,
            'message' => 'Attended mark succesfully',
           
        ];
        return response()->json($res, 200);
    }
    public function updateAttandance(Request $request){

        if($request->id){
            $check =Attendance::where('id','$request->id')->where('attendance_date',$request->attendance_date)
                                ->where('emp_id',$request->emp_id)->update([
                                   'status' => $request->status,
                                ]);
        }
        if($request->remark_id){
            $remarks =Remarks::where('id','$request->remark_id')->where('attendance_date',$request->attendance_date)
                                ->where('emp_id',$request->emp_id)->update([
                                   'remarks' =>  $request->remarks,
                                ]);
        }
       
        $res = [
           
            'message' => 'Attended updated succesfully',
           
        ];
        return response()->json($res, 200);
    }
    public function sheetReport()
    {
    $attendence = Attendance::all();
    $remarks = Remarks::all();
    $employee = Employee::all();
    $res = [
        'attendence' => $attendence,
        'remarks' => $remarks,
        'employee' => $employee,
    ];
    return response()->json($res, 200);
   
    }
}
