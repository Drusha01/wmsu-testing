<div>
   
    <!-- content-->
    <section class="profile-section">
        <div class="container">
            <h2 class="profile-heading">Profile</h2>
            <div class="Applicant-container">
                <div class="Applicant-info">
                    <div class="profile-box">
                        <div class="profile-image-container">
                            <label for="profileImageInput" class="profile-image-label">
                                <a target="blank"href="@if($user_details['user_profile_picture']== 'default.png')  @else {{asset('storage/images/original/'.$user_details['user_profile_picture'])}}@endif">
                                    <div class="profile-image">
                                    @if($user_details['user_profile_picture']== 'default.png') <i class="fas fa-user fa-5x"></i>@else <img style="border-radius:50%;" width="150" height="150" src="{{asset('storage/images/resize/'.$user_details['user_profile_picture'])}}" alt=""> @endif
                                        
                                    </div>
                                </a>
                            </label>
                        </div>
                        <h3 class="mt-3">{{$user_details['user_name']}}</h3>
                        <button id="modifyButtonProfile" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalPhoto">Change Profile </button>
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
                            <li class="list-group-item"><strong>Account Created: </strong> {{date_format(date_create(substr($user_details['created_at'],0,10)),"F d, Y ")}}</li>
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
                        <div class="row justify-content-center">
                            <div class="details-box col-lg-6 mb-4">
                                <h5>Father's Information</h5>
                                <ul class="list-group" id="familyBackgroundList">
                                    <li class="list-group-item"><strong>Father's first name: </strong> {{$f_firstname}}</li>
                                    <li class="list-group-item"><strong>Father's middle name: </strong> {{$f_middlename}} </li>
                                    <li class="list-group-item"><strong>Father's last name: </strong> {{$f_lastname}}</li>
                                    <li class="list-group-item"><strong>Father's suffix name: </strong> {{$f_suffix}}</li>
                                </ul>
                            </div>
                            <div class="details-box col-lg-6 mb-4">
                                <h5>Mother's Information</h5>
                                <ul class="list-group" id="familyBackgroundList">
                                    <li class="list-group-item"><strong>Mother's first name: </strong> {{$m_firstname}}</li>
                                    <li class="list-group-item"><strong>Mother's middle name: </strong> {{$m_middlename}}</li>
                                    <li class="list-group-item"><strong>Father's last name: </strong> {{$m_lastname}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="details-box col-lg-12 mb-4">
                                <h5>Guardian's Information</h5>
                                <ul class="list-group" id="familyBackgroundList">
                                    <li class="list-group-item"><strong>Guardian's first name: </strong> {{$g_firstname}}</li>
                                    <li class="list-group-item"><strong>Guardian's middle name: </strong> {{$g_middlename}} </li>
                                    <li class="list-group-item"><strong>Guardian's last name: </strong> {{$g_lastname}}</li>
                                    <li class="list-group-item"><strong>Guardian's suffix name: </strong> {{$g_suffix}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="details-box col-lg-12 mb-4">
                                <h5>Siblings</h5>
                                <ul class="list-group" id="familyBackgroundList">
                                    <li class="list-group-item"><strong>Number of Siblings: </strong> {{$number_of_siblings}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="details-box col-lg-12 mb-4">
                                <h5>Family Home Address</h5>
                                <ul class="list-group" id="familyBackgroundList">
                                    <li class="list-group-item"><strong>Family Home Address:</strong> {{$fb_address}}</li>
                                </ul>
                            </div>
                        </div>
                    <br>
                    <button id="modifyButtonFamilyBackground" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalFamilyBackground">Modify</button>
                </div>
            </div>
            <br>
            <!-- Educational Background -->
            <div class="details-box">
                <div class="family-background">
                    <h4>Educational Background</h4>
                    <div class="row justify-content-center">
                        <div class="details-box col-lg-12 mb-4">
                            <h5>Senior High School's Details</h5>
                            <ul class="list-group" id="SeniorHighSchoolList">
                                <li class="list-group-item"><strong>Senior High School Name: </strong> {{$g_firstname}}</li>
                                <li class="list-group-item"><strong>Senior High School Address: </strong> {{$g_middlename}} </li>
                                <li class="list-group-item"><strong>Senior High School Form 137/138/TOR: </strong> {{$g_lastname}}</li>
                                <li class="list-group-item"><strong>Senior High School Graduate ?: </strong> {{$g_suffix}}</li>
                                <li class="list-group-item"><strong>Senior High School Expected graduation date: </strong> {{$g_suffix}}</li>
                                <li class="list-group-item"><strong>Senior High School Diploma: </strong> {{$g_suffix}}</li>
                                <li class="list-group-item"><strong>Senior High School Attachments: </strong> {{$g_suffix}}</li>
                            </ul>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="details-box col-lg-12 mb-4">
                                <h5>High School's Details</h5>
                                <ul class="list-group" id="HighSchoolList">
                                    <li class="list-group-item"><strong>High School Name: </strong> {{$g_firstname}}</li>
                                    <li class="list-group-item"><strong>High School Address: </strong> {{$g_middlename}} </li>
                                    <li class="list-group-item"><strong>High School Form 137/138/TOR: </strong> {{$g_lastname}}</li>
                                    <li class="list-group-item"><strong>High School Graduate ?: </strong> {{$g_suffix}}</li>
                                    <li class="list-group-item"><strong>High School Expected graduation date: </strong> {{$g_suffix}}</li>
                                    <li class="list-group-item"><strong>High School Diploma: </strong> {{$g_suffix}}</li>
                                    <li class="list-group-item"><strong>High School Achievements: </strong> {{$g_suffix}}</li>
                                </ul>
                            </div>
                        </div>  
                    <br>
                    <button id="modifyButtonEducationalDetails" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalEducationalDetails">Modify</button>
                    </div> 
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
            <!-- Modify Profile and ID Modal -->
            <div class="modal fade" id="modifyModalPhoto" tabindex="-1" role="dialog" aria-labelledby="modifyModalPhoto" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Change Profile and ID</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <!-- Full Name -->
                                <form wire:submit.prevent="update_profile_and_id()">
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Profile photo<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="file"  accept="image/png, image/jpeg" wire:model="photo"  class="form-control" placeholder="Current Password" >
                                        </div>
                                        <div wire:loading wire:target="photo">Uploading...</div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newFullName" class="col-sm-4 col-form-label">Formal ID<span style="color:red;"></span> :</label>
                                        <div class="col-sm-8">
                                        <input type="file"  accept="image/png, image/jpeg" wire:model="formal_id"  class="form-control" placeholder="New Password" >
                                        </div>
                                    </div>
                                    <div>
                                    @if(isset($profile_photo_error)) <span class="error" style="color:red;">{{ $profile_photo_error }}</span> @endif
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
             <!-- Modify Password Modal -->
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
            <!-- Modify Family Background Modal -->
            <div class="modal fade bd-example-modal-lg" id="modifyModalFamilyBackground" tabindex="-1" role="dialog" aria-labelledby="modifyModalFamilyBackground" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Family Background Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <!-- Full Name -->
                                <form wire:submit.prevent="save_family_background()">
                                    <div class="row">
                                        <div class="details-box col-lg-6 mb-4">
                                            <h5>Father's Information</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_firstname" class="form-control" placeholder="Enter firstname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span>:</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_middlename" class="form-control" placeholder="Enter middlename" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_lastname" class="form-control" placeholder="Enter Lastname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_suffix" class="form-control" placeholder="Enter Suffix" >
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="details-box col-lg-6 mb-4">
                                            <h5>Mother's Information</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="m_firstname" class="form-control" placeholder="Enter firstname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span>:</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="m_middlename" class="form-control" placeholder="Enter middlename" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="m_lastname" class="form-control" placeholder="Enter Lastname" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="details-box col-lg-12 mb-4">
                                            <h5>Guardian's Information (if applicable)</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_firstname" class="form-control" placeholder="Enter firstname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_middlename" class="form-control" placeholder="Enter middlename" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_lastname" class="form-control" placeholder="Enter Lastname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_suffix" class="form-control" placeholder="Enter Suffix" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="details-box col-lg-12 mb-4">
                                            <h5>Siblings</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">No. of siblings<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min="0" wire:model="number_of_siblings" class="form-control" placeholder="Number of siblings" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="details-box col-lg-12 mb-4">
                                            <h5>Home Address</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Family Home Address<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="fb_address" class="form-control" placeholder="Enter Home Address" >
                                                </div>
                                            </div>
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
             <!-- Modify Educational Details Modal -->
            <div class="modal fade bd-example-modal-lg" id="modifyModalEducationalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalEducationalDetails" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Educational Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <!-- Full Name -->
                                <form wire:submit.prevent="save_educational_details()">
                                    <div class="row">
                                        <div class="details-box col-lg-12 mb-4">
                                            <h5>Senior High School Information</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Senior High School Name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_firstname" class="form-control" placeholder="Enter firstname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Senior High School Address<span style="color:red;"></span>:</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_middlename" class="form-control" placeholder="Enter middlename" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Senior High School Form 137/138/TOR<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_lastname" class="form-control" placeholder="Enter Lastname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Senior High School Graduate ?<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_suffix" class="form-control" placeholder="Enter Suffix" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Senior High School Expected graduation date<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_suffix" class="form-control" placeholder="Enter Suffix" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Senior High School Diploma<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_suffix" class="form-control" placeholder="Enter Suffix" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Senior High School Attachment/s<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="f_suffix" class="form-control" placeholder="Enter Suffix" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="details-box col-lg-6 mb-4">
                                            <h5>High School Information</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="m_firstname" class="form-control" placeholder="Enter firstname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span>:</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="m_middlename" class="form-control" placeholder="Enter middlename" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="m_lastname" class="form-control" placeholder="Enter Lastname" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="details-box col-lg-12 mb-4">
                                            <h5>Guardian's Information (if applicable)</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_firstname" class="form-control" placeholder="Enter firstname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_middlename" class="form-control" placeholder="Enter middlename" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_lastname" class="form-control" placeholder="Enter Lastname" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="g_suffix" class="form-control" placeholder="Enter Suffix" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="details-box col-lg-12 mb-4">
                                            <h5>Siblings</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">No. of siblings<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min="0" wire:model="number_of_siblings" class="form-control" placeholder="Number of siblings" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="details-box col-lg-12 mb-4">
                                            <h5>Home Address</h5>
                                            <div class="form-group row">
                                                <label for="newFullName" class="col-sm-4 col-form-label">Family Home Address<span style="color:red;"></span> :</label>
                                                <div class="col-sm-8">
                                                    <input type="name"  wire:model="fb_address" class="form-control" placeholder="Enter Home Address" >
                                                </div>
                                            </div>
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
