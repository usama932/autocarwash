<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
             <img src="{{asset('assets/img/logo.png')}}" alt='auto1carwash' style="height:50px !important;  ">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
        
          
           
            @if(auth()->user()->roled == 'admin')
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('services.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Services</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('vehicles.index')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Vehicle</span>
                </a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('customers.index')}}"">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bookings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('teams.index')}}"">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Team</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Booking Reports</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="{{route('bookings.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Booking Reports</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->roled == 'user')
            <li class="nav-item">
                <a class="nav-link" href="{{route('user_booking.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bookings</span>
                </a>
            </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           
           

        </ul>
        <!-- End of Sidebar -->