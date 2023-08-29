<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<header class="admin-header">
        <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU TEC Logo" class="logo">
        <nav>
            <ul>
                <h1 class="company-name">WMSU <span>Testing and Evaluation Center</span></h1>
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

    
    <footer class="admin-footer">
        <p>&copy; {{ date('Y') }} WMSU TEC Admin Panel</p>
    </footer>
</body>
</html>
