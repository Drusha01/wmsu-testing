<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/Test-application.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CET Transferee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="body-eat">
<div class="container4">
    <div class="header-eat">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo">
        <div class="header-eat-text">
            <span>Western Mindanao State University</span>
            <h2 class="mb-2">College Entrance Exam Application Form</h2>
            <span class="mb-2 custom-class">College Transferee</span>
        </div>
    </div>
    <form method="POST" action="{{ url('submit.application') }}" enctype="multipart/form-data">
        @csrf
        <div class="container4">
            <div class="form-container">
                <form class="needs-validation" novalidate>
                    <fieldset class="mb-2">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first-name" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="contact-number" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contact-number" name="contact_number" placeholder="Contact Number">
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset class="mb-2">
                    <legend>Document Uploads</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="senior-card-original">Transcript of Records (TOR):</label>
                                <input type="file" class="form-control" id="tor" name="payment-receipt" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                            </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="barangay-clearance">Endorsement letter from WMSU Dean:</label>
                                <input type="file" class="form-control" id="tor" name="payment-receipt" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                                <label for="enrollment-certification" class="form-label">WMSU-CET Application form</label>
                                <input type="file" class="form-control" id="enrollment-certification" name="enrollment_certification" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="graduation-certification" class="form-label">Two Identical 2x2 Photos with Name Tag:</label>
                                <input type="file" class="form-control" id="graduation-certification" name="graduation_certification" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                            </div>
                        </div>
                    </div>
                </fieldset>

                   
                    <button type="submit" class="submit-button">Submit Application</button>
                </form>
            </div>
        </div>
    </form>
</div>
</body>
</html>
