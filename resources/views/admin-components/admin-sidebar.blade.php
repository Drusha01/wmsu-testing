<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="{{ route('admin-dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('exam-management') }}">
            <i class="bi bi-person"></i>
            <span>Manage Examination</span>
        </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin-management') }}">
            <i class="bi bi-person"></i>
            <span>Admin Management</span>
        </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user-management') }}">
            <i class="bi bi-question-circle"></i>
            <span>User Management</span>
        </a>
    </li><!-- End User Management Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('manage-appointment') }}">
            <i class="bi bi-envelope"></i>
            <span>Manage Appointment</span>
        </a>
    </li><!-- End Manage Appointment Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('manage-application') }}">
            <i class="bi bi-card-list"></i>
            <span>Manage Applicant</span>
        </a>
    </li><!-- End Manage Applicant Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin-announcement') }}">
            <i class="bi bi-dash-circle"></i>
            <span>Announcement</span>
        </a>
    </li><!-- End Announcement Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin-chatsupport') }}">
            <i class="bi bi-file-earmark"></i>
            <span>Chat Support</span>
        </a>
    </li><!-- End Chat Support Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('setting') }}">
            <i class="bi bi-file-earmark"></i>
            <span>Settings</span>
        </a>
    </li><!-- End Settings Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('logout') }}">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Log out</span>
        </a>
    </li><!-- End Log Out Nav -->
</ul>

</aside>