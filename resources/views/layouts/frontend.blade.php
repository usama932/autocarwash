<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Auto1Carwash</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Favicon -->
        <link href="{{asset('assets/img/favicon.ico')}}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('assets/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <style type="text/css">
            .read-more-show{
            cursor:pointer;
            color: #ed8323;
            }
            .read-more-hide{
            cursor:pointer;
            color: #ed8323;
            }
            .hide_content{
            display: none;
            }
        </style>
    </head>

    <body>
        @include('layouts.header')
        @yield('content')
        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <div class="logo">
                            <a href="{{route('home')}}">
                                <h1><img src="{{asset('assets/img/logo.png')}}" alt='auto1carwash' style="margin:auto; ;height:90px !important;"></h1>
                                <!-- <img src="img/logo.jpg" alt="Logo"> -->
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="">About Us</a>
                            <a href="">Contact Us</a>
                            <a href="">Our Service</a>
                            <a href="">Service Points</a>
                            <a href="">Pricing Plan</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Opening Hours</h2>
                            <a href="">Monday (08:30am  05:30pm)</a>
                            <a href="">Tuesday (08:30am  05:30pm)</a>
                            <a href="">Wedesday (08:30am  05:30pm)</a>
                            <a href="">Thursday (8:30am - 7:00pm)</a>
                            <a href="">Friday (08:30am  07:00pm)</a>
                            <a href="">Saturday (08:30am  05:30pm)</a>
                            <a href="">Sunday (09:00am  05:00pm)</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
                            <p><i class="fa fa-map-marker-alt"></i>Red Car Parking, near to main food court, Campbell Street, Westfield Liverpool, Sydney 2170</p>
                            <p><i class="fa fa-phone-alt"></i>0410096313</p>
                            <p><i class="fa fa-envelope"></i>info@auto1Carwash.com.au</p>
                            <div class="footer-social">
                                <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="container copyright">
                <p>@All rights reserved by <a href="#"><i>Auto-1 Carwash</i></a>, Developed by : <a href="#">E-Galaxy Technologies Solutions</a></p>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>
         <div class="modal fade bd-login-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h6 class=" mb-0 text-gray-800">Login</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('front.login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                    <a class="btn btn-link" href="{{ route('register') }}">
                                       Make New Account
                                    </a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h6 class=" mb-0 text-gray-800">Add Booking</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user_booking.store')}}" method="post">
                            @csrf
                            <div class="row flex">
                                <div class="col-md-6 mb-3">
                                    <label for="">Vehicle Type</label>
                                    
                                    <select class="form-control" name="vehicle_type">
                                        @foreach ($vehicles as $vehicle)
                                            <option class-"form-control" value="{{$vehicle->name}}">{{$vehicle->name}}</option>
                                        @endforeach
                                    </select>
            
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Services</label>
                                    <select class="form-control" name="service">
                                        @foreach ($services as $key => $service)
                                            <option class-"form-control" value="{{$service->name}}">{{$service->name}}</option>
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
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('assets/lib/counterup/counterup.min.js')}}"></script>
        
        <!-- Contact Javascript File -->
        <script src="{{asset('assets/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{asset('assets/mail/contact.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('assets/js/main.js')}}"></script>

            <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyCBPClM-3rJt3oazle9fcfON15WZnzqZRc",
        authDomain: "push-notification-3e983.firebaseapp.com",
        projectId: "push-notification-3e983",
        storageBucket: "push-notification-3e983.appspot.com",
        messagingSenderId: "947085663576",
        appId: "1:947085663576:web:d58f3619c9e7ca8cad992d",
        measurementId: "G-70QR0H2H83"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function startFCM() {
        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                    },
                });
            }).catch(function (error) {
                alert(error);
            });
    }
    messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });
</script>
<script type="text/javascript">
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
                $('.read-more-content').addClass('hide_content')
                $('.read-more-show, .read-more-hide').removeClass('hide_content')
                // Set up the toggle effect:
                $('.read-more-show').on('click', function(e) {
                  $(this).next('.read-more-content').removeClass('hide_content');
                  $(this).addClass('hide_content');
                  e.preventDefault();
                });
                // Changes contributed by @diego-rzg
                $('.read-more-hide').on('click', function(e) {
                  var p = $(this).parent('.read-more-content');
                  p.addClass('hide_content');
                  p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
                  e.preventDefault();
                });
    </script>
    </body>
</html>
