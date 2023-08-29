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
                <li><a href="#">User Management</a></li>
                <li><a href="#">Appointment</a></li>
                <li><a href="#">Applicant</a></li>
                <li><a href="#">Announcement</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="{{ route('login') }}">Sign Out</a></li>
            </ul>
        </nav>
    </header>
    <!--DASHBOARD header-->
    
    <!--MANAGE CONTENT-->
    <section class="admin-manage-content">
        <h2 class="section-heading">Manage Content</h2>
        
        <div class="content-sections">
            <div class="section">
                <h3 class="section-heading">Services</h3>
                <ul class="content-list">
                    <li class="content-item">
                        <span class="content-title">Service 1</span>
                        <span class="content-actions">
                            <a href="#" class="edit-link">Edit</a>
                            <a href="#" class="delete-link">Delete</a>
                        </span>
                    </li>
                    <li class="content-item">
                        <span class="content-title">Service 2</span>
                        <span class="content-actions">
                            <a href="#" class="edit-link">Edit</a>
                            <a href="#" class="delete-link">Delete</a>
                        </span>
                    </li>
                    <!-- ... -->
                </ul>
                <a href="#" class="add-link">Add New</a>
            </div>
            
            <div class="section">
                <h3 class="section-heading">FAQs</h3>
                <ul class="content-list">
                    <li class="content-item">
                        <span class="content-title">FAQ 1</span>
                        <span class="content-actions">
                            <a href="#" class="edit-link">Edit</a>
                            <a href="#" class="delete-link">Delete</a>
                        </span>
                    </li>
                    <li class="content-item">
                        <span class="content-title">FAQ 2</span>
                        <span class="content-actions">
                            <a href="#" class="edit-link">Edit</a>
                            <a href="#" class="delete-link">Delete</a>
                        </span>
                    </li>
                    <!-- ... -->
                </ul>
                <a href="#" class="add-link">Add New</a>
            </div>
            
            <!-- Add more sections for other content types -->
        </div>
    </section>
    <!--MANAGE CONTENT-->
    
    <footer class="admin-footer">
        <p>&copy; 2023 WMSU TEC Admin Panel</p>
    </footer>
</body>
</html>
