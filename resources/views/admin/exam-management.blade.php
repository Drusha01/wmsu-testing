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
                    <li><a href="{{ route('admin-management') }}">Admin Management</a></li>
                    <li><a href="{{ route('user-management') }}">User Management</a></li>
                    <li><a href="{{ route('exam-management') }}">Exam Management</a></li>
                    <li><a href="{{ route('room-management') }}">Room Management</a></li>
                    <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                    <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                    <li><a href="{{ route('room-assignment') }}">Room Assignment</a></li>
                    <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                    <li><a href="{{ url('admin-chatsupport') }}">chat support</a></li>
                    <li><a href="{{ route('setting')}}">Settings</a></li>
                </ul>
            </nav>
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <li class="sign-out"><a href="{{ route('login') }}">Sign Out</a></li>
        </aside>

        <section class="admin-content">
        <h2 class="section-heading">Exam Management</h2>
                  <!-- Exam Management Table -->
   <div class="exam-management-filter">
        <label for="exam-search">Search:</label>
        <input type="text" id="exam-search" placeholder="Search...">
        <label for="exam-status-filter">Status:</label>
        <select id="exam-status-filter">
            <option value="all">All</option>
            <option value="active">Active</option>
            <option value="disabled">Disabled</option>
        </select>

        <div class="add-exam-button">
            <button id="addExamButton">Add Exam</button>
            
            <!-- Add New Exam Modal -->
            <div id="add-exam-modal" class="modal">
                <div class="modal-content">
                    <span class="close-button" id="close-add-exam-modal">&times;</span>
                    <h3>Add New Exam</h3>
                    <form id="add-exam-form">
                    <label for="exam-name">Exam Name:</label>
                    <input type="text" id="exam-name" name="exam-name" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="3" required></textarea>

                    <label for="start-date">Start Date:</label>
                    <input type="date" id="start-date" name="start-date" required>

                    <label for="end-date">End Date:</label>
                    <input type="date" id="end-date" name="end-date" required>

                    <label for="registration-link">Registration Link:</label>
                    <input type="url" id="registration-link" name="registration-link" required>

                    <label for="eligibility">Eligibility:</label>
                    <textarea id="eligibility" name="eligibility" rows="3" required></textarea>

                    <button type="submit">Add Exam</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

 <!-- Exam Management Table -->
<div class="exam-management-table">
    <table>
        <thead>
            <tr>
                <th>Exam Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Registration Link</th>
                <th>Status (Active/Disabled)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example exam rows -->
            <tr>
                <td>CET</td>
                <td>Description for CET</td>
                <td>2023-10-01</td>
                <td>2023-10-15</td>
                <td><a href="https://example.com/cet-registration">Register</a></td>
                <td>Active</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            <tr>
                <td>NAT</td>
                <td>Description for NAT</td>
                <td>2023-11-01</td>
                <td>2023-11-15</td>
                <td><a href="https://example.com/nat-registration">Register</a></td>
                <td>Disabled</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            <!-- Add more exam rows as needed -->
        </tbody>
    </table>
</div>
            </div>
        </section>
    </div>

</body>
</html>

