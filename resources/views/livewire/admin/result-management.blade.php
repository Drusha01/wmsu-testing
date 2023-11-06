<div>
    <x-loading-indicator/>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Result Management</h1>
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
                <a class="nav-link active" data-bs-toggle="tab" href="#result-management-tab">Result Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#examinees-management-tab">Examinees Report</a>
            </li>
        </ul>
        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Result Management Tab -->
            <div class="tab-pane fade show active" id="result-management-tab">
                <div class="container-fluid">
                    <!-- Button to upload results -->
                    <button type="button" class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#uploadResultModal" >
                        Upload Result
                    </button>
                    <!-- Modal for Upload Result -->
                    <div class="modal fade" id="uploadResultModal" tabindex="-1" role="dialog" aria-labelledby="uploadResultModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadResultModalLabel">Upload Result</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Upload Result Form -->
                                    <form id="uploadResultForm">
                                        <div class="form-group">
                                            <label for="examType">Exam Type:</label>
                                            <select class="form-control" id="examType" name="examType">
                                                <option value="CET">CET</option>
                                                <option value="NAT">NAT</option>
                                                <option value="EAT">EAT</option>
                                                <option value="GSAT">GSAT</option>
                                                <option value="LSAT">LSAT</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="examYear">Exam Year:</label>
                                            <input type="text" class="form-control" id="examYear" name="examYear" placeholder="Enter Exam Year">
                                        </div>
                                        <div class "form-group">
                                            <label for="resultFile">Upload Result File:</label>
                                            <input type="file" class="form-control-file" id="resultFile" name="resultFile">
                                        </div>
                                    </form>
                                    <!-- End Upload Result Form -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" >Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Result Table -->
                    <div class="table-responsive">
                        <table class="application-table">
                            <thead>
                                <tr>
                                    <th>Exam Type</th>
                                    <th>Exam Year</th>
                                    <th>Uploaded File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row -->
                                <tr>
                                    <td>CET</td>
                                    <td>2023-2024</td>
                                    <td>
                                        <a href="link_to_uploaded_file.pdf" target="_blank">View File</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                    <!-- End Result Table -->
                </div>
            </div>
            <!-- End Result Management Tab -->

            <!-- Examinees Management Tab -->
            <div class="tab-pane fade" id="examinees-management-tab">
                <div class="container-fluid">
                    <!-- Button to download examinee list -->
                    <a href="#" class="btn btn-success mt-4" wire:click="download_file()">Download Examinee List</a>
                    <div class="table-responsive">
                        <table class="application-table">
                            <thead>
                                <tr>
                                    <th>Exam Type</th>
                                    <th>Exam Year</th>
                                    <th>Examinee File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row -->
                                <tr>
                                    <td>CET</td>
                                    <td>2023-2024</td>
                                    <td>
                                        <a href="link_to_uploaded_file.pdf" target="_blank">List of Examinee</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Examinees Management Tab -->
        </div>
        <!-- Back to Top Button -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    </div>
</main>
