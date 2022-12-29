@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Services</h1>
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
                        <button class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Add Service</button>
                    </div>
                    <div class="div shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Services List</h6> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Include Washing Plan 1</th>
                                            <th>Include Washing Plan 2</th>
                                            <th>Include Washing Plan 3</th>
                                            <th>Include Washing Plan 4</th>
                                            <th>Vehicle</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Name</th>
                                            <th>Include Washing Plan 1</th>
                                            <th>Include Washing Plan 2</th>
                                            <th>Include Washing Plan 3</th>
                                            <th>Include Washing Plan 4</th>
                                            <th>Vehicle</th>
                                            <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                       @foreach($services as $service)
                                            <tr>
                                                <td>{{$service->name}}</td>
                                                <td>{{$service->washing_plan_1}}</td>
                                                <td>{{$service->washing_plan_2}}</td>
                                                <td>{{$service->washing_plan_3}}</td>
                                                <td>{{$service->washing_plan_4}}</td>
                                                <td>{{$service->vehicle}}</td>
                                                <td><div class="flex">
                                                    <button class="btn btn-sm"  data-toggle="modal" data-target=".editmodal{{$service->id}}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                         <button type="submit" class="btn btn-sm" data-toggle="modal" data-target=".deletemodal{{$service->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            <h6 class=" mb-0 text-gray-800">Add Service</h6>
        </div>
        <div class="card-body">
            <form action="{{route('services.store')}}" method="post">
                @csrf
                <div class="row flex">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Service Name" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Vehicle</label>
                        <select class="form-control" name="vehicle">
                            <option class-"form-control">Car</option>
                            <option class-"form-control">Truck</option>
                            <option class-"form-control">Wagon</option>
                        </select>
                    </div>
                
               
                    <div class="col-md-6 mb-3">
                        <label for="">Include Washing #1</label>
                        <input type="text" class="form-control" name="washing_plan_1" placeholder="Include Washing #1">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Include Washing #2</label>
                        <input type="text" class="form-control"  name="washing_plan_2" placeholder="Include Washing #2">
                    </div>
               
                
                    <div class="col-md-6 mb-3">
                        <label for="">Include Washing #3</label>
                        <input type="text" class="form-control" name="washing_plan_3" placeholder="Include Washing #3">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Include Washing #4</label>
                        <input type="text" class="form-control"  name="washing_plan_4" placeholder="Include Washing #4">
                    </div>
                     <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" >Something about Your service</textarea>
                       
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
@foreach($services as $service)
    <div class="modal fade editmodal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <h6 class=" mb-0 text-gray-800">Edit Service</h6>
            </div>
            <div class="card-body">
                <form action="{{route('services.update',$service->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row flex">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{$service->name}}" name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Vehicle</label>
                            <select class="form-control" name="vehicle">
                                <option class-"form-control">Car</option>
                                <option class-"form-control">Truck</option>
                                <option class-"form-control">Wagon</option>
                            </select>
                        </div>
                    
                
                        <div class="col-md-6 mb-3">
                            <label for="">Include Washing #1</label>
                            <input type="text" class="form-control" name="washing_plan_1" value="{{$service->washing_plan_1}}" placeholder="Include Washing #1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Include Washing #2</label>
                            <input type="text" class="form-control"  name="washing_plan_2" value="{{$service->washing_plan_2}}" placeholder="Include Washing #2">
                        </div>
                
                    
                        <div class="col-md-6 mb-3">
                            <label for="">Include Washing #3</label>
                            <input type="text" class="form-control" name="washing_plan_3" value="{{$service->washing_plan_3}}"  placeholder="Include Washing #3">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Include Washing #4</label>
                            <input type="text" class="form-control"  name="washing_plan_4" value="{{$service->washing_plan_4}}" placeholder="Include Washing #4">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" >{{$service->description}}"</textarea>
                        
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