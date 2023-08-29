<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Content - WMSU TEC Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    
    <!--DASHBOARD header-->
    <header class="admin-header">
        <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU TEC Logo" class="logo">
        <nav>
            <ul>
                <h1 class="company-name">WMSU <span >Testing and Evaluation Center</span></h1>
                <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('manage-content') }}">Manage Content</a></li>
                <li><a href="{{ route('user-management') }}">Manage Content</a></li>
                <li><a href="#">Appointment</a></li>
                <li><a href="#">Applicant</a></li>
                <li><a href="#">Announcement</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="{{ route('home') }}">Sign Out</a></li>
            </ul>
        </nav>
    </header>
    <!--DASHBOARD header-->
    
    <!--MANAGE CONTENT-->

    <!--MANAGE CONTENT-->
    
    <footer class="admin-footer">
        <p>&copy; 2023 WMSU TEC Admin Panel</p>
    </footer>
</body>
</html>
