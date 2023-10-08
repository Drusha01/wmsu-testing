<div>
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-dashboard') }}" style="{{request()->is('admin/dashboard*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('manage-appointment') }}" style="{{request()->is('admin/appointment-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-envelope"></i>
                    <span>Appointment Management</span>
                </a>
            </li><!-- End Manage Appointment Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('manage-application') }}" style="{{request()->is('admin/application-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-card-list"></i>
                    <span>Applicant Management</span>
                </a>
            </li><!-- End Manage Applicant Nav -->
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('room-management') }}" style="{{request()->is('admin/room-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-layout-split"></i>
                    <span>Room Management</span>
                </a>
            </li><!-- End Room Management Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('exam-management') }}"  style="{{request()->is('admin/exam-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-person"></i>
                    <span>Exam Management</span>
                </a>
            </li><!-- End Manage Examination Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('exam-administrator') }}" style="{{request()->is('admin/exam-administrator*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-person"></i>
                    <span>Exam-Administrator</span>
                </a>
            </li><!-- End Manage Examination Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('result-management') }}" style="{{request()->is('admin/result-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-person"></i>
                    <span>Result Management</span>
                </a>
            </li><!-- End Manage Examination Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"  href="{{ route('admin-announcement') }}" style="{{request()->is('admin/announcement-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-dash-circle"></i>
                    <span>Announcement Management</span>
                </a>
            </li><!-- End Announcement Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin-management') }}" style="{{request()->is('admin/admin-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-person"></i>
                    <span>Admin Management</span>
                </a>
            </li><!-- End Admin Management Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin-chatsupport') }}" style="{{request()->is('admin/chatsupport*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Chat Support</span>
                </a>
            </li><!-- End Chat Support Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('faq-management') }}" style="{{request()->is('admin/faq*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-file-earmark"></i>
                    <span>FAQ Management</span>
                </a>
            </li><!-- End FAQ  Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('setting') }}" style="{{request()->is('admin/setting*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Settings</span>
                </a>
            </li><!-- End Settings Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('logout') }}" style="{{request()->is('admin/exam-management*') ? 'background-color: #e0e0e0;  color: #990000;' : ''}}">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Log out</span>
                </a>
            </li><!-- End Log Out Nav -->
        </ul>
    </aside>
</div>
