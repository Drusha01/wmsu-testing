<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin appointments - WMSU TEC</title>
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
        <h2 class="section-heading">Appointment Management</h2>

        <!-- Tab Buttons -->
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'pending')" id="defaultOpen">Appointment Pending</button>
            <button class="tablinks" onclick="openTab(event, 'accepted')">Appointment Accepted</button>
        </div>

        <!-- Tab Content - Appointment Pending -->
        <div id="pending" class="tabcontent">
            <h3>Appointment Pending</h3>
            <table class="appointment-table">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Preferred Appointment Date</th>
                    <th>Purpose</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Client Showed</th>
                    <th>Message</th>
                    <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                <tr>
            <td>John Doe</td>
            <td>johndoe@example.com</td>
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
                <tr>
        <td>Jane Smith</td>
        <td>janesmith@example.com</td>
        <td>2023-09-22</td>
        <td>Assessment</td>
        <td>User</td>
        <td>Appointment Pending</td>
        <td>No</td>
        <td>Client has not confirmed yet.</td>
        <td>
            <button>Accept</button>
            <button>Decline</button>
        </td>
    </tr>
    <tr>
        <td>Alice Johnson</td>
        <td>alice@example.com</td>
        <td>2023-09-25</td>
        <td>Consultation</td>
        <td>Admin</td>
        <td>Appointment Pending</td>
        <td>No</td>
        <td>About my application</td>
        <td>
            <button>Accept</button>
            <button>Decline</button>
        </td>
    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tab Content - Appointment Accepted -->
        <div id="accepted" class="tabcontent">
            <h3>Appointment Accepted</h3>
            <table class="appointment-table">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Preferred Appointment Date</th>
                    <th>Purpose</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Client Showed</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
        <td>Mary Johnson</td>
        <td>mary@example.com</td>
        <td>2023-09-21</td>
        <td>Assessment</td>
        <td>Admin</td>
        <td>Appointment Accepted</td>
        <td>Yes</td>
        <td>Client confirmed the appointment.</td>
        <td>
            <button>Edit</button>
            <button>Delete</button>
        </td>
    </tr>
    <tr>
        <td>Michael Brown</td>
        <td>michael@example.com</td>
        <td>2023-09-23</td>
        <td>Consultation</td>
        <td>User</td>
        <td>Appointment Accepted</td>
        <td>Yes</td>
        <td>Client has confirmed the appointment.</td>
        <td>
            <button>Edit</button>
            <button>Delete</button>
        </td>
    </tr>
    <tr>
        <td>David Lee</td>
        <td>david@example.com</td>
        <td>2023-09-24</td>
        <td>Assessment</td>
        <td>Admin</td>
        <td>Appointment Accepted</td>
        <td>Yes</td>
        <td>Client confirmed the appointment.</td>
        <td>
            <button>Edit</button>
            <button>Delete</button>
        </td>
    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- JavaScript for tab functionality -->
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        // Hide all tab content
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Deactivate all tab buttons
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the selected tab content and mark the button as active
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Open the default tab (e.g., "Appointment Pending")
    document.getElementById("defaultOpen").click();
</script>
</body>
</html>
