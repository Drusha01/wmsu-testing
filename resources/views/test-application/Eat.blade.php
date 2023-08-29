<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Aptitude Test Application</title>
    <link rel="stylesheet" href="{{ asset('css/test-application.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Engineering Aptitude Test Application</h2>
        <form>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="middle-name">Middle Name:</label>
                    <input type="text" id="middle-name" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address">Address:</label>
                    <input type="text" id="address" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="test-result">College Entrance Test Result (70.00 And Above):</label>
                <input type="file" id="test-result" class="form-control-file" accept=".pdf,.doc,.docx" required>
            </div>
            <div class="mb-3">
                <label for="photo">2x2 Picture with Name Tag (Selfie not Allowed):</label>
                <input type="file" id="photo" class="form-control-file" accept=".jpg,.jpeg,.png" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
</body>
</html>
