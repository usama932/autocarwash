@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bookings</h1>
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
                    <div class="text-right mb-2">
                        <button class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">New Booking</button>
                    </div>
                    <div class="div shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Bookings List</h6> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Booked By</th>
                                            <th>Vehicle</th>
                                            <th>Vehicle No#</th>
                                            <th>Service</th>
                                            <th>Appointment Date</th>
                                            <th>Appox Hour</th>
                                            <th>Discount</th>
                                            <th>Time Frame</th>
                                            <th>Status</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Booked By</th>
                                        <th>Vehicle</th>
                                        <th>Vehicle No#</th>
                                        <th>Service</th>
                                        <th>Appointment Date</th>
                                        <th>Appox Hour</th>
                                        <th>Discount</th>
                                        <th>Time Frame</th>
                                        <th>Status</th>
                                      
                                        <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                       @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{$booking->booked_by}}</td>
                                                <td>{{$booking->vehicle_type}}</td>
                                                <td>{{$booking->vehicle_no}}</td>
                                                <td>{{$booking->service}}</td>
                                                <td>{{$booking->appointment_date}}</td>
                                                <td>{{$booking->approx_hour}}</td>
                                                <td>{{$booking->discount}}</td>
                                                 <td>{{$booking->time_frame}}</td>
                                                <td>{{$booking->status}}</td>
                                                <td><div class="flex">
                                                    <button class="btn btn-sm"  data-toggle="modal" data-target=".editmodal{{$booking->id}}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                         <button type="submit" class="btn btn-sm" data-toggle="modal" data-target=".deletemodal{{$booking->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                   </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

{{-- Create Modal --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="card">
        <div class="card-header">
            <h6 class=" mb-0 text-gray-800">Add Booking</h6>
        </div>
        <div class="card-body">
            <form action="{{route('bookings.store')}}" method="post">
                @csrf
                <div class="row flex">
                    <div class="col-md-6 mb-3">
                        <label for="">Customers</label>
                        <select class="form-control" name="user">
                            @foreach ($users as $user)
                                <option class-"form-control" value="{{$user->name}}">{{$user->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Vehicle Type</label>
                        
                        <select class="form-control" name="vehicle_type">
                            @foreach ($vehicles as $key => $vehicle)
                                <option class-"form-control" value="{{$key}}">{{$key}}</option>
                            @endforeach
                        </select>
 
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Services</label>
                        <select class="form-control" name="service">
                            @foreach ($services as $key => $service)
                                <option class-"form-control" value="{{$key}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Time Frame</label>
                        <select class="form-control" name="time_frame" >
                            <option class-"form-control" value="Morning">Morning</option>
                            <option class-"form-control" value="Afternoon">Afternoon</option>
                            <option class-"form-control" value="Evening">Evening</option>
                        </select>
                    </div>
               
                    <div class="col-md-6 mb-3">
                        <label for="">Vehicle No</label>
                        <input type="text" class="form-control" name="vehicle_no" placeholder="Vehicle No" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Appointment Date</label>
                        <input type="date" class="form-control"  name="appointment_date" placeholder="Appointment Date">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Appox Time</label>
                        <input type="text" class="form-control"  name="appox_hour" placeholder="eg : 1hour" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Discount %</label>
                        <input type="number" class="form-control"  name="discount" placeholder="10%" >
                    </div>
                   
                </div>
                <div class="text-right mb-2">
                    <button type="submit" class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- EndModal    --}}
{{-- Edit Modal --}}
@foreach($bookings as $booking)
    <div class="modal fade editmodal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <h6 class=" mb-0 text-gray-800">Edit booking</h6>
            </div>
            <div class="card-body">
                <form action="{{route('bookings.update',$booking->id)}}" method="post">
                @method('put')
                @csrf
                <div class="row flex">
                      <div class="col-md-6 mb-3">
                        <label for="">Customers</label>
                        <select class="form-control" name="user">
                            @foreach ($users as $user)
                                <option class-"form-control" value="{{$user->name}} " {{ $user->name == $booking->user ? 'selected' : '' }}>{{$user->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Vehicle Type</label>
                        <select class="form-control" name="vehicle_type">
                        <option class-"form-control" value="please ">--Select--</option>
                            @foreach ($vehicles as $key => $vehicle)
                                <option class-"form-control" value="{{$key}}"  {{ $key ==$booking->vehicle_type ? 'selected' : '' }}>{{$key}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Services</label>
                        <select class="form-control" name="service" >
                            @foreach ($services as $key => $service)
                                <option class-"form-control" value="{{$key}}"  {{ $key == $booking->vehicle_type ? 'selected' : '' }}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Time Frame</label>
                        <select class="form-control" name="time_frame"  >
                            <option class-"form-control" value="Morning" {{ 'Morning' == $booking->time_frame ? 'selected' : '' }}>Morning</option>
                            <option class-"form-control" value="Afternoon" {{ 'Afternoon' == $booking->time_frame ? 'selected' : '' }}>Afternoon</option>
                            <option class-"form-control" value="Evening" {{ 'Evening' == $booking->time_frame ? 'selected' : '' }}>Evening</option>
                        </select>
                    </div>
                      <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <select class="form-control" name="status"  >
                            <option class-"form-control" value="Pending" {{ 'Pending' == $booking->time_frame ? 'selected' : '' }}>Pending</option>
                            <option class-"form-control" value="Cancel" {{ 'Cancel' == $booking->time_frame ? 'selected' : '' }}>Cancel</option>
                            <option class-"form-control" value="Complete" {{ 'Complete' == $booking->time_frame ? 'selected' : '' }}>Complete</option>
                        </select>
                    </div>
               
                    <div class="col-md-6 mb-3">
                        <label for="">Vehicle No</label>
                        <input type="text" class="form-control" name="vehicle_no" placeholder="Vehicle No" value="{{$booking->vehicle_no}}" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Appointment Date</label>
                        <input type="date" class="form-control"  name="appointment_date" placeholder="Appointment Date" value="{{$booking->appointment_date}}">
                    </div>
                        <div class="col-md-6 mb-3">
                        <label for="">Appox Time</label>
                        <input type="text" class="form-control"  name="approx_hour" placeholder="eg : 1hour" value="{{$booking->approx_hour}}" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Discount %</label>
                        <input type="number" class="form-control"  name="discount"  value="{{$booking->discount}}">
                    </div>
                </div>
                <div class="text-right mb-2">
                    <button type="submit" class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Submit</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
@endforeach
{{-- EndModal    --}}
{{-- Edit Modal --}}

@endsection
@push('scripts')
@endpush('scripts')