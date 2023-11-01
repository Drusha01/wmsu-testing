<div>
    <!-- Content -->
    <div class="container">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#schedule-appointment">Schedule Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#view-appointments">My Appointments</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-2">
            <!-- Tab 1: Schedule Appointment -->
            <div class="tab-pane fade show active" id="schedule-appointment ">
                <div class="details-box w-50 mx-auto">
                    <div class="appointment-form">
                        <h4>Schedule Appointment</h4>
                        <!-- Appointment form goes here -->
                        <form>
                            <!-- Existing form fields (Date, Time, Purpose, Message) -->
                            <div class="form-group">
                                <label for="appointment-date">Preferred Appointment Date:</label>
                                <input type="date" class="form-control" id="appointment-date">
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
                            <th scope="col">Action</th> <!-- Added Action column for reschedule and cancel -->
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
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#rescheduleModal1">Reschedule</button>
                                <button class="btn btn-danger">Cancel</button> <!-- You can add the Cancel modal in a similar way -->
                            </td>
                        </tr>
                        <!-- ... (other appointments) ... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Reschedule Modal 1 -->
    <div class="modal fade" id="rescheduleModal1" tabindex="-1" role="dialog" aria-labelledby="rescheduleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel1">Reschedule Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Reschedule appointment form goes here -->
                    <form>
                        <div class="form-group">
                            <label for="new-appointment-date">New Appointment Date:</label>
                            <input type="date" class="form-control" id="new-appointment-date">
                        </div>
                        <div class="form-group">
                            <label for="new-appointment-time">New Appointment Time:</label>
                            <input type="time" class="form-control" id="new-appointment-time">
                        </div>
                        <div class="form-group">
                            <label for="new-appointment-purpose">New Purpose:</label>
                            <input type="text" class="form-control" id="new-appointment-purpose">
                        </div>
                        <!-- You can add more fields as needed -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    
</div>