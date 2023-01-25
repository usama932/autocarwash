@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
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
                        <button class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Add Customers</button>
                    </div>
                    <div class="div shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customers List</h6> 
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                       @foreach($customers as $customer)
                                            
                                            <tr>
                                                <td class="m-auto"><img width="50px" height="50px" src="{{asset($customer->image)}}" alt="" class="img-responsive m-auto"></td>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->mobile}}</td>
                                                <td>{{$customer->status}}</td>
                                                <td><div class="flex">
                                                    <button class="btn btn-sm"  data-toggle="modal" data-target=".editmodal{{$customer->id}}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
            <h6 class=" mb-0 text-gray-800">Add Customer</h6>
        </div>
        <div class="card-body">
            <form action="{{route('customers.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row flex">
                    <div class="col-md-6 mb-3">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" placeholder="Customer Name" name="name" required>
                    </div>

                
                    <div class="col-md-6 mb-3">
                        <label for="">Address</label>
                        <textarea class="form-control"  name="address" required>Address</textarea>
                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="abc@abc.com" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="******" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <select class="form-control" name="status" required>
                            <option class="form-control" value="active">Active</option>
                            <option class="form-control"  value="inactive">InActive</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" class="form-control"  name="image" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Mobile</label>
                        <input type="number" class="form-control"  name="mobile" placeholder="+334123443" required>
                    </div>
                
                     <div class="col-md-6 mb-3">
                        <label for="">Gender</label>
                        <select class="form-control" name="sex" required>
                            <option class="form-control" value="male">Male</option>
                            <option class="form-control"  value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="text-right mb-2">
                     <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class= "btn btn-sm btn-success" >Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- EndModal    --}}
{{-- Edit Modal --}}
@foreach($customers as $customer)
    <div class="modal fade editmodal{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h6 class=" mb-0 text-gray-800">Edit Customer</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('customers.update',$customer->id )}}" method="post"  enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row flex">
                                <div class="col-md-6 mb-3">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{$customer->name}}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Address</label>
                                    <textarea class="form-control"  name="address" required>{{$customer->address}}</textarea>
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control"  name="email" value="{{$customer->email}}" placeholder="abc@abc.com" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" value="{{$customer->password}}"  name="password" placeholder="******" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option class="form-control" {{ $customer->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                                        <option class="form-control" {{ $customer->status == 'inactive' ? 'selected' : '' }} value="inactive">InActive</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control"  name="image" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Mobile</label>
                                    <input type="number" class="form-control" value="{{$customer->mobile}}"  name="mobile" placeholder="+334123443" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Gender</label>
                                    <select class="form-control" name="sex" >
                                        <option class="form-control" {{ $customer->sex == 'male' ? 'selected' : '' }} value="male">Male</option>
                                        <option class="form-control"  {{ $customer->sex == 'female' ? 'selected' : '' }} value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-right mb-2">
                                 <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class= "btn btn-sm btn-success" >Submit</button>
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