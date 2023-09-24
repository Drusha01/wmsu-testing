<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage applicant - WMSU TEC</title>
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
    <!--  Main CSS File -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!--   js File -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
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
    
    <!-- ======= Main Content ======= -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manage Applicant</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Applicant</li>
                </ol>
            </nav>
        </div><!-- End Right side columns -->
        <!-- Insert Section -->

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#review-applicant-tab">Review Applicant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#accepted-applicant-tab">Accepted Applicant</a>
            </li>
        </ul>
         <!-- Tab Content -->
        <div class="tab-content">
        <!-- Reviewing applicant tab -->
        <div class="tab-pane fade" id="review-applicant-tab">
        <div class="examfilter-container">
            <label class="filter-label" for="exam-filter">Filter by Type of Exam:</label>
            <select class="filter-select" id="exam-filter">
                <option value="">All</option>
                <option value="College Entrance Exam">Cet</option>
                <option value="Nursing aptitude test">Nat</option>
                <option value="Engineering Aptitude test">Eat</option>
                <!-- Add more options as needed -->
            </select>
            <button class="accept-btn">Accept All</button>
        <button class="decline-btn">Decline All</button>
        </div>
                <!-- Application Review Table -->
                <table class="application-table">
            <thead>
                <tr>
                    <th>Approve</th> <!-- New column for checkmarks -->
                    <th>Applicant Name</th>
                    <th>Type of Exam</th>
                    <th>Exam Name</th>
                    <th>Date Applied</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Application Form</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox"></td> <!-- Checkmark input -->
                    <td>John Doe</td>
                    <td>CET</td>
                    <td>CET Exam</td>
                    <td>2023-09-15</td>
                    <td>Pending</td>
                    <td>
                        <button class="accept-button">Accept</button>
                        <button class="decline-button">Decline</button>
                    </td>
                    <td>
                        <button class="view-button">View</button>
                    </td>
                </tr>
    
                <tr>
                    <td><input type="checkbox"></td> <!-- Checkmark input -->
                    <td>John Doe</td>
                    <td>CET</td>
                    <td>CET Exam</td>
                    <td>2023-09-15</td>
                    <td>Pending</td>
                    <td>
                        <button class="accept-button">Accept</button>
                        <button class="decline-button">Decline</button>
                    </td>
                    <td>
                        <button class="view-button">View</button>
                    </td>
                </tr>
    
                <tr>
                    <td><input type="checkbox"></td> <!-- Checkmark input -->
                    <td>John Doe</td>
                    <td>CET</td>
                    <td>CET Exam</td>
                    <td>2023-09-15</td>
                    <td>Pending</td>
                    <td>
                        <button class="accept-button">Accept</button>
                        <button class="decline-button">Decline</button>
                    </td>
                    <td>
                        <button class="view-button">View</button>
                    </td>
                </tr>
                <!-- Add more application rows here -->
                
            </tbody>
        </table>
        </div>

            <!-- Accepted Applicant Tab -->
            <div class="tab-pane fade" id="accepted-applicant-tab">
                <!-- Application Review Table for accepted applicants -->
                <table class="application-table">
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>Type of Exam</th>
                            <th>Exam Name</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Application Form</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Accepted Applicant 1</td>
                            <td>CET</td>
                            <td>CET Exam</td>
                            <td>2023-09-10</td>
                            <td>Accepted</td>
                            <td>
                                <button class="view-button">View</button>
                            </td>
                            <td>
                                <a href="path_to_application_form.pdf" target="_blank">Download</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Accepted Applicant 2</td>
                            <td>NAT</td>
                            <td>Nursing Aptitude Test</td>
                            <td>2023-09-11</td>
                            <td>Accepted</td>
                            <td>
                                <button class="view-button">View</button>
                            </td>
                            <td>
                                <a href="path_to_application_form.pdf" target="_blank">Download</a>
                            </td>
                        </tr>
                        <!-- Add more accepted applicant rows here -->
                    </tbody>
                </table>
                </div>


        <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>

</html>
