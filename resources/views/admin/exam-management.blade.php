<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin exam management - WMSU TEC</title>
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
    <link href="{{ asset('css/ADMIN.css') }}" rel="stylesheet">
    <!--   js File -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/addexam.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</head>

<body class="admin-dashboard">

    <!-- ======= Header ======= -->
    @include('admin-components.admin-header');
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin-components.admin-sidebar');
    <!-- End Sidebar -->

    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Admin Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Examination</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#exam-management-tab">Exam Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#room-management-tab">Room Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#room-assignment-tab">Room Assignment</a>
            </li>
        </ul>

        <!-- Tab Content -->
    <div class="tab-content">
    <!-- Exam Management Tab -->
    <div class="tab-pane fade" id="exam-management-tab">
        <!-- Add Exam Button -->

     <!-- exam management table -->
    <table class="table table-bordered" id="exam-table">
    <thead>
        <tr>
            <th>Applicant Name</th>
            <th>Type of Exam</th>
            <th>Exam Name</th>
            <th>Date Applied</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Example applicant row -->
        <tr>
            <td>John Doe</td>
            <td>CET</td>
            <td>CET 1</td>
            <td>2023-09-20</td>
            <td>Approved</td>
            <td>
                <a href="#" class="btn btn">View Room</a>
            </td>
        </tr>
        <!-- Add more applicant rows as needed -->
    </tbody>
    </table>
    </div>


<!-- Room Management Tab -->
<div class="tab-pane fade" id="room-management-tab">
    <!-- Add Room Form -->
    <div class="add-room-form">
        <h3>Add a Room</h3>
        <form id="add-room-form">
            <label for="college-name">College Name:</label>
            <input type="text" id="college-name" name="college-name" required>

            <label for="room-name">Room Name/Number (Unique):</label>
            <input type="text" id="room-name" name="room-name" required>

            <label for="room-capacity">Capacity:</label>
            <input type="number" id="room-capacity" name="room-capacity" required>

            <label for="room-description">Room Description:</label>
            <textarea id="room-description" name="room-description" rows="4" required></textarea>

            <button type="submit">Add Room</button>
        </form>
    </div>

    <!-- List of Available Rooms -->
    <div class="available-rooms">
        <h3>Available Rooms</h3>
        <table>
            <thead>
                <tr>
                    <th>College Name</th>
                    <th>Room Name/Number (Unique)</th>
                    <th>Capacity</th>
                    <th>Room Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>College A</td>
                    <td>Room 101</td>
                    <td>30</td>
                    <td>Small lecture room</td>
                </tr>
                <tr>
                    <td>College B</td>
                    <td>Room 102</td>
                    <td>25</td>
                    <td>Medium-sized lecture room</td>
                </tr>
                <tr>
                    <td>College C</td>
                    <td>Room 103</td>
                    <td>35</td>
                    <td>Large lecture room</td>
                </tr>
                <!-- Add more room entries as needed -->
            </tbody>
        </table>
    </div>
</div>

<!-- Room Assignment Tab -->
<div class="tab-pane fade" id="room-assignment-tab">
    <!-- Room Assignment Form -->
    <div class="room-assignment-form">
        <h3>Assign Rooms for Examination</h3>
        <form id="room-assignment-form">
            <!-- Exam Name -->
            <div class="form-group">
                <label for="exam-select">Select Exam:</label>
                <select id="exam-select" name="exam-select">
                    <option value="exam-1">Exam 1</option>
                    <option value="exam-2">Exam 2</option>
                    <!-- Add more exams as needed -->
                </select>
            </div>

            <!-- Room Name -->
            <div class="form-group">
                <label for="room-select">Select Room:</label>
                <select id="room-select" name="room-select">
                    <option value="room-101">Room 101 (Capacity: 30)</option>
                    <option value="room-102">Room 102 (Capacity: 25)</option>
                    <option value="room-103">Room 103 (Capacity: 35)</option>
                    <!-- Add more rooms as needed -->
                </select>
            </div>

            <button type="submit">Assign Room</button>
        </form>
    </div>

    <!-- List of Room Assignments -->
    <div class="room-assignments">
        <h3>Room Assignments</h3>
        <!-- Display a list of room assignments here -->
        <ul>
            <li>Exam 1 is assigned to Room 101 (Capacity: 30)</li>
            <li>Exam 2 is assigned to Room 102 (Capacity: 25)</li>
            <!-- Add more room assignments as needed -->
        </ul>
    </div>
</div>

    </section>
    <!-- End Inserted Section -->
</main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   


</body>

</html>
