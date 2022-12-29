@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Teams</h1>
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
                        <button class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Add Teams</button>
                    </div>
                    <div class="div shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Teams List</h6> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Sex</th>
                                            <th>Post</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Sex</th>
                                        <th>Post</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                       @foreach($teams as $team)
                                            <tr>
                                                <td></td>
                                                <td>{{$team->name}}</td>
                                                <td>{{$team->email}}</td>
                                                <td>{{$team->mobile}}</td>
                                                <td>{{$team->sex}}</td>
                                                <td>{{$team->post}}</td>
                                                <td>{{$team->status}}</td>
                                                <td><div class="flex">
                                                    <button class="btn btn-sm"  data-toggle="modal" data-target=".editmodal{{$team->id}}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
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
            <h6 class=" mb-0 text-gray-800">Add Team</h6>
        </div>
        <div class="card-body">
            <form action="{{route('teams.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row flex">
                    <div class="col-md-6 mb-3">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" placeholder="Service Name" name="name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">DOB #</label>
                        <input type="date" class="form-control" name="dob" placeholder="DOB #">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Address</label>
                        <textarea class="form-control"  name="address" >Address</textarea>
                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="abc@abc.com">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <select class="form-control" name="status" >
                            <option class="form-control" value="active">Active</option>
                            <option class="form-control"  value="active">InActive</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control"  name="image" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Mobile</label>
                        <input type="number" class="form-control"  name="mobile" placeholder="+334123443">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Enter Post</label>
                        <input type="text" class="form-control"  name="post" placeholder="Washer">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Join Date</label>
                        <input type="date" class="form-control"  name="join_date">
                    </div>
                     <div class="col-md-6 mb-3">
                        <label for="">Gender</label>
                        <select class="form-control" name="sex" >
                            <option class="form-control" value="male">Male</option>
                            <option class="form-control"  value="female">Female</option>
                        </select>
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
@foreach($teams as $team)
    <div class="modal fade editmodal{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <h6 class=" mb-0 text-gray-800">Edit Team</h6>
            </div>
            <div class="card-body">
                <form action="{{route('teams.update',$team->id )}}" method="post"  enctype="multipart/form-data">
                        @method('put')
                    @csrf
                    <div class="row flex">
                        <div class="col-md-6 mb-3">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" placeholder="Service Name" name="name" value="{{$team->name}}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">DOB #</label>
                            <input type="date" class="form-control" name="dob" placeholder="DOB #"  value="{{$team->dob}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address</label>
                            <textarea class="form-control"  name="address" >{{$team->address}}</textarea>
                            
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control"  name="email" value="{{$team->email}}" placeholder="abc@abc.com" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <select class="form-control" name="status" >
                                <option class="form-control" value="active">Active</option>
                                <option class="form-control"  value="active">InActive</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" class="form-control"  name="image" >
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Mobile</label>
                            <input type="number" class="form-control" value="{{$team->mobile}}"  name="mobile" placeholder="+334123443">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Enter Post</label>
                            <input type="text" class="form-control" value="{{$team->post}}"  name="post" placeholder="Washer">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Join Date</label>
                            <input type="date" class="form-control" value="{{$team->join_date}}" name="join_date">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Gender</label>
                            <select class="form-control" name="sex" >
                                <option class="form-control" value="male">Male</option>
                                <option class="form-control"  value="female">Female</option>
                            </select>
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