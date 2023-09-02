<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard - WMSU TEC</title>
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
                    <li><a href="{{ route('manage-content') }}">Manage Content</a></li>
                    <li><a href="#">User Management</a></li>
                    <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                    <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                    <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <li class="sign-out"><a href="{{ route('login') }}">Sign Out</a></li>
        </aside>

        <section class="admin-content">
            <h2 class="section-heading">Manage Appointments</h2>
            
            <div class="overview-widgets">
                <!-- Your content widgets here -->
                <main class="admin-main">
        <section class="appointments">
            <h2>Appointments</h2>
            <div class="appointment-item">
                <div class="appointment-header">
                    <div class="appointment-status">Pending</div>
                    <div class="appointment-actions">
                        <button class="btn-approve">Approve</button>
                        <button class="btn-reject">Reject</button>
                    </div>
                </div>
                <div class="appointment-details">
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Phone:</strong> 123-456-7890</p>
                    <p><strong>Appointment Date:</strong> 2023-09-01</p>
                    <p><strong>Message:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <!-- Add more appointment items as needed -->
        </section>
    </main>
            </div>
        </section>
    </div>

</body>
</html>
