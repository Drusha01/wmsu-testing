<div>
<!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manage Announcement</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Announcement</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link show active" data-bs-toggle="tab" href="#announcement-tab">Announcement</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Announcement Tab -->
            <div class="tab-pane fade show active" id="announcement-tab">
                <div class="examfilter-container">
                    <label class="filter-label" for="announcement-filter">Filter:</label>
                    <select class="filter-select" id="announcement-filter">
                        <option value="">All</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        <!-- Add more options as needed -->
                    </select>
                    <button class="btn btn-primary accept-btn" data-bs-toggle="modal" data-bs-target="#AddAnnouncementModal">Add Announcement</button>

                </div>
                <table class="appointment-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select"></th>
                            <th>Announcement Name</th>
                            <th>Description</th>
                            <th>Announcement Start-End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="select"></td>
                            <td>CET</td>
                            <td>College entrance examination is now accepting applicants</td>
                            <td>2023-12-21 - 2023-12-24</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-primary action-btn">Edit</button>
                                <button class="btn btn-danger action-btn">Delete</button>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Tab Content -->

        <!-- Add Announcement Modal -->
        <div class="modal fade" id="AddAnnouncementModal" data-bs-toggle="modal"  role="dialog" aria-labelledby="AddAnnouncementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-body">
                        <form id="announcementForm">
                            <div class="form-group">
                                <label for="announcementName">Announcement Name</label>
                                <input type="text" class="form-control" id="announcementName" placeholder="Enter Announcement Name">
                            </div>
                            <div class="form-group">
                                <label for="announcementDescription">Description</label>
                                <textarea class="form-control" id="announcementDescription" rows="4" placeholder="Enter Announcement Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="announcementDates">Announcement Start-End</label>
                                <input type="text" class="form-control" id="announcementDates" placeholder="Enter Start and End Dates">
                            </div>
                            <div class="form-group">
                                <label for="announcementStatus">Status</label>
                                <select class="form-control" id="announcementStatus">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveAnnouncementButton">Save Announcement</button>
                    </div>
                </div>
            </div>
        </div>
    
        
    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>


