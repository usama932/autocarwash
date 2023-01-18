@extends('layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reviews</h1>
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
                    {{-- <div class="text-right mb-2">
                        <button class= "btn btn-sm btn-success"  data-toggle="modal" data-target=".bd-example-modal-lg">Add Service</button>
                    </div> --}}
                    <div class="div shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reviews List</h6> 
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th>User</th>  
                                            <th>Rating</th>
                                            <th>Service</th>
                                           <th>Remarks</th>
                                           <th>Feature</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>User</th>  
                                            <th>Rating</th>
                                            <th>Service</th>
                                           <th>Remarks</th>
                                           <th>Feature</th>
                                            <th>Action</th>
                                    </tfoot>
                                    <tbody>
                                       @foreach($reviews as $review)
                                            <tr>
                                                <td>{{$review->user}}</td>
                                                <td>{{$review->rating}} Star</td>
                                                <td>{{$review->service}}</td>
                                                <td>{!! $review->remarks !!}</td>
                                                 <td>{!! $review->is_feature !!}</td>
                                                <td><div class="flex">
                                                    <button class="btn btn-sm"  data-toggle="modal" data-target=".editmodal{{$review->id}}"><i class="fas fa-edit"></i></button>
                                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                         <button type="submit" class="btn btn-sm" data-toggle="modal" data-target=".deletemodal{{$review->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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


{{-- Edit Modal --}}
@foreach($reviews as $review)
    <div class="modal fade editmodal{{$review->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <h6 class=" mb-0 text-gray-800">Edit Review</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('review.update',$review->id)}}">
                    @csrf
                    @method('put')
                    <div class="col-md-12 mb-3">
                        <label for="">Feature</label>
                        <select class="form-control" name="is_feature"  >
                            <option class-"form-control" value="NO" {{ 'Pending' == $review->is_feature ? 'selected' : '' }}>NO</option>
                            <option class-"form-control" value="Yes" {{ 'Cancel' == $review->is_feature ? 'selected' : '' }}>Yes</option>
                            
                        </select>
                    </div>
                    {{-- <div class="col-md-12 mb-3">
                        <label>Give Rating</label>
                        <br>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label for="star5">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label for="star4">4 stars</label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label for="star3">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label for="star2">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label for="star1">1 star</label>
                        </fieldset>
                    </div> --}}
                    <br>
                    <label class='text-start'>Remarks</label>
                    <div class="col-md-12 mb-3">
                        
                        <textarea class="form-control" id="editor" name="remarks" >{{$review->remarks}}</textarea>
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