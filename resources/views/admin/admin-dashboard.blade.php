<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin dashboard - WMSU TEC</title>
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
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Right side columns -->
        <!-- Insert Section -->
        <section class="admin-content">
            <h2 class="section-heading">Admin Management</h2>
            <div class="overview-widgets">
                <!-- Your content widgets here -->
                <div class="widget">
                    <h3>User Management</h3>
                    <!-- Add user management UI elements here -->
                </div>
                <div class="widget">
                    <h3>Role Management</h3>
                    <!-- Add role management UI elements here -->
                </div>
            </div>
        </section><!-- End Inserted Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>

</html>
