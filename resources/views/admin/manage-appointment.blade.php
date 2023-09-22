<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin manage appointment - WMSU TEC</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/boxicons/2.0.7/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!--  Main CSS File -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!--   js File -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/appointment.js') }}"></script>
</head>

<body class="admin-dashboard">

    <!-- ======= Header ======= -->
    @include('admin-components.admin-header');
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin-components.admin-sidebar');
    <!-- End Sidebar -->

    <!-- ======= Main Content ======= -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manage Appointment</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Appointment</li>
                </ol>
            </nav>
        </div><!-- End Right side columns -->
        <!-- Insert Section -->
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
        <!-- End Inserted Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>
