   <div>   <!-- Main Content -->
      <main id="main" class="main">
            <div class="pagetitle">
                <h1>Manage Appointment</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Appointment</li>
                    </ol>
                </nav>
            </div>

            <!-- Tab Navigation -->
            <ul class="nav nav-tabs" id="adminTabs">
                <li class="nav-item">
                    <a class="nav-link show active" data-bs-toggle="tab" href="#appointment-pending-tab">Appointment Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#appointment-accepted-tab">Appointment Accepted</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#scheduled-appointments-tab">Schedule Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#appointment-completed-tab">Appointment Completed</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Appointment Pending Tab -->
                <div class="tab-pane fade show active" id="appointment-pending-tab">
                    <div class="examfilter-container">
                        <label class="filter-label" for="exam-filter-pending">Filter by Date:</label>
                        <select class="filter-select" id="exam-filter-pending">
                            <option value="">All</option>
                            <option value="College Entrance Exam">Today</option>
                            <option value="Nursing aptitude test">Yesterday</option>
                            <option value="Engineering Aptitude test">TBD</option>
                            <!-- Add more options as needed -->
                        </select>
                        <button class="btn btn-primary accept-btn">Accept</button>
                        <button class="btn btn-danger decline-btn">Delete</button>
                    </div>
                    <table class="appointment-table">
                    <thead>
                            <tr>
                                <th><input type="checkbox" name="select"></th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Preferred Date</th>
                                <th>Purpose</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="select"></td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td>2023-10-17</td>
                                <td>Consultation</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-primary action-btn">Accept</button>
                                    <button class="btn btn-danger action-btn">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Appointment Accepted Tab -->
                <div class="tab-pane fade" id="appointment-accepted-tab">
                    <div class="examfilter-container">
                        <label class="filter-label" for="exam-filter-accepted">Filter by Type of Exam:</label>
                        <select class="filter-select" id="exam-filter-accepted">
                            <option value="">All</option>
                            <option value="College Entrance Exam">Cet</option>
                            <option value="Nursing aptitude test">Nat</option>
                            <option value="Engineering Aptitude test">Eat</option>
                            <!-- Add more options as needed -->
                        </select>
                        <button class="btn btn-primary accept-btn">Done</button>
                        <button class="btn btn-danger decline-btn">Delete</button>
                    </div>
                    <table class="appointment-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="select"></th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Preferred Date</th>
                                <th>Purpose</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="select"></td>
                                <td>Jane Smith</td>
                                <td>janesmith@example.com</td>
                                <td>2023-10-18</td>
                                <td>Checkup</td>
                                <td>Accepted</td>
                                <td>
                                    <button class="btn btn-primary action-btn">View</button>
                                    <button class="btn btn-danger action-btn">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Scheduled Appointments Tab -->
                <div class="tab-pane fade" id="scheduled-appointments-tab">
                    <div class="examfilter-container">
                        <label class="filter-label" for="exam-filter-scheduled">Filter by Type of Exam:</label>
                        <select class="filter-select" id="exam-filter-scheduled">
                            <option value="">All</option>
                            <option value="College Entrance Exam">Cet</option>
                            <option value="Nursing aptitude test">Nat</option>
                            <option value="Engineering Aptitude test">Eat</option>
                            <!-- Add more options as needed -->
                        </select>
                        <button class="btn btn-warning action-btn" data-bs-toggle="modal" data-bs-target="#requestRescheduleModal">Request Reschedule</button>
                    </div>
                    <table class="appointment-table">
                        <thead>
                            <tr>
                            <th><input type="checkbox" name="select"></th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Preferred Date</th>
                                <th>Purpose</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><input type="checkbox" name="select"></td>
                                <td>User</td>
                                <td>admin@example.com</td>
                                <td>2023-10-19</td>
                                <td>Scheduled</td>
                                <td>Accepted</td>
                                <td>
                                    <button class="btn btn-primary action-btn" data-bs-toggle="modal" data-bs-target="#markDoneModal">Mark Done</button>
                                </td>
                            </tr>
                            <!-- Add more scheduled appointments as needed -->
                        </tbody>
                    </table>
                </div>
                <!-- Request Reschedule Modal -->
                <div class="modal fade" id="requestRescheduleModal" tabindex="-1" role="dialog" aria-labelledby="requestRescheduleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="requestRescheduleModalLabel">Request Reschedule</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Would you like to request a reschedule for this appointment?</p>
                                <p>Please provide your preferred date and time:</p>
                                <input type="datetime-local" id="rescheduleDateTime" class="form-control" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-toggle="modal" data-target="#rescheduleRequestSubmittedModal">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appointment Completed Tab -->
                <div class="tab-pane fade" id="appointment-completed-tab">
                    <div class="examfilter-container">
                        <label class="filter-label" for="exam-filter-completed">Filter by Type of Exam:</label>
                        <select class="filter-select" id="exam-filter-completed">
                            <option value="">All</option>
                            <option value="College Entrance Exam">Cet</option>
                            <option value="Nursing aptitude test">Nat</option>
                            <option value="Engineering Aptitude test">Eat</option>
                            <!-- Add more options as needed -->
                        </select>
                        <button class="btn btn-danger decline-btn">Delete</button>
                    </div>
                    <table class=" appointment-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="select"></th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Preferred Date</th>
                                <th>Purpose</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="select"></td>
                                <td>Alice Brown</td>
                                <td>alicebrown@example.com</td>
                                <td>2023-10-16</td>
                                <td>Follow-up</td>
                                <td>Completed</td>
                                <td>
                                    <button class="btn btn-danger action-btn">Delete</button>
                                </td>
                            </tr>
                            <!-- Add more completed appointments as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mark Done Modal -->
            <div class="modal fade" id="markDoneModal" tabindex="-1" role="dialog" aria-labelledby="markDoneModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="markDoneModalLabel">Mark Appointment as Done</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to mark this appointment as done?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#moveToCompletedModal">Yes, Mark Done</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Move to Completed Modal -->
            <div class="modal fade" id="moveToCompletedModal" tabindex="-1" role="dialog"
                aria-labelledby="moveToCompletedModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="moveToCompletedModalLabel">Appointment Marked as Done</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            The appointment has been marked as done and moved to the "Appointment Completed" tab.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Back to Top Button -->
        <a href="#"
            class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    </div>