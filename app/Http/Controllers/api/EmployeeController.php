<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Role;

class EmployeeController extends Controller
{
    public function index()
    {
        
        $employees =  Employee::all();
        $res = [
            'employees' => $employees,
           
        ];
        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
       
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;
        $employee->pin_code = bcrypt('123456');
        $employee->save();
        $res = [
            'employee' => $employee,
            'message' => 'employee created succesfully',
           
            ];
            return response()->json($res, 200);
       
    }

 
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;
        $employee->mobile = $request->mobile;
        $employee->pin_code = bcrypt('123456');
        $employee->save();

        // $employee = Employee::where('id',$id)->update([
        //         'name' => $request->name,
        //         'position' => $request->position,
        //         'email' => $request->email,
        // ]);
        $res = [
            'employee' => $employee,
            'message' => 'employee updated succesfully',
           
            ];
            return response()->json($res, 200);
    }


    public function destroy($id)
    {
        $employee = Employee::find($id);
      
        if(!empty($employee)){
            $employee->delete();
            $res = [
                'employee' => $employee,
                'message' => 'employee deleted succesfully',
               
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
