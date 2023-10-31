<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-crimson">
        <div class="container">
        <div class="mx-auto">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo/logo.png') }}" width="50px" alt="WMSU Logo">
                <span class="company-name">Testing and Evaluation Center</span>
            </a>
        </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('programs') }}">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#contactModal">Contact Us</a>
                    </li>
                </ul>
                @if(!isset($user_details['user_id']))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                        </li>
                @else 
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge badge-danger">3</span> <!-- You can dynamically update this number -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                                <h6 class="dropdown-header">Notifications</h6>
                                <a class="dropdown-item" href="#">
                                    <div class="notification-content">
                                        <div class="notification-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="notification-text">
                                            <p>New notification 1</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="notification-content">
                                        <div class="notification-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="notification-text">
                                            <p>New notification 2</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <div class="notification-content">
                                        <div class="notification-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="notification-text">
                                            <p>New notification 3</p>
                                        </div>
                                    </div>
                                </a>
                                <!-- Add more notification items dynamically here -->
                            </div>
                        </li>
                    </ul>

                    <!-- Profile Dropdown -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img style="border-radius:50%;"src="@if($user_details['user_profile_picture']== 'default.png'){{asset('images/contents/profile_picture/thumbnail/default.png')}} @else {{asset('storage/images/thumbnail/'.$user_details['user_profile_picture'])}} @endif" width="50" alt="">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                @if(isset($user_status[0]->user_status_details) && $user_status[0]->user_status_details == 'active' )
                                <a class="dropdown-item" href="{{ route('student.profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('student.application') }}">Application</a>
                                <a class="dropdown-item" href="{{ route('student.status') }}">Status</a>
                                <a class="dropdown-item" href="{{ route('student.results') }}">Results</a>
                                <a class="dropdown-item" href="{{ route('student.appointment') }}">Apppointments</a>
                                <a class="dropdown-item" href="{{ route('student.notifications') }}">Notifications</a>
                                <div class="dropdown-divider"></div>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</div>
