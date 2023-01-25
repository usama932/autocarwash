@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Employees</h1>
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
   <button class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">New Employees</button>
</div>
<div class="div shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Employees List</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th >Employee ID</th>
                  <th >Name</th>
                  <th>position</th>
                  <th >Email</th>
                  <th>Mobile</th>
                  <th>Member Since</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tfoot>
               <th >Employee ID</th>
               <th >Name</th>
               <th>position</th>
               <th >Email</th>
               <th>Mobile</th>
               <th>Member Since</th>
               <th>Actions</th>
            </tfoot>
            <tbody>
               @foreach( $employees as $employee)
               <tr>
                  <td>{{$employee->id}}</td>
                  <td>{{$employee->name}}</td>
                  <td>{{$employee->position}}</td>
                  <td>{{$employee->email}}</td>
                  <td>{{$employee->mobile}}</td>
                  <td>{{$employee->created_at}}</td>
                  <td>
                        <button class="btn btn-sm"  data-toggle="modal" data-target=".editmodal{{$employee->id}}"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                                <button type="submit" class="btn btn-sm" data-toggle="modal" data-target=".deletemodal{{$employee->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
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
               <h6 class=" mb-0 text-gray-800">Add Employee</h6>
            </div>
            <div class="card-body">
               <form method="POST" action="{{ route('employees.store') }}">
                  @csrf
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" class="form-control" placeholder="Enter Employee Name" id="name" name="name"
                        required />
                  </div>
                  <div class="form-group">
                     <label for="position">Position</label>
                     <input type="text" class="form-control" placeholder="Enter Employee Name" id="position" name="position"
                        required />
                  </div>
                  <div class="form-group">
                     <label for="position">Mobile</label>
                     <input type="text" class="form-control" placeholder="Enter Phone Number" id="" name="mobile"
                        required />
                  </div>
                  <div class="form-group">
                     <label for="email" class="col-sm-3 control-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                     <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                        Submit
                        </button>
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">
                        Cancel
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- EndModal    --}}
{{-- Edit Modal --}}
@foreach( $employees as $employee)
<div class="modal fade editmodal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="card">
            <div class="card-header">
               <h6 class=" mb-0 text-gray-800">Edit booking</h6>
            </div>
            <div class="card-body">
               <form class="form-horizontal" method="POST" action="{{ route('employees.update', $employee->id) }}">
                  @csrf
                  @method('put')
                  <div class="form-group">
                     <label for="name" class="col-sm-3 control-label">Name</label>
                     <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}"
                        required>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-3 control-label">Position</label>
                     <input type="text" class="form-control" id="position" name="position" value="{{ $employee->position }}"
                        required>
                  </div>
                  <div class="form-group">
                     <label for="position">Mobile</label>
                     <input type="text" class="form-control" placeholder="Enter Phone Number" id="" name="mobile"  value="{{ $employee->mobile }}"
                        required />
                  </div>
                  <div class="form-group">
                     <label for="email" class="col-sm-3 control-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email"
                        value="{{ $employee->email }}" >
                  </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
               class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i>
            Update</button>
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