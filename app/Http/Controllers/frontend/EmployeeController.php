<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Role;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.employee')->with(['employees'=> Employee::all()]);
    }

    public function store(Request $request)
    {
       
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->pin_code = bcrypt($request->_token);
        $employee->save();

        return redirect()->route('employees.index')->with('Success','Employee Record has been created successfully !');
    }

 
    public function update(Request $request, $id)
    {
       
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->pin_code = bcrypt($request->_token);
        $employee->save();

       

        

        return redirect()->route('employees.index')->with('success','Employee Record has been Updated successfully !');
    }


    public function destroy($id)
    {
        $employee = Employee::find($id);
      
        if(!empty($employee)){
            $employee->delete();
            return redirect()->route('employees.index')->with('danger','Deleted Succesfully');
            
        }
        else
        {
            return redirect()->route('employees.index')->with('danger','Something went wrong');
           
            
        }
       
    }
}
