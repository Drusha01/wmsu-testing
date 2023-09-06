<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin appointments - WMSU TEC</title>
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
    <h2 class="section-heading">Appointment Management</h2>

    <!-- Appointment Pending -->
    <h3>Appointment Pending</h3>
    <table class="appointment-table">
        <thead>
            <tr>
                <th>Full Name</th> <!-- New column for Full Name -->
                <th>Email Address</th> <!-- New column for Email Address -->
                <th>Phone Number</th> <!-- New column for Phone Number -->
                <th>Preferred Appointment Date</th> <!-- New column for Preferred Appointment Date -->
                <th>Purpose</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Client Showed</th>
                <th>Message</th> <!-- New column for Message -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>johndoe@example.com</td>
                <td>123456789</td>
                <td>2023-09-20</td>
                <td>Consultation</td>
                <td>Admin</td>
                <td>Appointment Pending</td>
                <td>No</td>
                <td>This is a message from the client.</td>
                <td>
                    <button>Accept</button>
                    <button>Decline</button>
                </td>
            </tr>
            <!-- Add more appointment rows here -->
        </tbody>
    </table>

    <!-- Appointment Accepted -->
    <h3>Appointment Accepted</h3>
    <table class="appointment-table">
        <thead>
            <tr>
                <th>Full Name</th> <!-- New column for Full Name -->
                <th>Email Address</th> <!-- New column for Email Address -->
                <th>Phone Number</th> <!-- New column for Phone Number -->
                <th>Preferred Appointment Date</th> <!-- New column for Preferred Appointment Date -->
                <th>Purpose</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th>Client Showed</th>
                <th>Message</th> <!-- New column for Message -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jane Smith</td>
                <td>janesmith@example.com</td>
                <td>987654321</td>
                <td>2023-09-21</td>
                <td>Assessment</td>
                <td>User</td>
                <td>Appointment Accepted</td>
                <td>Yes</td>
                <td>Client has confirmed the appointment.</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            <!-- Add more appointment rows here -->
        </tbody>
    </table>
    </section>


    </div>
</body>
</html>
