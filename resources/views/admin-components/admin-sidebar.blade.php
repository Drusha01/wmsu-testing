<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manage-appointment') }}">
                <i class="bi bi-envelope"></i>
                <span>Appointment Management</span>
            </a>
        </li><!-- End Manage Appointment Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('manage-application') }}">
                <i class="bi bi-card-list"></i>
                <span>Applicant Management</span>
            </a>
        </li><!-- End Manage Applicant Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('exam-management') }}">
                <i class="bi bi-person"></i>
                <span>Exam Management</span>
            </a>
        </li><!-- End Manage Examination Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('result-management') }}">
                <i class="bi bi-person"></i>
                <span>Result Management</span>
            </a>
        </li><!-- End Manage Examination Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin-announcement') }}">
                <i class="bi bi-dash-circle"></i>
                <span>Announcement Management</span>
            </a>
        </li><!-- End Announcement Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin-management') }}">
                <i class="bi bi-person"></i>
                <span>Admin Management</span>
            </a>
        </li><!-- End Admin Management Nav -->

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
