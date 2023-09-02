<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
</head>
<body>
    
    <div class="container">
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <aside class="admin-sidebar">
            <div class="logo-company">
                <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU TEC Logo" class="logo">
                <h1 class="company-name">WMSU <span>Testing and Evaluation Center</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('manage-content') }}">Manage Content</a></li>
                    <li><a href="#">User Management</a></li>
                    <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                    <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                    <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <li class="sign-out"><a href="{{ route('login') }}">Sign Out</a></li>
        </aside>

        <section class="admin-content">
            <h2 class="section-heading">Manage Applicants</h2>
            
            <div class="overview-widgets">
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
            </div>
        </section>
    </div>

</body>
</html>
