<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

@include('student-components.student-navigation')

@include('student-components.student-navtabs')

        <!-- Status Tab Content -->
        <div role="tabpanel" class="tab-pane" id="status">
        <section class="application-status-section">
    <div class="container">
        <h2 class="section-title">Application Status</h2>
        <table class="status-table">
            <thead>
                <tr>
                    <th>Exam Type</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CET</td>
                    <td><i class="fas fa-check-circle"></i> Application Received</td>
                    <td>Your CET application has been successfully received.</td>
                    <td>September 15, 2023</td>
                    <td><a href="#" class="view-button">View</a></td>
                </tr>
                <tr>
                    <td>NAT</td>
                    <td><i class="fas fa-hourglass-half"></i> In Review</td>
                    <td>Your NAT application is currently under review.</td>
                    <td>Expected Review Completion: September 30, 2023</td>
                    <td><a href="#" class="view-button">View</a></td>
                </tr>
                <tr>
                    <td>EAT</td>
                    <td><i class="fas fa-check-circle"></i> Application Accepted</td>
                    <td>Your EAT application has been accepted. You can now download your exam permit.</td>
                    <td>September 20, 2023</td>
                    <td>
                        <a href="#" class="view-button accepted">
                            <i class="fas fa-download"></i> 
                        </a>
                </td>

                </tr>
                <tr>
                    <td>GSAT</td>
                    <td><i class="fas fa-times-circle"></i> Application Denied</td>
                    <td>Unfortunately, your GSAT application has been denied.</td>
                    <td>Date of Denial: October 5, 2023</td>
                    <td><a href="#" class="view-button">View</a></td>
                </tr>
                <!-- Add more rows for additional exam applications -->
                <tr>
                    <td>KSAT</td>
                    <td><i class="fas fa-check-circle"></i> Application Received</td>
                    <td>Your KSAT application has been successfully received.</td>
                    <td>October 10, 2023</td>
                    <td><a href="#" class="view-button">View</a></td>
                </tr>
                <!-- Add more rows for additional exam applications -->
            </tbody>
        </table>

        <h2 class="section-title">Exam History</h2>
        <table class="history-table">
            <thead>
                <tr>
                    <th>Exam</th>
                    <th>Date Taken</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sample Exam 1</td>
                    <td>August 10, 2023</td>
                </tr>
                <tr>
                    <td>Sample Exam 2</td>
                    <td>July 25, 2023</td>
                </tr>
                <!-- Add more exam history rows as needed -->
            </tbody>
        </table>
    </div>
</section>
        </div>


<!-- Include Bootstrap JS  -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
