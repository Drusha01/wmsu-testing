<div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Right side columns -->
        <!-- Insert Section -->
        <!-- content-->
        <section class="profile-section">
            <div class="container">
                <h2 class="profile-heading">Profile Information</h2>
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
                            <h3 class="mt-3">Profile username</h3>
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
                            <label class="fas" for="newProfileImage">Change profile picture:</label>
                            <input type="file" class="form-control" id="newProfileImage">
                        </div>
                        <div class="form-group">
                            <label class="fas" for="newProfileImage">Formal Photo(2x2):</label>
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
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password:</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Confirm new password">
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
<!-- Applicant details -->
    <div class="applicant-details">
        <div class="details-box">
            <h4>Profile Details</h4>
            <ul class="list-group" id="applicantDetailsList">
                <li class="list-group-item"><strong>Full Name:</strong> Odon Maravi...</li>
                <li class="list-group-item"><strong>Gender:</strong> Male</li>
                <li class="list-group-item"><strong>Age:</strong> 18</li>
                <li class="list-group-item"><strong>Home Address:</strong> 123 Main St, City</li>
                <li class="list-group-item"><strong>Phone number:</strong> 09956207083</li>
                <li class="list-group-item"><strong>Email:</strong> john.doe@example.com</li>
                <li class="list-group-item"><strong>Birthdate:</strong> January 15, 2000</li>
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
                <form>
                    <fieldset>
                        <legend>Applicant Information</legend>
                        <!-- Full Name -->
                        <div class="form-group row">
                            <label for="newFullName" class="col-sm-3 col-form-label">Full Name*:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="newFullName" placeholder="Enter new full name" required>
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group row">
                            <label for="newGender" class="col-sm-3 col-form-label">Gender*:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="newGender" placeholder="Enter new gender" required>
                            </div>
                        </div>

                        <!-- Age -->
                        <div class="form-group row">
                            <label for="newAge" class="col-sm-3 col-form-label">Age*:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="newAge" placeholder="Enter new age" required>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group row">
                            <label for="newPhoneNumber" class="col-sm-3 col-form-label">Phone Number:</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="newPhoneNumber" placeholder="Enter phone number" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);">
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
                            <label for="newBirthdate" class="col-sm-3 col-form-label">Birthdate*:</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="newBirthdate" placeholder="Enter new birthdate" required>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

        <!-- End Inserted Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
