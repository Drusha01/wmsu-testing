<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/test-application.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nursing Aptitude Test Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="body-nat">
    <div class="nat-container">
        <div class="nat-header">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="nat-logo">
            <div class="header-eat-text">
                <span>Western Mindanao State University</span>
                <h3>Nursing Admission Test (NAT)</h3>
            </div>
        </div>
        <form method="POST" action="{{ url('application.submit') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-4" >
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
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="test-result">College Entrance Test Result (70.00 And Above):</label>
                <input type="file" id="test-result" name="test_result" class="form-control-file" accept=".pdf,.doc,.docx" required>
            </div>
            <div class="mb-3">
                <label for="photo">2x2 Picture with Name Tag (Selfie not Allowed):</label>
                <input type="file" id="photo" name="photo" class="form-control-file" accept=".jpg,.jpeg,.png" required>
            </div>
            <button type="submit" class="submit-button">Submit Application</button>
        </form>
    </div>
</body>
</html>
