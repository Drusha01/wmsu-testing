<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@include('student-components.student-navigation')

<section class="application-status-section">
    <div class="container">
        <h2 class="section-title">Application Status</h2>
        <div class="status-container">
            <div class="status-card">
                <div class="status-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="status-details">
                    <h3 class="status-title">Application Received</h3>
                    <p class="status-description">Your application has been successfully received.</p>
                    <p class="status-date">Date: September 15, 2023</p>
                    <a href="#" class="view-button">View</a>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="status-details">
                    <h3 class="status-title">In Review</h3>
                    <p class="status-description">Your application is currently under review.</p>
                    <p class="status-date">Expected Review Completion: September 30, 2023</p>
                    <a href="#" class="view-button">View</a>
                </div>
            </div>
            <div class="status-card">
                <div class="status-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="status-details">
                    <h3 class="status-title">Application Denied</h3>
                    <p class="status-description">Unfortunately, your application has been denied.</p>
                    <p class="status-date">Date of Denial: October 5, 2023</p>
                    <a href="#" class="view-button">View</a>
                </div>
            </div>
        </div>
    </div>
</section>






<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
