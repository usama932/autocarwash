@extends('layouts.admin')
@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
        type="text/css" media="screen">
    <style>
        th, td {
            white-space: nowrap;
        }

        .first-col {
            position: absolute;
            width: 5em;
            margin-left: -1em;
        }

        .table-wrapper {
            overflow-x: scroll;
            width:100%;
          
        }
    </style>
@endsection
@section('content')

    <div class="card">
        <div class="card-header bg-success text-white">
            TimeTable
        </div>
        <div class="card-body">
            <div class="table-wrapper">
                <table id="example" class="table table-bordered table-striped table-hover w-100">
                    <thead>
                        <tr >

                            <th class="first-col w-100">Employee Name</th>
                            <th>Employee Position</th>
                            <th>Employee ID</th>
                            @php
                                $today = today();
                                $dates = [];
                                
                                for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                                    $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                }
                                
                            @endphp
                            @foreach ($dates as $date)
                            <th style="">
                                {{ $date }}
                            </th>
                      

                            @endforeach

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($employees as $employee)
                            <input type="hidden" name="emp_id" value="{{ $employee->id }}">
                            <tr>
                                <td class="first-col w-100">{{ $employee->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->id }}</td>
                                @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)
                                    @php
                                        
                                        $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                        
                                        $check_attd = \App\Models\Attendance::query()
                                            ->where('emp_id', $employee->id)
                                            ->where('attendance_date', $date_picker)
                                            ->first();
                                        
                                        $check_leave = \App\Models\Remarks::query()
                                            ->where('emp_id', $employee->id)
                                            ->where('attendance_date', $date_picker)
                                        

                                            ->first();
                                        
                                    @endphp
                                    <td>

                                        <div class="form-check form-check-inline ">

                                            @if (isset($check_attd))
                                                 @if ($check_attd->status==1)
                                                 <i class="fa fa-check text-success"></i>
                                                 @else
                                                 <i class="fa fa-check text-danger"></i>
                                                 @endif
                                               
                                            @else
                                            <i class="fas fa-times text-danger"></i>
                                            @endif
                                            <br>
                                            
                                        </div>

                                        <div class="form-check form-check-inline">
                                          
                                          <p>{{ $check_leave->remarks ?? ''}}</p>
                                        

                                        </div> 

                                    </td>

                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
