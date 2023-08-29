<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <!--DASHBOARD header-->
    <header class="admin-header">
        <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU TEC Logo" class="logo">
        <nav>
            <ul>
                <h1 class="company-name">WMSU <span>Testing and Evaluation Center</span></h1>
                <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('manage-content') }}">Manage Content</a></li>
                <li><a href="#">User Management</a></li>
                <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="{{ route('login') }}">Sign Out</a></li>
            </ul>
        </nav>
    </header>
    <!--DASHBOARD header-->

    <!--DASHBOARD OVERVIEW-->
    <section class="admin-overview">
        <h2 class="section-heading">Dashboard Overview</h2>
        
        <div class="overview-widgets">
            <div class="widget">
                <h3 class="widget-heading">Registered Users</h3>
                <p class="widget-content">Total Registered Users: <span class="highlight">500</span></p>
            </div>
            
            <div class="widget">
                <h3 class="widget-heading">Recent Activities</h3>
                <ul class="activity-list">
                    <li>Updated service information</li>
                    <li>Added new FAQ entry</li>
                    <li>Processed new registration</li>
                    <!-- ... -->
                </ul>
            </div>
            
            <div class="widget">
                <h3 class="widget-heading">Pending Appointments</h3>
                <p class="widget-content">Total Pending Appointments: <span class="highlight">15</span></p>
            </div>
        </div>
    </section>
    <!--DASHBOARD OVERVIEW-->

    <footer class="admin-footer">
        <p>&copy; {{ date('Y') }} WMSU TEC Admin Panel</p>
    </footer>
</body>
</html>
