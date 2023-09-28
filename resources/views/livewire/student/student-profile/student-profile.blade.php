<div>
   
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
                        <h3 class="mt-3">{{$user_details['user_name']}}</h3>
                        <button id="modifyButtonProfile" class="btn btn-primary" data-toggle="modal" data-target="#modifyModal">Select Image</button>
                        <br>
                        <br>
                        <button id="modifyButtonpassword" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalpassword">Change Password</button>
                        
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
                            <li class="list-group-item"><strong>Account Created: </strong> {{date_format(date_create($user_details['created_at']),"F d, Y ")}}</li>
                        </ul>
                        <br>
                        <button id="modifyButtonDetails" class="btn btn-primary " data-toggle="modal" data-target="#modifyModalDetails">Modify</button>
                    </div>
                </div>
            </div>
            <br>
            <!-- Family Background -->
            <div class="details-box">
                <div class="family-background">
                    <h4>Family Background</h4>
                    <ul class="list-group" id="familyBackgroundList">
                        <li class="list-group-item"><strong>Father's first name: </strong> </li>
                        <li class="list-group-item"><strong>Father's middle name: </strong> </li>
                        <li class="list-group-item"><strong>Father's last name: </strong> </li>
                        <li class="list-group-item"><strong>Father's suffix name: </strong> </li>

                        <li class="list-group-item"><strong>Mother's first name: </strong> John Doe Sr.</li>
                        <li class="list-group-item"><strong>Mother's middle name: </strong> Jane Doe</li>
                        <li class="list-group-item"><strong>Father's last name: </strong> </li>

                        <li class="list-group-item"><strong>Number of Siblings: </strong> 2</li>
                        <li class="list-group-item"><strong>Family Home Address:</strong> 456 Oak St, City</li>
                    </ul>
                    <br>
                    <button id="modifyButtonFamilyBackground" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalFamilyBackground">Modify</button>
                </div>
            </div>
            <br>
            <!-- Requirements Section -->
            <div class="details-box">
                <div class="requirements">
                    <h4>Requirements Upload</h4>
                    <ul class="list-group" id="requirementsList">
                        <!-- Existing requirements go here -->
                        <li class="list-group-item">
                            <strong>Requirement Name:</strong> High School Transcript
                        </li>
                        <li class="list-group-item">
                            <strong>Requirement Name:</strong> Birth Certificate
                        </li>
                        <li class="list-group-item">
                            <strong>Requirement Name:</strong> Photo ID
                        </li>
                    </ul>
                    <button id="modifyButtonRequirements" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalRequirements">Add Requirement</button>
                </div>
            </div>
            <br>

            
            

            <!-- Modify Applicant Details Modal -->
            <div class="modal fade" id="modifyModalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabelDetails" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Modify Profile Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <legend>Profile Information</legend>
                                <!-- Full Name -->
                                <form wire:submit.prevent="save_profile_info()">
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="firstname" class="form-control" placeholder="Enter firstname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="middlename" class="form-control" placeholder="Enter middlename" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="lastname" class="form-control" placeholder="Enter lastname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="suffix" class="form-control" placeholder="Enter suffix" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Gender<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="gender" class="form-control" placeholder="Enter gender" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Complete address<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="address" class="form-control" placeholder="Enter address" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Phone number<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="phone" class="form-control" placeholder="Enter phone number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Birthdate<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="date"  wire:model="birthdate" class="form-control" placeholder="Enter birthdate" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Modify Applicant Details Modal -->
             <div class="modal fade" id="modifyModalpassword" tabindex="-1" role="dialog" aria-labelledby="modifyModalpassword" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Change password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <!-- Full Name -->
                                <form wire:submit.prevent="change_password()">
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Current Password<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="password"  wire:model="current_password"  class="form-control" placeholder="Current Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">New Password<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="password"  wire:model="new_password" wire:keyup.debounce.500ms="new_password()" class="form-control" placeholder="New Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Confirm Password<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="password"  wire:model="confirm_password" wire:keyup.debounce.500ms="confirm_password"class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                    <div>
                                    @if(isset($password_error)) <span class="error" style="color:red;">{{ $password_error }}</span> @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modifyModalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabelDetails" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Modify Profile Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <legend>Profile Information</legend>
                                <!-- Full Name -->
                                <form wire:submit.prevent="save_profile_info()">
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="firstname" class="form-control" placeholder="Enter firstname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="middlename" class="form-control" placeholder="Enter middlename" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="lastname" class="form-control" placeholder="Enter lastname" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="suffix" class="form-control" placeholder="Enter suffix" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Gender<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="gender" class="form-control" placeholder="Enter gender" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Complete address<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="address" class="form-control" placeholder="Enter address" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Phone number<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="name"  wire:model="phone" class="form-control" placeholder="Enter phone number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Birthdate<span style="color:red;">*</span> :</label>
                                        <div class="col-sm-8">
                                        <input type="date"  wire:model="birthdate" class="form-control" placeholder="Enter birthdate" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

           

            
    <!-- content-->
    </section>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script></script>
</div>
