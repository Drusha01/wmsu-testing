<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <!--DASHBOARD header-->
    <header class="admin-header">
        <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU TEC Logo" class="logo">
        <nav>
            <ul>
                <h1 class="company-name">WMSU <span>Testing and Evaluation Center</span></h1>
                <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('manage-content') }}">Manage Content</a></li>
                <li><a href="#">User Management</a></li>
                <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                <li><a href="#">Announcement</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="{{ route('login') }}">Sign Out</a></li>
            </ul>
        </nav>
    </header>
    <!--DASHBOARD header-->

<!-- Application Review and Approval Process Section -->
<section class="admin-application-review">
    <h2 class="section-heading">Application Review and Approval Process</h2>
    <div class="process-steps">
        <div class="step">
            <div class="step-number">1</div>
            <div class="step-content">
                <h3>Step 1: Application Review</h3>
                <p>Review the submitted applications for completeness and accuracy.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-number">2</div>
            <div class="step-content">
                <h3>Step 2: Document Verification</h3>
                <p>Verify the authenticity of uploaded documents and required information.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-content">
                <h3>Step 3: Evaluation</h3>
                <p>Evaluate the applicant's qualifications based on predefined criteria.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-number">4</div>
            <div class="step-content">
                <h3>Step 4: Interview</h3>
                <p>Conduct interviews if necessary to assess the applicant's suitability.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-number">5</div>
            <div class="step-content">
                <h3>Step 5: Approval Decision</h3>
                <p>Make the final decision to approve or reject the application.</p>
            </div>
        </div>
    </div>
</section>
<!-- End of Application Review and Approval Process Section -->


    <footer class="admin-footer">
        <p>&copy; {{ date('Y') }} WMSU TEC Admin Panel</p>
    </footer>
</body>
</html>
