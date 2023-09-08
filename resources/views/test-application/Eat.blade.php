<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/test-application.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Aptitude Test Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="body-eat">
<div class="container3">
    <div class="header-eat">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="eat-logo">
        <div class="header-eat-text">
            <span>Western Mindanao State University</span>
            <h2 class="mb-4">Engineering Aptitude Test Application</h2>
        </div>
    </div>
    <form>
        <div class="form-row">
            <div class="form-group1 col">
                <label for="first-name" class="form-label">First Name:</label>
                <input type="text" id="first-name" class="form-control" required>
            </div>
            <div class="form-group1 col">
                <label for="middle-name" class="form-label">Middle Name:</label>
                <input type="text" id="middle-name" class="form-control">
            </div>
            <div class="form-group1 col">
                <label for="last-name" class="form-label">Last Name:</label>
                <input type="text" id="last-name" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" id="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="test-result" class="form-label">College Entrance Test Result (70.00 And Above):</label>
            <input type="file" class="form-control" id="tor" name="Result" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">2x2 Picture with Name Tag (Selfie not Allowed):</label>
            <input type="file" class="form-control" id="tor" name="selfie" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
        </div>
        <div class="row">
            <div class="col-md-12 mb-2">
                <label for="payment-receipt" class="form-label" style="color: red;">Payment Receipt<br> To Complete your examination registration, please make the payment for the examination permit at the University cashier's office.<br> After Payment Upload the payment Receipt below: </label>
                <input type="file" class="form-control" id="tor" name="payment-receipt" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
            </div>
        </div>

        <button type="submit" class="submit-button">Submit Application</button>

    </form>
</div>
</body>
</html>
