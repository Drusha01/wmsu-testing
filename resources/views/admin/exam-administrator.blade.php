<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Exam Administration - WMSU TEC</title>
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
    <!-- Main CSS File -->
    <link href="{{ asset('css/ADMIN.css') }}" rel="stylesheet">
    <!-- JS Files -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/addexam.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</head>

<body class="admin-dashboard">

    <!-- Header -->
    @include('admin-components.admin-header');
    <!-- End Header -->

    <!-- Sidebar -->
    @include('admin-components.admin-sidebar');
    <!-- End Sidebar -->

    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Exam Administration</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam Administration</li>
                </ol>
            </nav>
        </div>

<!-- Exam Management Tab Content -->
<div class="tab-pane fade show active" id="exam-management-tab">
        <!-- Venue Filter -->
        <div class="venue-filter">
        <label for="venue-select">Filter by Venue:</label>
        <select id="venue-select" name="venue-select">
            <option value="all">All Venues</option>
            <option value="Venue 101">Venue 101</option>
            <option value="Venue 102">Venue 102</option>
            <option value="Venue 103">Venue 103</option>
            <!-- Add more venue options as needed -->
        </select>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="exam-administration-table">
            <thead>
                <tr>
                    <th>Applicant Name</th>
                    <th>Exam Name</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Venue</th>
                    <th>Check-in Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Exam 1</td>
                    <td>2023-09-30</td>
                    <td>09:30 AM</td>
                    <td>Exam Venue 101</td>
                    <td><span class="badge badge-success">Checked In</span></td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>Exam 2</td>
                    <td>2023-09-30</td>
                    <td>09:45 AM</td>
                    <td>Exam Venue 102</td>
                    <td><span class="badge badge-success">Checked In</span></td>
                </tr>
                <tr>
                    <td>Michael Johnson</td>
                    <td>Exam 3</td>
                    <td>2023-09-30</td>
                    <td>10:00 AM</td>
                    <td>Exam Venue 103</td>
                    <td><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                    <td>Sarah Brown</td>
                    <td>Exam 4</td>
                    <td>2023-09-30</td>
                    <td>10:15 AM</td>
                    <td>Exam Venue 104</td>
                    <td><span class="badge badge-danger">Absent</span></td>
                </tr>
                <!-- Add more applicant entries as needed -->
            </tbody>
        </table>
    </div>
    
    <!-- Pagination Controls -->
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</div>


    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>
