<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@include('student-components.student-navigation')

<section class="student-profile-section">
    <div class="container">
        <h2 class="section-title">Student Profile</h2>
        <div class="profile-details">
            <div class="profile-image">
            <img src="{{ asset('images/courses/IT.png') }}" alt="Student Avatar">

            </div>
            <div class="profile-info">
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Student ID:</strong> 123456789</p>
                <p><strong>Email:</strong> johndoe@example.com</p>
                <p><strong>Status:</strong> Registered Applicant</p>
            </div>
        </div>
    </div>
</section>


<!-- content -->
<section class="feedback-and-surveys-section">
        <div class="container">
            <h2 class="section-title">Feedback and Surveys</h2>
            <div class="feedback-form">
                <p>We value your feedback. Please take a moment to complete the survey below:</p>
                <form>
                    <!-- Add your survey questions and input fields here -->
                    <div class="form-group">
                        <label for="question1">Question 1:</label>
                        <input type="text" id="question1" name="question1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="question2">Question 2:</label>
                        <textarea id="question2" name="question2" rows="4" class="form-control"></textarea>
                    </div>
                    <!-- Add more survey questions and input fields as needed -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>



<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
