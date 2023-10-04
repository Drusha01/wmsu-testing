<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements Page</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add Bootstrap JS and Popper.js script links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Content -->
    <div class="container">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#requirements-upload">Requirements Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#requirements-information">Requirements Information</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Tab 1: Requirements Upload -->
            <div class="tab-pane fade show active" id="requirements-upload">
                <div class="details-box">
                    <div class="requirements">
                        <h4>Requirements Upload</h4>
                        <!-- Existing requirements go here -->
                        <ul class="list-group" id="requirementsList">
                            <!-- Existing requirements go here -->
                            <li class="list-group-item">
                                <strong>Requirement Name:</strong> High School Transcript
                                <button class="btn btn-danger btn-sm float-right">Remove</button>
                            </li>
                            <li class="list-group-item">
                                <strong>Requirement Name:</strong> Birth Certificate
                                <button class="btn btn-danger btn-sm float-right">Remove</button>
                            </li>
                            <li class="list-group-item">
                                <strong>Requirement Name:</strong> Photo ID
                                <button class="btn btn-danger btn-sm float-right">Remove</button>
                            </li>
                        </ul>
                        <button id="modifyButtonRequirements" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalRequirements">Add Requirement</button>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Requirements Information -->
            <div class="tab-pane fade" id="requirements-information">
                <!-- Content for requirements information here -->
                <h2>Requirements Information</h2>

                <!-- Add the table information here -->
            </div>
        </div>
    </div>

    <!-- Optional: Add any additional scripts or custom JavaScript code here -->

</body>
</html>
