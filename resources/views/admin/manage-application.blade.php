<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin applicant - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
            <h2 class="section-heading">Application Review and Approval Process</h2>

            <!-- Application Review Table -->
            <table class="application-table">
                <thead>
                    <tr>
                        <th>Applicant Name</th>
                        <th>Type of Exam</th>
                        <th>Exam Name</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Application Form</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Mathematics</td>
                        <td>Mathematics Exam</td>
                        <td>2023-09-15</td>
                        <td>Pending</td>
                        <td>
                            <button class="accept-button">Accept</button>
                            <button class="decline-button">Decline</button>
                        </td>
                        <td>
                            <button class="view-button">View</button>
                        </td>
                    </tr>
                    <!-- Add more application rows here -->
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
