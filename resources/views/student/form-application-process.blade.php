<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Application</title>
    <link rel="stylesheet" href="{{ asset('css/USER.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    @include('student-components.student-navigation')
    @include('student-components.student-navtabs')

    <div class="contain">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Choose Applicant Type</div>

                    <div class="card-body">
                        <!-- Display buttons for each applicant type -->
                        <p>Select your applicant type:</p>
                        <div class="applicant-buttons">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#applicantModal" data-type="shs_graduating">SHS Graduating</button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#applicantModal" data-type="shs_graduate">SHS Graduate</button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#applicantModal" data-type="shiftee">Shiftee</button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#applicantModal" data-type="transferee">Transferee</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Modal -->
    <div class="modal fade" id="applicantModal" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applicantModalLabel">Applicant Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display information about the exam -->
                    <p>Welcome, <span id="applicantTypeLabel"></span> Applicant!</p>
                    <p>Here is information about the <span id="applicantTypeExamLabel"></span> exam:</p>
                    <!-- Add exam information here -->

                    <!-- Confirmation form -->
                    <form action="{{ url('application.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="applicant_type" id="applicantTypeInput">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
