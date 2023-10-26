<div>
    <x-loading-indicator/>
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
                                    <a target="blank"href="@if($user_details['user_profile_picture']== 'default.png')  @else {{asset('storage/images/original/'.$user_details['user_profile_picture'])}}@endif">
                                        <div class="profile-image">
                                        <img width="160px" width="height"style="border-radius:50%;" src="@if($user_details['user_profile_picture']== 'default.png'){{asset('images/contents/profile_picture/thumbnail/default.png')}} @else {{asset('storage/images/thumbnail/'.$user_details['user_profile_picture'])}} @endif" alt="">
                                            
                                        </div>
                                    </a>
                                </label>
                            </div>
                            <h3 class="mt-3">Profile username</h3>
                            <p class="text-muted">Status: Registered</p>
                            <button id="modifyButtonProfile" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyModal">Modify</button>
                        </div>
                    </div>
                    
            <!-- Modify Section Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabel">Account Settings</h5>
                            <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <!-- Tab navigation for different settings -->
                            <ul class="nav nav-tabs" id="accountSettingsTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="modify-tab" data-bs-toggle="tab" href="#modify" role="tab" aria-controls="modify" aria-selected="true">Modify Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="changePassword-tab" data-bs-toggle="tab" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="false">Change Password</a>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <li class="list-group-item"><strong>First name: </strong>{{$user_details['user_firstname']}}</li>
                        <li class="list-group-item"><strong>Middle name: </strong> {{$user_details['user_middlename']}}</li>
                        <li class="list-group-item"><strong>Last name: </strong> {{$user_details['user_lastname']}}</li>
                        <li class="list-group-item"><strong>Suffix: </strong> {{$user_details['user_suffix']}}</li>
                        <li class="list-group-item"><strong>Gender: </strong> {{$user_details['user_gender_details']}}</li>
                        <li class="list-group-item"><strong>Age: </strong> {{floor((time() - strtotime($user_details['user_birthdate'])) / 31556926);}}</li>
                        <li class="list-group-item"><strong>Home Address: </strong> {{$user_details['user_address']}}</li>
                        <li class="list-group-item"><strong>Phone number: </strong> {{$user_details['user_phone']}}</li>
                        <li class="list-group-item"><strong>Email: </strong> {{$user_details['user_email']}} @if($user_details['user_email_verified']==1)<a href="profile/change-email">change</a>@else<a href="profile/change-email">verify</a>@endif</li>
                        <li class="list-group-item"><strong>Birthdate: </strong> {{date_format(date_create($user_details['user_birthdate']),"F d, Y ")}}</li>
                        <li class="list-group-item"><strong>Account Created: </strong> {{date_format(date_create( $user_details['date_created']),"F d, Y ")}}</li>
                    </ul>
                    <button id="modifyButtonDetails" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyModalDetails">Modify</button>
                </div>
            </div>
        </div>

        <!-- Modify Applicant Details Modal -->
        <div class="modal fade" id="modifyModalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabelDetails" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modifyModalLabelDetails">Modify Applicant Details</h5>
                        <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Inserted Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
