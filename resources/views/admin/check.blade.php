@extends('layouts.admin')
@section('css')
    <!-- Table css -->
    <link href="{{ URL::asset('plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css') }}" rel="stylesheet"
        type="text/css" media="screen">
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Attendance</h1>
</div>
<!-- Page Heading -->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
   <button type="button" class="close" data-dismiss="alert">×</button>	
   <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-block">
   <button type="button" class="close" data-dismiss="alert">×</button>	
   <strong>{{ $message }}</strong>
</div>
@endif
<!-- DataTales Example -->
@if (count($errors) > 0)
<div class = "alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif

<div class="div shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Attendance Sheet</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-responsive table-bordered table-sm">
                <thead>
                    <tr>

                        <th>Employee Name</th>
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
                            <th>
                                {{ $date }}
                            </th>

                        @endforeach

                    </tr>
                </thead>

                <tbody>


                    <form action="{{ route('check_store') }}" method="post">
                        
                        <button type="submit" class="btn btn-success" style="display: flex; margin:10px">submit</button>
                        @csrf
                        @foreach ($employees as $employee)

                            <input type="hidden" name="emp_id" value="{{ $employee->id }}">

                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->id }}</td>






                                @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)


                                    @php
                                        
                                        $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                        
                                        $check_attd = \App\Models\Attendance::query()
                                            ->where('emp_id', $employee->id)
                                            ->where('attendance_date', $date_picker)
                                            ->first();
                                        
                                        $check_leave = \App\Models\Leave::query()
                                            ->where('emp_id', $employee->id)
                                            ->where('leave_date', $date_picker)
                                            ->first();
                                        
                                    @endphp
                                    <td>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="check_box"
                                                name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                                @if (isset($check_attd))  checked @endif id="inlineCheckbox1" value="1">

                                        </div>
                                        {{-- <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="check_box"
                                                name="leave[{{ $date_picker }}][{{ $employee->id }}]]" type="checkbox"
                                                @if (isset($check_leave))  checked @endif id="inlineCheckbox2" value="1">

                                        </div> --}}

                                    </td>

                                @endfor
                            </tr>
                        @endforeach

                    </form>


                </tbody>


            </table>
        </div>
    </div>
</div>


@endsection
@push('scripts')
@endpush('scripts')