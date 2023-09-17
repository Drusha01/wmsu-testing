<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@include('student-components.student-navigation')

@include('student-components.student-navtabs')


    <div role="tabpanel" class="tab-pane" id="profile">
        <!-- Applicant Profile Information -->
        <div class="applicant-profile">
            <!-- Div 1: Applicant Profile Picture, Name, and Status -->
            <div class="profile-section">
                <img src="applicant-profile-picture.jpg" alt="Applicant's Profile Picture">
                <h3>Applicant Name</h3>
                <p>Status: Registered</p>
            </div>

            <!-- Div 2: Applicant Details -->
            <div class="details-section">
                <h4>Applicant Details</h4>
                <p>Full Name: John Doe</p>
                <p>Gender: Male</p>
                <p>Home Address: 123 Main St, City</p>
                <p>Email (if verified): john.doe@example.com</p>
                <p>Account Created: January 1, 2023</p>
                <p>Birthdate: January 15, 2000</p>
                <p>Senior High School: Sample High School</p>
                <p>Strand: STEM</p>
                <button id="modifyButton">Modify Information</button>
            </div>
        </div>

        <!-- Div 3: Applicant's Applied Examinations -->
        <div class="examinations-section">
            <h4>Applied Examinations</h4>
            <div class="examination">
                <h5>Exam 1</h5>
                <p>Date: January 20, 2023</p>
                <p>Location: Exam Center 1</p>
            </div>
            <div class="examination">
                <h5>Exam 2</h5>
                <p>Date: February 5, 2023</p>
                <p>Location: Exam Center 2</p>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
