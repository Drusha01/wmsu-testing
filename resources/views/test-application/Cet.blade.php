<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/test-application.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Entrance Exam Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="body-form2">
<div class="form2-container">
    <div class="form2-header">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form2-logo">
        <div class="form2-header-text">
            <span>Western Mindanao State University</span>
            <h2 class="mb-4">College Entrance Exam Application Form</h2>
        </div>
    </div>
    <form method="POST" action="{{ url('application.submit') }}" enctype="multipart/form-data">
        @csrf
        <fieldset class="mb-4">
            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="middle-name">Middle Name:</label>
                    <input type="text" id="middle-name" name="middle_name" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last_name" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
            </div>
        </fieldset>
        <fieldset class="mb-4">
            <legend>Document Uploads</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="senior-card-original">Original Senior High School Card:</label>
                        <input type="file" id="senior-card-original" name="senior_card_original" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="medical-certification">Medical Certification:</label>
                        <input type="file" id="medical-certification" name="medical_certification" class="form-control-file" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="barangay-clearance">Barangay Clearance:</label>
                        <input type="file" id="barangay-clearance" name="barangay_clearance" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Two Identical 2x2 Photos with Name Tag:</label>
                        <input type="file" id="photo" name="photo" class="form-control-file" required>
                    </div>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="submit-button">Submit Application</button>
    </form>
</div>
</body>
</html>
