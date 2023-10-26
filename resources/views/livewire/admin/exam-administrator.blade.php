<div>
    <x-loading-indicator/>
        <!-- Main Content -->
        <main id="main" class="main">
        <div class="pagetitle">
            <h1>Exam administrator</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam Administrator</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#exam-administrator">Your Assigned proctor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#attendance-list">Attendance List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#proctor-list">Proctor List</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Proctor Table -->
            <div class="tab-pane active" id="exam-administrator">
                <div class="table-responsive">
                    <table class="application-table" id="proctor-table">
                        <thead>
                            <tr>
                                <th>Proctor Name</th>
                                <th>Venue</th>
                                <th>Room</th>
                                <th>School Year</th>
                                <th>Capacity</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample data for proctors (replace with actual data) -->
                            <tr>
                                <td>John Smith</td>
                                <td>Exam Venue 101</td>
                                <td>Room A</td>
                                <td>2023-2024</td>
                                <td>30</td>
                                <td>First Floor CLA Building</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#proctorInstructionsModal">View</button>
                                    <button class="btn btn-danger">Edit</button>
                                </td>
                            </tr>
                            <!-- Add more proctor entries as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

        <!-- Attendance List -->
        <div class="tab-pane" id="attendance-list">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block" id="scanQRCodeButton">Scan QR Code</button>
                        <div id="preview"></div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <table class="table table-bordered" id="attendanceListTable">
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>Attendance Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Attendance data will be displayed here -->
                        <tr>
                            <td>John Doe</td>
                            <td>Present</td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Present</td>
                        </tr>
                        <!-- Add more rows as needed with JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>


<!-- Instructions Modal -->
<div class="modal fade" id="proctorInstructionsModal" tabindex="-1" role="dialog" aria-labelledby="proctorInstructionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="proctorInstructionsModalLabel">Proctor Instructions</h5>
                <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
            </div>
            <div class="modal-body">
                <!-- Add your proctor instructions here -->
                <p>Welcome, Proctor (NAME). Here are your instructions:</p>
                    <!-- Download Button for Applicant List -->
                    <a href="#" class="btn btn-primary mt-2 align-center mb-2">Download Applicant List</a>
                <ol>
                    <li>Scan the QR code to check the applicants' information.</li>
                    <li>Ensure that all registered applicants are present.</li>
                    <li>Report any issues or discrepancies to the exam administrators.</li>
                </ol>

                <!-- Applicant List and Download Button -->
                <h1></h1>
                <p>Applicant List:</p>
                <table class="application-table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Applicant Name</th>
                            <th>CET</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Code 1</td>
                            <td>hanz dumapit</td>
                            <td>CET</td>
                        </tr>
                        <tr>
                            <td>Code 2</td>
                            <td>dap dap</td>
                            <td>CET</td>
                        </tr>
                        <!-- Add more rows for additional applicants -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



    <div class="tab-pane" id="proctor-list">
        <div class="table-responsive">
        <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addProctorModal">Add Proctor</button>
            <table class="application-table" id="proctorListTable">
                <thead>
                    <tr>
                        <th>Proctor Name</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Proctor names will be displayed here -->
                    <tr>
                        <td>John Smith</td>
                    </tr>
                    <!-- Add more proctor names as needed -->
                </tbody>
            </table>
        </div>
    </div>
<!-- Add Proctor Modal -->
<div class="modal fade" id="addProctorModal" tabindex="-1" role="dialog" aria-labelledby="addProctorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProctorModalLabel">Add Proctor</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add form fields for adding a new proctor here -->
                <form>
                    <div class="form-group">
                        <label for="proctorName">Proctor Name</label>
                        <input type="text" class="form-control" id="proctorName" placeholder="Enter Proctor Name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addProctorButton">Add Proctor</button>
            </div>
        </div>
    </div>
</div>

    </div>
        <!-- Back to Top Button -->
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
