<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

@include('student-components.student-navigation')
@include('student-components.student-navtabs')
<!-- content-->
<section class="profile-section">
    <div class="container">
        <h2 class="profile-heading">Applicant Information</h2>
        <div class="Applicant-container">
            <div class="Applicant-info">
                <div class="profile-box">
                    <div class="profile-image-container">
                        <input type="file" id="profileImageInput" style="display: none;">
                        <label for="profileImageInput" class="profile-image-label">
                            <div class="profile-image">
                                <i class="fas fa-user fa-5x"></i>
                            </div>
                        </label>
                    </div>
                    <h3 class="mt-3">Applicant username</h3>
                    <p class="text-muted">Status: Registered</p>
                    <button id="modifyButtonProfile" class="btn btn-primary" data-toggle="modal" data-target="#modifyModal">Modify</button>
                </div>
            </div>
<!-- Modify Section Modal -->
<div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifyModalLabel">Account Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tab navigation for different settings -->
                <ul class="nav nav-tabs" id="accountSettingsTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="modify-tab" data-toggle="tab" href="#modify" role="tab" aria-controls="modify" aria-selected="true">Modify Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="changePassword-tab" data-toggle="tab" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="false">Change Password</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content" id="accountSettingsTabContent">
                    <!-- Modify Info Tab -->
                    <div class="tab-pane fade show active" id="modify" role="tabpanel" aria-labelledby="modify-tab">
                        <!-- Form to modify username and profile image -->
                        <form>
                        <div class="form-group">
                            <label for="newUsername">New Username:</label>
                            <input type="text" class="form-control" id="newUsername" placeholder="Enter new username">
                        </div>
                        <div class="form-group">
                            <label for="newProfileImage">Upload New Profile Image:</label>
                            <input type="file" class="form-control" id="newProfileImage">
                        </div>
                        <!-- Add more fields to modify user details as needed -->
                    </form>
                    </div>

                    <!-- Change Password Tab -->
                    <div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="changePassword-tab">
                        <!-- Form to change password -->
                        <form>
                            <div class="form-group">
                                <label for="currentPassword">Current Password:</label>
                                <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password:</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                            </div>
                            <!-- ... -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

    <div class="applicant-details">
        <div class="details-box">
            <h4>Applicant Details</h4>
            <ul class="list-group" id="applicantDetailsList">
                <li class="list-group-item"><strong>Full Name:</strong> John Doe</li>
                <li class="list-group-item"><strong>Gender:</strong> Male</li>
                <li class="list-group-item"><strong>Age:</strong> 18</li>
                <li class="list-group-item"><strong>Home Address:</strong> 123 Main St, City</li>
                <li class="list-group-item"><strong>Email:</strong> john.doe@example.com</li>
                <li class="list-group-item"><strong>Birthdate:</strong> January 15, 2000</li>
                <li class="list-group-item"><strong>Senior High School:</strong> Sample High School</li>
                <li class="list-group-item"><strong>Strand:</strong> STEM</li>
                <li class="list-group-item"><strong>Awards (if any):</strong> Dean's List, Science Fair Champion</li>
                <li class="list-group-item"><strong>Account Created:</strong> January 1, 2023</li>
            </ul>
            <button id="modifyButtonDetails" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalDetails">Modify</button>
        </div>
    </div>
</div>

<!-- Modify Applicant Details Modal -->
<div class="modal fade" id="modifyModalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabelDetails" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifyModalLabelDetails">Modify Applicant Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to modify details -->
                <form>
                    <!-- Full Name -->
                    <div class="form-group row">
                        <label for="newFullName" class="col-sm-3 col-form-label">Full Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newFullName" placeholder="Enter new full name">
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="form-group row">
                        <label for="newGender" class="col-sm-3 col-form-label">Gender:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newGender" placeholder="Enter new gender">
                        </div>
                    </div>

                    <!-- Age -->
                    <div class="form-group row">
                        <label for="newAge" class="col-sm-3 col-form-label">Age:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newAge" placeholder="Enter new age">
                        </div>
                    </div>

                    <!-- Home Address -->
                    <div class="form-group row">
                        <label for="newHomeAddress" class="col-sm-3 col-form-label">Home Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newHomeAddress" placeholder="Enter new home address">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group row">
                        <label for="newEmail" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="newEmail" placeholder="Enter new email">
                        </div>
                    </div>

                    <!-- Birthdate -->
                    <div class="form-group row">
                        <label for="newBirthdate" class="col-sm-3 col-form-label">Birthdate:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newBirthdate" placeholder="Enter new birthdate">
                        </div>
                    </div>

                    <!-- Senior High School -->
                    <div class="form-group row">
                        <label for="newSeniorHighSchool" class="col-sm-3 col-form-label">Senior High School:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newSeniorHighSchool" placeholder="Enter new senior high school">
                        </div>
                    </div>

                    <!-- Strand -->
                    <div class="form-group row">
                        <label for="newStrand" class="col-sm-3 col-form-label">Strand:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newStrand" placeholder="Enter new strand">
                        </div>
                    </div>

                    <!-- Awards (if any) -->
                    <div class="form-group row">
                        <label for="newAwards" class="col-sm-3 col-form-label">Awards (if any):</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="newAwards" placeholder="Enter new awards">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>




                
<div class="requirement">
    <h4>Requirements Upload</h4>
    <p>Upload the following documents:</p>
    <ul class="list-group" id="requirementsList">
        <!-- Existing requirements go here -->
        <li class="list-group-item">
            1. High School Transcript
            <button class="btn btn-info btn-sm float-right view-button" data-toggle="modal" data-target="#transcriptModal">View</button>
            <input type="file" style="display: none;">
            <button class="btn btn-primary btn-sm float-right upload-button">Upload</button>
        </li>
        <li class="list-group-item">
            2. Birth Certificate
            <button class="btn btn-info btn-sm float-right view-button" data-toggle="modal" data-target="#birthCertificateModal">View</button>
            <input type="file" style="display: none;">
            <button class="btn btn-primary btn-sm float-right upload-button">Upload</button>
        </li>
        <li class="list-group-item">
            3. Photo ID
            <button class="btn btn-info btn-sm float-right view-button" data-toggle="modal" data-target="#photoIDModal">View</button>
            <input type="file" style="display: none;">
            <button class="btn btn-primary btn-sm float-right upload-button">Upload</button>
        </li>
    </ul>
    <button id="addRequirementButton" class="btn btn-success">Add New Requirement</button>
</div>

<!-- content-->
</section>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script></script>

</body>
</html>
