<div>
    <!-- Navigation homepage-->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #990000;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo/logo.png') }}" width="50px" alt="#">
            </a>
            <a class="navbar-brand nav-linklogo" href="{{ route('home') }}">Testing and Evaluation Center</a>
            <!-- Navigation toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr auto">
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
                        <a class="nav-link" href="{{ route('appointment') }}">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
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
                                    <a class="dropdown-item" href="{{ route('student.profile') }}">Profile</a>
                                    <a class="dropdown-item" href="{{ route('student.application') }}">Application</a>
                                    <a class="dropdown-item" href="{{ route('student.status') }}">Status</a>
                                    <a class="dropdown-item" href="{{ route('student.results') }}">Results</a>
                                    <a class="dropdown-item" href="{{ route('student.schedule') }}">Schedule</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                                </div>
                            </li>
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Navigation homepage -->

<!-- Dropdown items will be added here dynamically -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="admissionDropdown" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">Test Application</a>
    <div class="dropdown-menu" aria-labelledby="admissionDropdown" id="examDropdown">
        <!-- Dropdown items will be added here dynamically -->
    </div>
</li>

<script>
    document.addEventListener("DOMContentLoaded", function () {
  
        const exams = [
            { name: "CET", route: "{{ Route('application.cet') }}" },
            { name: "NAT", route: "{{ Route('application.nat') }}" },
            { name: "EAT", route: "{{ Route('application.eat') }}" },
            { name: "GSAT", route: "{{ Route('application.gsat') }}" },
            { name: "LSAT", route: "{{ Route('application.lsat') }}" },
            // Add more exams as needed
        ];

        const examDropdown = document.getElementById("examDropdown");

        exams.forEach((exam) => {
            const dropdownItem = document.createElement("a");
            dropdownItem.className = "dropdown-item";
            dropdownItem.href = exam.route;
            dropdownItem.textContent = `${exam.name} Application`;

            examDropdown.appendChild(dropdownItem);
        });
    });
</script>

</div>
