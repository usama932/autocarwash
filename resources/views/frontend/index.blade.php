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
                            <h3>Washing & Detailing</h3>
                            <h1>Keep your Car Newer</h1>
                            <p>
                                2 steps wash including clay bar, Chamois Dry, Complete Interior and Boot Vacuum, 
                                Make windows glare free and wheels cleaned.
                            </p>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="{{asset('assets/img/carousel-2.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Washing & Detailing</h3>
                            <h1>Quality service for you</h1>
                            <p>
                               Includes, clay bar wash, complete interior and exterior wax polish, 
                               complete interior conditioning including leather and fabric seats.
                            </p>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="{{asset('assets/img/carousel-3.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Washing & Detailing</h3>
                            <h1>Exterior & Interior Washing</h1>
                            <p>
                               This is extreme level or exterior detail with buff and polish with attention to detail, this service will remove minor scratches 
                            </p>
                            <a class="btn btn-custom" href="">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{asset('assets/img/about.jpg')}}" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>car washing and detailing</h2>
                        </div>
                        <div class="about-content">
                            <p>
                              Fabric seats and floor steam clean with quality tools and chemicals, make your car mold, germs and marks free.
                                <br>
                                - Customer will get 5% off on 'car wash service' if they book through online app or website.
                                <br>
                                - Customer will get 10% off on 'car detail service' if they book through online app or website.
                            </p>
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum cleaning</li>
                                <li><i class="far fa-check-circle"></i>Interior wet cleaning</li>
                                <li><i class="far fa-check-circle"></i>Window wiping</li>
                            </ul>
                            <a class="btn btn-custom" href="">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2>Premium Washing Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-wash-1"></i>
                            <h3>Exterior Washing</h3>
                            <p>Never use dish soap to wash your car. According to Consumer Reports, dish soap isn't formulated for use on a car's paint.
                    .</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-wash"></i>
                            <h3>Interior Washing</h3>
                            <p> It can be used for cleaning different areas in the interior of a car such as hard surfaces, leather or vinyl seats, and fabric .</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-vacuum-cleaner"></i>
                            <h3>Vacuum Cleaning</h3>
                            <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-seat"></i>
                            <h3>Seats Washing</h3>
                            <p>To clean the car seat cover and padding, either hand wash or machine wash on a gentle cycle,
                             and then hang or lay flat to air dry to prevent shrinking or damage to the cover and safety labels.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-service"></i>
                            <h3>Window Wiping</h3>
                            <p>Wipe the windshield with a microfiber cloth in up-and-down and side-to-side motions to avoid streaks.
                             Dry buff the window with a fresh microfiber cloth</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-service-2"></i>
                            <h3>Wet Cleaning</h3>
                            <p>Soap and water usually work well. If you need a special cleaning product for vehicles,
                             read the label carefully and be sure to use a non-toxic, biodegradable detergent.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-car-wash"></i>
                            <h3>Oil Changing</h3>
                            <p>, vehicles are estimated to need an oil change every 3,000 miles or every six months. 
                            This can vary based on your driving habits, your driving frequency, the age of your vehicle.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <i class="flaticon-brush-1"></i>
                            <h3>Brake Reparing</h3>
                            <p>It will include flushing out the old brake fluid and replacing it with new fluid.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        
        
        
        
        <!-- Price Start -->
        <div class="price">
            <div class="container">
                <div class="section-header text-center">
                    <p>Washing Plan</p>
                    <h2>Choose Your Plan</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <div class="card m-2">
                            <div class="price-item">
                                <div class="price-header">
                                    <h3>Basic Cleaning</h3>
                                    <h2><span>$</span><strong>25</strong><span>.99</span></h2>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                        <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                        <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                        <li><i class="far fa-times-circle"></i>Interior Wet Cleaning</li>
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
                    </div>
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