<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/User.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@include('student-components.student-navigation')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Welcome to Your Profile</h2>
                <p>Here's your information:</p>
                <!-- Display applicant's ID number and other info here -->
                <p><strong>Applicant ID:</strong> [Applicant ID Number]</p>
                <p><strong>Name:</strong> [Applicant Name]</p>
                <p><strong>Email:</strong> [Applicant Email]</p>
                <!-- Add other information as needed -->
            </div>
    </div>
</section>

<!-- content -->
<section class="application-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Thank You for Registering!</h2>
                <p>Thank you for registering to WMSU Testing and Evaluation Center. We're excited to have you as part of our application process. Below, you'll find important information about the application process and key dates to remember.</p>
                <h3>Application Process</h3>
                <p>Our application process is simple and straightforward. Follow these steps to get started:</p>
                <ol>
                    <li>Create an account on our website.</li>
                    <li>Log in to your account and complete the application form.</li>
                    <li>Upload any required documents and information.</li>
                    <li>Submit your application.</li>
                </ol>
                <p>If you have any questions or need assistance, please don't hesitate to contact our support team.</p>
                <h3>Important Dates</h3>
                <p>Make sure to mark these dates in your calendar:</p>
                <ul>
                    <li>Application Deadline: [Insert Date]</li>
                    <li>Admission Test: [Insert Date]</li>
                    <li>Interviews: [Insert Date]</li>
                </ul>
            </div>
            <div class="col-lg-6 text-center">
                <a href="{{ route('student.application') }}" class="btn btn-primary">Start Application</a>
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
