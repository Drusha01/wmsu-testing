<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Application</title>
    <link rel="stylesheet" href="{{ asset('css/User.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom CSS file -->
</head>
<body>

@include('student-components.student-navigation')

<!-- content -->
<section class="test-application-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Choose Your Test</h2>
                <p>Select the test you would like to take from the options below:</p>
                <!-- List of available tests -->
                <ul class="test-list">
                <a class="test-list1" href="{{ Route('test-application.Cet') }}">CET Application</a>
                        <a class="list1-item" href="{{ url('test-application.Nat') }}">NAT Application</a>
                        <a class="list2-item" href="{{ url('test-application.Eat') }}">EAT Application</a>
                        <a class="list3-item" href="{{ url('test-application.Gsat') }}">GSAT Application</a>
                        <a class="list4-item" href="{{ url('test-application.Lsat') }}">LSAT Application</a>
                        <a class="list5-item" href="{{ url('test-application.Ksat') }}">KSAT Application</a>
                        <a class="list6-item" href="{{ url('test-application.Hrmat') }}">HRMAT Application</a>
                        <a class="list7-item" href="{{ url('test-application.Jrat') }}">JRAT Application</a>
                </ul>
            </div>
            <div class="col-lg-6">
                <h3>Step-by-Step Guide to Apply</h3>
                <ol>
                    <li>Create an account on our website.</li>
                    <li>Choose the test you want to take.</li>
                    <li>Fill out the online application form with your personal information and test preferences.</li>
                    <li>Upload the required documents.</li>
                    <li>Submit your application.</li>
                </ol>
                <p>Follow these steps to complete the application process. If you have questions, contact our support team.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>List of Required Documents</h3>
                <ul>
                    <li>Copy of ID or Passport</li>
                    <li>High School Transcript</li>
                    <li>Other relevant documents</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>Online Application Form</h3>
                <!-- Add your online application form fields here -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="#" class="btn btn-primary">Submit Application</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>Test Information</h3>
                <p>Details about the test, its duration, subjects covered, and any other relevant information.</p>
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
