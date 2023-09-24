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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
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
        <button class="btn btn-primary add-exam-button" data-toggle="modal" data-target="#add-exam-modal">Add Exam</button>

        <!-- List of Exams (Table) -->
    <table class="table table-bordered" id="exam-table">
    <thead>
        <tr>
            <th>Exam Name</th>
            <th>Description</th>
            <th>Registration Period</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Example exam row -->
        <tr>
            <td>Exam 1</td>
            <td>Description for Exam 1</td>
            <td>2023-10-01 to 2023-10-15</td>
            <td>
                <a href="#" class="btn btn">Edit</a>
                <a href="#" class="btn btn">Delete</a>
            </td>
        </tr>
        <!-- Add more exam rows as needed -->
    </tbody>
    </table>
    </div>
<!-- Add Exam Modal with Start Date and End Date Fields -->
<div class="modal fade" id="add-exam-modal" tabindex="-1" role="dialog" aria-labelledby="add-exam-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-exam-modal-label">Add an Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add Exam Form with Start Date and End Date Fields -->
                <form id="add-exam-form">
                    <div class="form-group">
                        <label for="exam-name">Exam Name:</label>
                        <input type="text" class="form-control" id="exam-name" name="exam-name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="start-date">Start Date:</label>
                        <input type="date" class="form-control" id="start-date" name="start-date" required>
                    </div>

                    <div class="form-group">
                        <label for="end-date">End Date:</label>
                        <input type="date" class="form-control" id="end-date" name="end-date" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Exam</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- You can add additional buttons or actions here if needed -->
            </div>
        </div>
    </div>
</div>

            <!-- Room Management Tab -->
            <div class="tab-pane fade" id="room-management-tab">

                <!-- Add Room Form -->
                <div class="add-room-form">
                    <h3>Add a Room</h3>
                    <form id="add-room-form">
                        <label for="room-name">Room Name:</label>
                        <input type="text" id="room-name" name="room-name" required>

                        <label for="room-capacity">Room Capacity:</label>
                        <input type="number" id="room-capacity" name="room-capacity" required>

                        <button type="submit">Add Room</button>
                    </form>
                </div>

                <!-- List of Available Rooms -->
                <div class="available-rooms">
                    <h3>Available Rooms</h3>
                    <!-- Display a list of available rooms here -->
                    <ul>
                        <li>Room 101 (Capacity: 30)</li>
                        <li>Room 102 (Capacity: 25)</li>
                        <li>Room 103 (Capacity: 35)</li>
                        <!-- Add more room items as needed -->
                    </ul>
                </div>
            </div>


            <!-- Room Assignment Tab -->
            <div class="tab-pane fade" id="room-assignment-tab">
                <h2 class="custom-section-heading">Room Assignment for Examination</h2>

                <!-- Room Assignment Form -->
                <div class="room-assignment-form">
                    <h3>Assign Rooms for Examination</h3>
                    <form id="room-assignment-form">
                        <label for="exam-select">Select Exam:</label>
                        <select id="exam-select" name="exam-select">
                            <option value="exam-1">Exam 1</option>
                            <option value="exam-2">Exam 2</option>
                            <!-- Add more exams as needed -->
                        </select>

                        <label for="room-select">Select Room:</label>
                        <select id="room-select" name="room-select">
                            <option value="room-101">Room 101 (Capacity: 30)</option>
                            <option value="room-102">Room 102 (Capacity: 25)</option>
                            <option value="room-103">Room 103 (Capacity: 35)</option>
                            <!-- Add more rooms as needed -->
                        </select>

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

        </div>
    </section>
    <!-- End Inserted Section -->
</main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   


</body>

</html>
