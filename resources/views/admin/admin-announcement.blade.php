<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin announcement - WMSU TEC</title>
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

    <section class="announcement-form">
            <h2>Create New Announcement</h2>
            <form id="announcementForm">
                @csrf <!-- Add CSRF token for security -->
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="4" required></textarea>
                <button type="submit">Create Announcement</button>
            </form>
        </section>
        
        <section class="announcement-list">
            <h2>Announcements</h2>
            <ul id="announcementList">
                <!-- Announcements will be dynamically added here -->
            </ul>
        </section>


    <footer class="admin-footer">
        <p>&copy; {{ date('Y') }} WMSU TEC Admin Panel</p>
    </footer>
</body>
</html>
