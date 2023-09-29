<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin exam management - WMSU TEC</title>
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
    <link href="{{ asset('css/ADMIN.css') }}" rel="stylesheet">
    <!--   js File -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/addexam.js') }}"></script>
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
                <a class="nav-link active" data-toggle="tab" href="#exam-management-tab">Exam Management</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Exam Management Tab -->
            <div class="tab-pane show active" id="exam-management-tab">
                <!-- exam management table -->
                <!-- exam management table -->
                <table class="table table-bordered" id="exam-table">
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>Exam Name</th>
                            <th>Exam Date</th>
                            <th>Exam Time</th>
                            <th>Venue</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example applicant row -->
                        <tr>
                            <td>John Doe</td>
                            <td>CET 1</td>
                            <td>2023-09-20</td>
                            <td>07:00 AM</td>
                            <td>CLA 12</td>
                            <td>Approved</td>
                            <td>
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-success">View</a>
                            </td>
                        </tr>
                        <!-- Add more applicant rows as needed -->
                    </tbody>
                </table>

            </div>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>
