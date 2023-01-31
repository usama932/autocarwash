@extends('layouts.frontend')
@section('content')
   

        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="{{asset('assets/img/carousel-1.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-text">
                           
                            <h3>Introducing Loyalty program to make most of your car wash</h3>
                           
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="{{asset('assets/img/carousel-2.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-text">
                            
                            <h3>Keep track of your car wash from our mobile app</h3>
                            
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="{{asset('assets/img/carousel-3.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-text">
                          
                            <h3>Make booking from our website or from mobile app to get discounts</h3>
                          
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
  
        <!-- Price Start -->
        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Washing Plan</p>
                    <h2>Choose Your Plan</h2>
                </div>
                <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4">
                       <div class="card m-2">
                            <div class="price-item">
                                <div class="price-header">
                                    <h3>{{$service->name}}</h3>
                                    <h2><span>$</span><strong>{{$service->price}}</strong><span>.00</span></h2> 
                                    <h5>Booked here <span class="badge badge-secondary">10% Off</span></h5>
                                </div>
                                <div class="price-body">
                                    @if(strlen($service->description) > 100)
                                        {!! substr($service->description,0,100) !!}
                                        {!!  substr($service->description, 0,  20) !!}
                                        <span class="read-more-show hide_content">Show More<i class="fa fa-angle-down"></i></span>
                                        <span class="read-more-content"> {{substr($service->description,100,strlen($service->description))}}
                                        <span class="read-more-hide hide_content">Show Less <i class="fa fa-angle-up"></i></span> </span>
                                    @else
                                        {{$service->description}}

                                    @endif
                                </div>
                                <div class="price-footer">
                                    @if(Auth::check()) 
                                        @if(auth()->user()->roled == 'user')
                                        
                                            <a class="btn btn-custom" href=""data-toggle="modal" data-target=".bd-example-modal-lg">Book Now</a>
                                            <a class="btn btn-custom"  data-toggle="modal" data-target=".bd-example-modal-lg" >Get Appointment</a>
                                            
                                        @endif
                                        @else
                                        
                                                <a class="btn btn-custom" href="" data-toggle="modal" data-target=".bd-login-modal-lg">Book Now</a>
                                            
                                    @endif 
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{-- <div class="col-md-4">
                       <div class="card m-2">
                            <div class="price-item ">
                                <div class="price-header">
                                    <h3>Premium Cleaning</h3>
                                    <h2><span>$</span><strong>35</strong><span>.99</span></h2>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                        <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                        <li><i class="far fa-times-circle"></i>Window Wiping</li>
                                    </ul>
                                </div>
                                <div class="price-footer">
                                    <a class="btn btn-custom" href="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card m-2">
                            <div class="price-item">
                                <div class="price-header">
                                    <h3>Complex Cleaning</h3>
                                    <h2><span>$</span><strong>49</strong><span>.99</span></h2>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                        <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Window Wiping</li>
                                    </ul>
                                </div>
                                <div class="price-footer">
                                    <a class="btn btn-custom" href="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card m-2">
                            <div class="price-item">
                                <div class="price-header">
                                    <h3>Complex Cleaning</h3>
                                    <h2><span>$</span><strong>49</strong><span>.99</span></h2>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                        <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Window Wiping</li>
                                    </ul>
                                </div>
                                <div class="price-footer">
                                    <a class="btn btn-custom" href="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Price End -->
        
        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header text-center">
                    <p>Testimonial</p>
                    <h2>What our clients say</h2>
                </div>
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <img src="{{asset('assets/img/testimonial-1.jpg')}} alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="{{asset('assets/img/testimonial-2.jpg')}}" alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="{{asset('assets/img/testimonial-3.jpg')}}" alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <img src="{{asset('assets/img/testimonial-4.jpg')}}" alt="Image">
                        <div class="testimonial-text">
                            <h3>Client Name</h3>
                            <h4>Profession</h4>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasel preti mi facilis ornare velit non vulputa. Aliqu metus tortor auctor gravid
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


@endsection
@push('scripts')

@endpush