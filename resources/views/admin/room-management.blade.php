<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin room management - WMSU TEC</title>
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
    <!-- Main CSS File -->
    <link href="{{ asset('css/ADMIN.css') }}" rel="stylesheet">
    <!-- JS Files -->
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
            <h1>Room Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Room Management</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link Active" data-toggle="tab" href="#room-management-tab">Room Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#room-assignment-tab">Room Assignment</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">


<!-- Room Management Tab -->
<div class="tab-pane fade" id="room-management-tab">
    <!-- Room Management Table -->
    <table class="table table-bordered" id="room-management-table">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Button to trigger the Add Room modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRoomModal">Add Room</button>
    </div>
        <thead>
            <tr>
                <th>College Name</th>
                <th>Room Name/Number (Unique)</th>
                <th>Capacity</th>
                <th>Room Description</th>
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>College of Liberal Arts</td>
                <td>CLA 12</td>
                <td>12</td>
                <td>First Floor</td>
                <td>
                    <!-- Button to trigger the Edit Room modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                    <!-- Button to trigger the Delete Room confirmation modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteRoomModal">Delete</button>
                </td>
            </tr>
            <tr>
                <td>College of Law</td>
                <td>Law 102</td>
                <td>25</td>
                <td>Lecture room 1st floor</td>
                <td>
                    <!-- Button to trigger the Edit Room modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                    <!-- Button to trigger the Delete Room confirmation modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteRoomModal">Delete</button>
                </td>
            </tr>
            <tr>
                <td>CSM</td>
                <td>CSM 103</td>
                <td>31</td>
                <td>Large lecture room</td>
                <td>
                    <!-- Button to trigger the Edit Room modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editRoomModal">Edit</button>
                    <!-- Button to trigger the Delete Room confirmation modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteRoomModal">Delete</button>
                </td>
            </tr>
            <!--  more room entries as needed -->
        </tbody>
    </table>
</div>

<!-- Edit Room Modal -->
<div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoomModalLabel">Edit Room Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for editing room details -->
                <form id="editRoomForm">
                    <div class="form-group">
                        <label for="editCollegeName">College Name:</label>
                        <input type="text" class="form-control" id="editCollegeName" name="editCollegeName" required>
                    </div>
                    <div class="form-group">
                        <label for="editRoomName">Room Name/Number (Unique):</label>
                        <input type="text" class="form-control" id="editRoomName" name="editRoomName" required>
                    </div>
                    <div class="form-group">
                        <label for="editRoomCapacity">Capacity:</label>
                        <input type="number" class="form-control" id="editRoomCapacity" name="editRoomCapacity" required>
                    </div>
                    <div class="form-group">
                        <label for="editRoomDescription">Room Description:</label>
                        <textarea class="form-control" id="editRoomDescription" name="editRoomDescription" rows="4" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveEditRoom">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Room Confirmation Modal -->
<div class="modal fade" id="deleteRoomModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRoomModalLabel">Confirm Delete Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this room?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>



            

<!-- Room Assignment Tab -->
<div class="tab-pane fade" id="room-assignment-tab">
    <!-- Room Assignment Form -->

    <!-- List of Room Assignments -->
    <div class="room-assignments">
        <h3>Room Assignments</h3>
        <!-- Displays a table of room assignment and list of applicants -->
        <table class="table table-bordered" id="room-assignment-table">
            <thead>
                <tr>
                    <th>Room Name/Number</th>
                    <th>Capacity</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Room 101</td>
                    <td>30</td>
                    <td>
                        <!-- View button to display the list of names -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewNamesModal">View</button>
                        <!-- Download button to download the list of names -->
                        <a href="#" class="btn btn-success btn-sm" download="Room102_Names.txt">Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Room 102</td>
                    <td>25</td>
                    <td>
                        <!-- View button to display the list of names -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewNamesModal">View</button>
                        <!-- Download button to download the list of names -->
                        <a href="#" class="btn btn-success btn-sm" download="Room102_Names.txt">Download</a>
                    </td>
                </tr>
                <tr>
                    <td>Room 103</td>
                    <td>35</td>
                    <td>
                        <!-- View button to display the list of names -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewNamesModal">View</button>
                        <!-- Download button to download the list of names -->
                        <a href="#" class="btn btn-success btn-sm" download="Room102_Names.txt">Download</a>
                    </td>
                </tr>
                <!-- Add more room assignments as needed -->
            </tbody>
        </table>
    </div>
</div>

<!-- View Names Modal (Add the modal content as needed) -->
<div class="modal fade" id="viewNamesModal" tabindex="-1" role="dialog" aria-labelledby="viewNamesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewNamesModalLabel">Assigned Applicants</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display the list of assigned applicant names here -->
                <ul>
                    <li>John Doe</li>
                    <li>Jane Smith</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>
