        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <h1><img src="{{asset('assets/img/logo.png')}}" alt='auto1carwash'></h1>
                                <!-- <img src="img/logo.jpg" alt="Logo"> -->
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Opening Hour</h3>
                                        <p>Mon-Sun (8:30 - 7:00) 
                                       </p>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="fa fa-phone-alt"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>0410096313</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>info@auto1carwash.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{route('home')}}" class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a>
                            <a href="{{route('about')}}" class="nav-item nav-link  {{ Route::is('about') ? 'active' : '' }}">About</a>
                            <a href="{{route('service')}}" class="nav-item nav-link  {{ Route::is('service') ? 'active' : '' }}">Service</a>                     
                            <a href="{{route('contact')}}" class="nav-item nav-link  {{ Route::is('contact') ? 'active' : '' }}">Contact</a>
                        </div>
                        @if(Auth::check()) 
                            @if(auth()->user()->roled == 'user')
                                <div class="ml-auto">
                                <a class="btn btn-custom"  data-toggle="modal" data-target=".bd-example-modal-lg" >Get Appointment</a>
                                </div>
                            @endif
                        @else
                            <div class="ml-auto">
                                <a class="btn btn-custom"  data-toggle="modal" data-target=".bd-login-modal-lg" >Get Appointment</a>
                            </div>
                        @endif

                       
                    </div>
                </nav>
            </div>
        </div>
        
