@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6> 
                        </div>
                        <div class="card-body">
                            <form action="{{route('profile.update')}}" method="post">
                               
                               
                                @csrf
                                <input type="hidden" class="form-control"  name="id" value="{{$user->id}}" required>
                                <div class="row flex">
                                    <div class="col-md-6 mb-3">
                                        <label for="">Full Name</label>
                                        <input type="text" class="form-control"  name="name" value="{{$user->name}}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Address</label>
                                        <textarea class="form-control"  name="address" >{{$user->address}}</textarea>
                                        
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control"  name="email" value="{{$user->email}}" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" value="{{$user->password}}"  name="password" placeholder="******" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option class="form-control" {{ $user->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                                            <option class="form-control" {{ $user->status == 'inactive' ? 'selected' : '' }} value="inactive">InActive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control"  name="image" >
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Mobile</label>
                                        <input type="number" class="form-control" value="{{$user->mobile}}"  name="mobile" placeholder="+334123443" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Gender</label>
                                        <select class="form-control" name="sex" >
                                            <option class="form-control" {{ $user->sex == 'male' ? 'selected' : '' }} value="male">Male</option>
                                            <option class="form-control"  {{ $user->sex == 'female' ? 'selected' : '' }} value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right mb-2">
                                    <button type="submit" class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
@endsection
@push('scripts')
@endpush('scripts')