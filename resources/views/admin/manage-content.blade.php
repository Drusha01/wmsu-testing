<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin content - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>
<body>
    
<div class="container">
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <aside class="admin-sidebar">
            <div class="logo-company">
                <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU TEC Logo" class="logo">
                <h1 class="company-name">WMSU <span>Testing and Evaluation Center</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin-management') }}">Admin Management</a></li>
                    <li><a href="{{ route('user-management') }}">User Management</a></li>
                    <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                    <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                    <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                    <li><a href="{{ url('admin-chatsupport') }}">chat support</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <li class="sign-out"><a href="{{ route('login') }}">Sign Out</a></li>
        </aside>

        <section class="admin-content">
            <h2 class="section-heading">Manage Content</h2>
            
            <div class="overview-widgets">
                <!-- Your content widgets here -->
                <!-- Carousel Section -->
<div class="section">
    <h3 class="section-heading">Homepage Carousel</h3>
    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-item">
                <img src="images/slider/wm.jpg" alt="Carousel Image 1">
            </div>
            <!-- ... (other carousel items) ... -->
        </div>
    </div>
    <div class="carousel-actions">
        <button class="add-carousel-item">Add New Item</button>
        <!-- Add edit and delete buttons for each carousel item -->
        <div class="carousel-items">
            <div class="carousel-item">
                <span class="carousel-text">Slide 1 Text</span>
                <button class="edit-carousel-item">Edit</button>
                <button class="delete-carousel-item">Delete</button>
            </div>
            <!-- Repeat the above structure for each carousel item -->
        </div>
    </div>
</div>
<!-- ... (other sections) ... -->

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
            </div>
        </section>
    </div>

</body>
</html>
