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

<section class="academic-information-section">
    <div class="container">
        <h2 class="section-title">Academic Information</h2>
        <!-- Educational Background -->
        <div class="educational-background">
            <h3>Educational Background</h3>
            <ul>
                <li>
                    <strong>School Name:</strong> ABC High School
                    <br>
                    <strong>Grades:</strong> A+
                    <br>
                    <strong>Graduation Date:</strong> May 2020
                </li>
                <!-- Add more educational background items as needed -->
            </ul>
        </div>

        <!-- Applied Programs -->
        <div class="applied-programs">
            <h3>Applied Programs</h3>
            <ul>
                <li>Program 1</li>
                <li>Program 2</li>
                <!-- Add more applied programs as needed -->
            </ul>
        </div>

        <!-- Test Scores -->
        <div class="test-scores">
            <h3>Test Scores</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Test Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Test 1</td>
                        <td>95%</td>
                    </tr>
                    <tr>
                        <td>Test 2</td>
                        <td>88%</td>
                    </tr>
                    <!-- Add more test scores as needed -->
                </tbody>
            </table>
        </div>

        <!-- Test History -->
        <div class="test-history">
            <h2 class="section-title">Test History</h2>
            <!-- List of Tests -->
            <ul class="list-of-tests">
                <li>
                    <strong>Test Name:</strong> Test 1
                    <br>
                    <strong>Date:</strong> January 1, 2022
                    <br>
                    <strong>Result:</strong> Passed
                </li>
                <!-- Add more test history items as needed -->
            </ul>

            <!-- Test Certificates -->
            <div class="test-certificates">
                <h3>Test Certificates</h3>
                <ul>
                    <li><a href="#">Download Certificate 1</a></li>
                    <li><a href="#">Download Certificate 2</a></li>
                    <!-- Add more certificate download links as needed -->
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Content -->
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
