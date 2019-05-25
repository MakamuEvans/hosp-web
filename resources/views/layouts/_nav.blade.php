<!-- Navigation Bar-->
<header id="topnav">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </span>
                    </a>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{url('/')}}" class="logo text-center">
                    CollabMed Demo
                </a>
            </div>

        </div> <!-- end container-fluid-->
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{url('home')}}"><i class="fa fa-hospital"></i>Dashboard</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{route('check-ins.index')}}"><i class="fa fa-book-medical"></i>Appointments</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{route('clients.index')}}"><i class="fa fa-users"></i>Clients</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{route('drugs.index')}}"><i class="fa fa-syringe"></i>Drugs</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{route('lab-tests.index')}}"><i class="fa fa-clinic-medical"></i>Lab Tests</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{route('radiology-tests.index')}}"><i class="fa fa-file-medical"></i>Radiology Tests</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{route('users.index')}}"><i class="fa fa-user-lock"></i>Users</a>
                    </li>
                    <li class="has-submenu">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->

</header>
<!-- End Navigation Bar-->