<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('css/test-application.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GSAT Application Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="gsat-body">
<div class="gsat-container">
    <div class="gsat-header">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="gsat-logo">
        <div class="header-eat-text">
            <span>Western Mindanao State University</span>
            <h3>GRADUATE SCHOOL ADMISSION TEST (GSAT)</h3>
        </div>
    </div>
    <form method="POST" action="{{ url('application.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3 mt-4">
            <div class="col">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" required>
            </div>
            <div class="col">
                <label for="middleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middleName" name="middle_name">
            </div>
            <div class="col">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Document Uploads</label>
            <div class="row">
                <div class="col">
                    <input type="file" class="form-control" id="bachelorDegree" name="bachelor_degree" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                    <label for="bachelorDegree">Bachelor Degree (Original)</label>
                </div>
                <div class="col">
                    <input type="file" class="form-control" id="tor" name="tor" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                    <label for="tor">TOR (Original)</label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">2x2 Photo with Name Tag</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Barangay Clearance</label>
            <input type="file" class="form-control" id="barangayClearance" name="barangay_clearance" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Medical Certificate</label>
            <input type="file" class="form-control" id="medicalCertificate" name="medical_certificate" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
        </div>
        <button type="submit" class="submit-button">Submit Application</button>
    </form>
</div>
</body>
</html>
