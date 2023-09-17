<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Application</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom CSS file -->
</head>
<body>

@include('student-components.student-navigation')

@include('student-components.student-navtabs')




<!-- Application Tab Content -->
        <div role="tabpanel" class="tab-pane" id="application">
        <section class="test-application-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="test-section">
                    <h2>Choose Your Test</h2>
                    <p>Select the test you would like to take from the options below:</p>
                    <!-- List of available tests -->
                    <ul class="test-list">
                        <li><a class="test-list-item" href="{{ Route('test-application.Cet') }}">CET Application</a></li>
                        <li><a class="test-list-item" href="{{ url('test-application.Nat') }}">NAT Application</a></li>
                        <li><a class="test-list-item" href="{{ url('test-application.Eat') }}">EAT Application</a></li>
                        <li><a class="test-list-item" href="{{ url('test-application.Gsat') }}">GSAT Application</a></li>
                        <li><a class="test-list-item" href="{{ url('test-application.Lsat') }}">LSAT Application</a></li>
                        <li><a class="test-list-item" href="{{ url('test-application.Ksat') }}">KSAT Application</a></li>
                        <li><a class="test-list-item" href="{{ url('test-application.Hrmat') }}">HRMAT Application</a></li>
                        <li><a class="test-list-item" href="{{ url('test-application.Jrat') }}">JRAT Application</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="guide-section">
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
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="documents-section">
                    <h3>List of Required Documents</h3>
                    <ul>
                        <li>Copy of ID or Passport</li>
                        <li>High School Transcript</li>
                        <li>Other relevant documents</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>



<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
