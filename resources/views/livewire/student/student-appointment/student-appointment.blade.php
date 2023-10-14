<div>
    <!-- Content -->
    <div class="container">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#schedule-appointment">Schedule Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#view-appointments">View Appointments</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Tab 1: Schedule Appointment -->
            <div class="tab-pane fade show active" id="schedule-appointment">
                <div class="details-box w-50 mx-auto">
                    <div class="appointment-form">
                        <h4>Schedule Appointment</h4>
                        <!-- Appointment form goes here -->
                        <form>
                            <div class="form-group">
                                <label for="appointment-date">Preferred Appointment Date:</label>
                                <input type="date" class="form-control" id="appointment-date">
                            </div>
                            <div class="form-group">
                                <label for="appointment-time">Appointment Time:</label>
                                <input type="time" class="form-control" id="appointment-time">
                            </div>
                            <div class="form-group">
                                <label for="appointment-purpose">Purpose:</label>
                                <input type="text" class="form-control" id="appointment-purpose">
                            </div>
                            <div class="form-group">
                                <label for="appointment-message">Message (optional):</label>
                                <input type="text" class="form-control" id="appointment-message">
                            </div>
                            <button type="submit" class="btn btn-primary">Schedule</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tab 2: View Appointments -->
            <div class="tab-pane fade" id="view-appointments">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Purpose</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Appointments will be displayed here -->
                        <tr>
                            <td>1</td>
                            <td>2023-10-15</td>
                            <td>10:00 AM</td>
                            <td>Admission Inquiry</td>
                            <td>Approved</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2023-10-20</td>
                            <td>2:30 PM</td>
                            <td>Scholarship Application</td>
                            <td>Approved</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>