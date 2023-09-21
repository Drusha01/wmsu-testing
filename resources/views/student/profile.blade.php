<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/USER.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

@include('student-components.student-navigation')
@include('student-components.student-navtabs')
<!-- content-->
<section class="profile-section">
        <div class="container">
            <h2 class="profile-">Applicant information</h2>
<div class="Applicant-container">
    <div class="Applicant-info">
        <div class="profile-box">
            <div class="profile-image-container">
                <input type="file" id="profileImageInput" style="display: none;">
                <label for="profileImageInput" class="profile-image-label">
                    <div class="profile-image">
                        <i class="fas fa-user fa-5x"></i>
                    </div>
                </label>
            </div>
            <h3 class="mt-3">Applicant Name</h3>
            <p class="text-muted">Status: Registered</p>
            <button id="modifyButton" class="btn btn-primary">Modify Information</button>
        </div>
    </div>
    <div class="applicant-details">
        <div class="details-box">
            <h4>Applicant Details</h4>
            <ul class="list-group">
                <li class="list-group-item"><strong>Full Name:</strong> John Doe</li>
                <li class="list-group-item"><strong>Gender:</strong> Male</li>
                <li class="list-group-item"><strong>Home Address:</strong> 123 Main St, City</li>
                <li class="list-group-item"><strong>Email (if verified):</strong> john.doe@example.com</li>
                <li class="list-group-item"><strong>Account Created:</strong> January 1, 2023</li>
                <li class="list-group-item"><strong>Birthdate:</strong> January 15, 2000</li>
                <li class="list-group-item"><strong>Senior High School:</strong> Sample High School</li>
                <li class="list-group-item"><strong>Strand:</strong> STEM</li>
                <li class="list-group-item"><strong>Awards (if any):</strong> Dean's List, Science Fair Champion</li>
            </ul>
        </div>
    </div>
</div>

<div class="requiremement">
                <h4>Requirements Upload</h4>
                <p>Upload the following documents:</p>
                <ul class="list-group">
                    <li class="list-group-item">1. High School Transcript</li>
                    <li class="list-group-item">2. Birth Certificate</li>
                    <li class="list-group-item">3. Photo ID</li>
                    <!-- Add more document requirements as needed -->
                </ul>
                <button id="uploadRequirementsButton" class="btn btn-primary">Upload Requirements</button>
            </div>
        </div>
    </div>
</div>
<!-- content-->
</section>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
