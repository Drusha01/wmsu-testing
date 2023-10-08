<div>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Exam management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam management</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#proctors-management-tab">Exam Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#assigned-proctors-tab">Assigned Proctors</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">

        <!-- Exam Management Tab -->
        <div class="tab-pane show active" id="proctors-management-tab">
            <!-- Exam Management Table -->
            <table class="application-table" id="exam-management-table">
                <thead>
                    <tr>
                        <th>Venue</th>
                        <th>Room</th>
                        <th>School Year</th>
                        <th>Capacity</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>WMSU MAIN</td>
                        <td>CLA 102</td>
                        <td>2023-2024</td>
                        <td>FULL</td>
                        <td>First Floor CLA Building</td>
                        <td>
                            <button class="btn btn-danger" id="assignProctorButton" style="background-color: #990000; border-color: #990000;">Assign Proctor</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <!-- Assigned proctors Tab -->
        <div class="tab-pane show" id="assigned-proctors-tab">
            <!-- List of Assigned Proctors Table -->
            <table class="application-table" id="assigned-proctors-tab">
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
                    <tr>
                        <td>John Smith</td>
                        <td>WMSU MAIN</td>
                        <td>CLA 102</td>
                        <td>2023-2024</td>
                        <td>FULL</td>
                        <td>First Floor CLA Building</td>
                        <td>
                        <button type="button" class="accept-button btn btn-primary btn-sm" data-toggle="modal" data-target="#">Edit</button>
                        <button type="button" class="decline-button btn btn-danger btn-sm" data-toggle="modal" data-target="#">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows for other assigned proctors as needed -->
                </tbody>
            </table>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
