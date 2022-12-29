@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Vehicles</h1>
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
                    <div class="text-right mb-2">
                        <button class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Add Vehicle</button>
                    </div>
                    <div class="div shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Vehicles List</h6> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Vehicle Type</th>
                                             <th>Vehicle Modal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Name</th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Modal</th>
                                        <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                       @foreach($vehicles as $vehicle)
                                            <tr>
                                                <td>{{$vehicle->name}}</td>
                                                <td>{{$vehicle->type}}</td>
                                                <td>{{$vehicle->washing_plan_2}}</td>
                                                <td>{{$vehicle->model}}</td>
                                            
                                                <td><div class="flex">
                                                    <button class="btn btn-sm"  data-toggle="modal" data-target=".editmodal{{$vehicle->id}}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                         <button type="submit" class="btn btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            <h6 class=" mb-0 text-gray-800">Add Vehicle</h6>
        </div>
        <div class="card-body">
            <form action="{{route('vehicles.store')}}" method="post">
                @csrf
                <div class="row flex">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Service Name" name="name">
                    </div>          
                    <div class="col-md-6 mb-3">
                        <label for="">Vehicle Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Vehicle Type">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Vehicle Model</label>
                        <input type="text" class="form-control"  name="model" placeholder="Vehicle Model">
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
@foreach($vehicles as $vehicle)
    <div class="modal fade editmodal{{$vehicle->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <h6 class=" mb-0 text-gray-800">Edit Vehicle</h6>
            </div>
            <div class="card-body">
                <form action="{{route('vehicles.update',$vehicle->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row flex">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Service Name" name="name" value="{{$vehicle->name}}">
                        </div>          
                        <div class="col-md-6 mb-3">
                            <label for="">Vehicle Type</label>
                            <input type="text" class="form-control" name="type" value="{{$vehicle->type}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Vehicle Model</label>
                            <input type="text" class="form-control"  name="model" value="{{$vehicle->model}}">
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