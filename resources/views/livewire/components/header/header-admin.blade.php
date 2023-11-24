<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div>
    <header id="header" class="dashboard-header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin-dashboard') }}" class="dasboard-logo d-flex align-items-center">
    <img src="{{ asset('images/logo/logo.png') }}" alt="wmsu logo">
    <span class="d-none d-lg-block nowrap" style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold;  color: #333; white-space: nowrap; margin-right: 10px;">Testing Center</span>
    <img src="{{ asset('images/logo/tec.png') }}" alt="wmsu logo"  >
</a>



            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <!-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div> -->
        <!-- End Search Bar -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-danger rounded-pill badge-number">1</span>
                    </a><!-- End Notification Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="{{ Route('notification') }}">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img style="border-radius:50%;" src="@if($user_details['user_profile_picture'] == 'default.png'){{ asset('images/contents/profile_picture/thumbnail/default.png') }}@else{{ asset('storage/images/thumbnail/'.$user_details['user_profile_picture']) }}@endif" alt="">
                            <span class="d-none d-md-block" style="margin-left: 10px; color: black;">{{$user_details['user_firstname'].' '.$user_details['user_lastname']}}</span>
                            <i class="fas fa-caret-down ms-1"></i> 
                        </a>


                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ Route('profile')}}"><i class="fas fa-user" style="color: #990000;"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="{{ Route('notification') }}"><i class="fas fa-bell" style="color: #990000;"></i> Notifications</a></li>
                            <li><a class="dropdown-item" href="{{ Route('setting') }}"><i class="fas fa-cog" style="color: #990000;"></i> Settings</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="{{ Route('logout') }}"><i class="fas fa-sign-out-alt" style="color: #990000;"></i> Logout</a></li>
                        </ul>
                    </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header>
    
</div>
