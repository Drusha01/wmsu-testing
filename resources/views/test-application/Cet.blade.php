<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Entrance Exam Application</title>
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
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4">College Entrance Exam Application</h2>
        <form>
            <fieldset class="mb-4">
                <legend>Personal Information</legend>
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
                        <label for="address">Address:</label>
                        <input id="address" class="form-control" rows="3" required></input>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                </div>
            </fieldset>
            <fieldset class="mb-4">
                <legend>Academic Information</legend>
                <div class="mb-3">
                    <label for="school-name">Senior High School Name:</label>
                    <input type="text" id="school-name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="school-address">Senior High School Address:</label>
                    <input id="school-address" class="form-control" rows="3" required></input>
                </div>
            </fieldset>
            <fieldset class="mb-4">
                <legend>Document Uploads</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="senior-card-original">Original Senior High School Card:</label>
                            <input type="file" id="senior-card-original" class="form-control-file" required>
                        </div>
                        <div class="form-group">
                            <label for="medical-certification">Medical Certification:</label>
                            <input type="file" id="medical-certification" class="form-control-file" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="barangay-clearance">Barangay Clearance:</label>
                            <input type="file" id="barangay-clearance" class="form-control-file" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Two Identical 2x2 Photos with Name Tag:</label>
                            <input type="file" id="photo" class="form-control-file" required>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit Application</button>
            </div>
        </form>
    </div>
</body>
</html>
