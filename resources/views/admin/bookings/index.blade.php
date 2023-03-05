<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
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
                                {{-- <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Booked By</th>
                                            <th>Vehicle</th>
                                            <th>Vehicle No#</th>
                                            <th>Service</th>
                                            <th>Appointment Date</th>
                                            <th>Appox Hour</th>
                                            <th>Discount Price</th>
                                            <th>Total Price</th>
                                            <th>Discount </th>
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
                                        <th>Discount Price</th>
                                        <th>Total Price</th>
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
                                                 <td>${{$booking->dis_price}}</td>
                                                <td>${{$booking->total_price}}</td>
                                                <td>{{$booking->discount}}%</td>
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
                                </table> --}}
                                <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008-11-28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012-12-02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012-08-06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010-10-14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009-09-15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008-12-13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008-12-19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013-03-03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008-10-16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012-12-18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010-03-17</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012-11-27</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010-06-09</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009-04-10</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012-10-13</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012-09-26</td>
                <td>$217,500</td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011-09-03</td>
                <td>$345,000</td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009-06-25</td>
                <td>$675,000</td>
            </tr>
            <tr>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011-12-12</td>
                <td>$106,450</td>
            </tr>
            <tr>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sydney</td>
                <td>23</td>
                <td>2010-09-20</td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009-10-09</td>
                <td>$1,200,000</td>
            </tr>
            <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010-12-22</td>
                <td>$92,575</td>
            </tr>
            <tr>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010-11-14</td>
                <td>$357,650</td>
            </tr>
            <tr>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>2011-06-07</td>
                <td>$206,850</td>
            </tr>
            <tr>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>2010-03-11</td>
                <td>$850,000</td>
            </tr>
            <tr>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>2011-08-14</td>
                <td>$163,000</td>
            </tr>
            <tr>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
                <td>Sydney</td>
                <td>37</td>
                <td>2011-06-02</td>
                <td>$95,400</td>
            </tr>
            <tr>
                <td>Suki Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>2009-10-22</td>
                <td>$114,500</td>
            </tr>
            <tr>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>2011-05-07</td>
                <td>$145,000</td>
            </tr>
            <tr>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>2008-10-26</td>
                <td>$235,500</td>
            </tr>
            <tr>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>2011-03-09</td>
                <td>$324,050</td>
            </tr>
            <tr>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009-12-09</td>
                <td>$85,675</td>
            </tr>
            <tr>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>2008-12-16</td>
                <td>$164,500</td>
            </tr>
            <tr>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>2010-02-12</td>
                <td>$109,850</td>
            </tr>
            <tr>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>2009-02-14</td>
                <td>$452,500</td>
            </tr>
            <tr>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>2008-12-11</td>
                <td>$136,200</td>
            </tr>
            <tr>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>2008-09-26</td>
                <td>$645,750</td>
            </tr>
            <tr>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011-02-03</td>
                <td>$234,500</td>
            </tr>
            <tr>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>2011-05-03</td>
                <td>$163,500</td>
            </tr>
            <tr>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>2009-08-19</td>
                <td>$139,575</td>
            </tr>
            <tr>
                <td>Thor Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>2013-08-11</td>
                <td>$98,540</td>
            </tr>
            <tr>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009-07-07</td>
                <td>$87,500</td>
            </tr>
            <tr>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2012-04-09</td>
                <td>$138,575</td>
            </tr>
            <tr>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010-01-04</td>
                <td>$125,250</td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012-06-01</td>
                <td>$115,000</td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013-02-01</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011-12-06</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011-03-21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009-02-27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010-07-14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008-11-13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011-06-27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011-01-25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
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
                                <option class-"form-control" value="{{$service}}">{{$key}}</option>
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
                        <label for="">Inside Polish</label>
                        <select class="form-control" name="polish" >
                            <option class-"form-control" value="yes">Yes</option>
                            <option class-"form-control" value="no">No</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Extra 35$ ADD In Total Price.</small>
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
                        <input type="text" class="form-control"  name="approx_hour" placeholder="eg : 1hour" >
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <label for="">Discount %</label>
                        <input type="number" class="form-control"  name="discount" placeholder="10%" >
                    </div> --}}
                   
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
@foreach($bookings as $booking)
    <div class="modal fade editmodal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <h6 class=" mb-0 text-gray-800">Edit booking</h6>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="card-body">
                <form action="{{route('bookings.update',$booking->id)}}" method="post">
                @method('put')
                @csrf
                <div class="row flex">
                    <div class="col-md-6 mb-3">
                        <label for="">Customers</label>
                        <input  class="form-control" value="{{$booking->user}}" readonly>
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
                                <option class-"form-control" value="{{$service}}"  {{ $service == $booking->service ? 'selected' : '' }}>{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Total Price ($)</label>
                        <input type="number" class="form-control" name="totol_price" placeholder="Vehicle No" value="{{$booking->total_price}}" >
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
                    {{-- <div class="col-md-6 mb-3">
                        <label for="">Discount %</label>
                        <input type="number" class="form-control"  name="discount"  value="{{$booking->discount}}">
                    </div> --}}
                </div>
                <div class="text-right mb-2">
                    <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
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