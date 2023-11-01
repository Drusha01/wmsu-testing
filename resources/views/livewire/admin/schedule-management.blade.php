<!-- Main Content -->
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Schedule Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Schedule Management</li>
            </ol>
        </nav>
    </div>

    <!-- Schedule Management Section -->
    <section id="schedule-section">
        <!-- Button to Add Schedule (moved above the table) -->
        <button class="btn btn-success add-schedule-btn mt-2" data-bs-toggle="modal" data-bs-target="#addScheduleModal">Add Schedule</button>

        <table class="application-table mt-2">
        <thead>
            <tr>
                <th><input type="checkbox" name="select"></th>
                <th>Date Start - Date End</th>
                <th>Event</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" name="select"></td>
                <td>2023-10-25</td>
                <td>Entrance Exam</td>
                <td>10:00 AM</td>
                <td>Available</td>
                <td>
                    <button class="btn btn-primary reschedule-btn">Reschedule</button>
                    <button class="btn btn-danger cancel-btn">Cancel</button>
                    <button class="btn btn-info edit-btn" data-bs-toggle="modal" data-bs-target="#editScheduleModal">Edit</button>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" name="select"></td>
                <td>2023-11-05</td>
                <td>Interview</td>
                <td>2:30 PM</td>
                <td>unavailable</td>
                <td>
                    <button class="btn btn-primary reschedule-btn">Reschedule</button>
                    <button class="btn btn-danger cancel-btn">Cancel</button>
                    <button class="btn btn-info edit-btn" data-bs-toggle="modal" data-bs-target="#editScheduleModal">Edit</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

        <!-- Modal for Adding Schedule -->
        <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addScheduleModalLabel">Add Schedule</h5>
                        <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!-- Form for Adding a Schedule Entry -->
                        <form id="addScheduleForm">
                            <div class="form-group">
                                <label for="scheduleDate">Date:</label>
                                <input type="date" class="form-control" id="scheduleDate" name="scheduleDate">
                            </div>
                            <div class="form-group">
                                <label for="scheduleEvent">Event:</label>
                                <input type="text" class="form-control" id="scheduleEvent" name="scheduleEvent">
                            </div>
                            <div class="form-group">
                                <label for="scheduleTime">Time:</label>
                                <input type="time" class="form-control" id="scheduleTime" name="scheduleTime">
                            </div>
                            <!-- status if available for unavailable -->
                            <!-- <div class="form-group">
                                <label for="scheduleTime">Time:</label>
                                <input type="time" class="form-control" id="scheduleTime" name="scheduleTime">
                            </div> -->
                        </form>
                        <!-- End Form for Adding a Schedule Entry -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="addScheduleButton">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal for Adding Schedule -->
        <!-- Modal for Editing Schedule -->
    <div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editScheduleModalLabel">Edit Schedule</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for Editing a Schedule Entry -->
                    <form id="editScheduleForm">
                        <div class="form-group">
                            <label for="editScheduleDate">Date:</label>
                            <input type="date" class="form-control" id="editScheduleDate" name="editScheduleDate">
                        </div>
                        <div class="form-group">
                            <label for="editScheduleEvent">Event:</label>
                            <input type="text" class="form-control" id="editScheduleEvent" name="editScheduleEvent">
                        </div>
                        <div class="form-group">
                            <label for="editScheduleTime">Time:</label>
                            <input type="time" class="form-control" id="editScheduleTime" name="editScheduleTime">
                        </div>
                    </form>
                    <!-- End Form for Editing a Schedule Entry -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="editScheduleButton">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal for Editing Schedule -->

    </section>
    <!-- End Schedule Management Section -->
</main>
</div>