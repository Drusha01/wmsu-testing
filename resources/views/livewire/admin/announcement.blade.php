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
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary accept-btn" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">Add Announcement</button>
                </div>
                <table class="appointment-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select"></th>
                            <th>Announcement Title</th>
                            <th>Type of Announcement</th>
                            <th>Content</th>
                            <th>Announcement Start-End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="select"></td>
                            <td>CET EXAM</td>
                            <td>IMAGE</td>
                            <td>Application of CET is OPEN</td>
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
        <div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAnnouncementModalLabel">Add Announcement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="announcement_title" class="form-label">Title of Announcement</label>
                                <input type="text" class="form-control" id="announcement_title" name="announcement_title" placeholder="Enter Title of Announcement" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type of Announcement</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="announcement_type" id="announcement_type_txt" value="Text" required>
                                    <label class="form-check-label" for="announcement_type_txt">Text</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="announcement_type" id="announcement_type_img" value="Image" required>
                                    <label class="form-check-label" for "announcement_type_img">Image</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Enter Content of Announcement</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="announcement_image" class="form-label">Upload Image</label>
                                <input class="form-control" type="file" id="announcement_image" name="announcement_image" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Start Date to End Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="daterange" placeholder="Select a date range">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Set Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="Active" value="Active" required>
                                    <label class="form-check-label" for="Active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="Disabled" value="Disabled" required>
                                    <label class="form-check-label" for="Disabled">Disabled</label>
                                </div>
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
