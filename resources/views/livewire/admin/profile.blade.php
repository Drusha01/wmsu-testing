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
                            <h3 class="mt-3">{{$user_details['user_name']}}</h3>
                            <!-- <p class="text-muted">Status: Registered</p> -->
                            <button id="modifyButtonProfile" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modifyModal">Modify</button>
                        </div>
                    </div>
                    
            <!-- Modify Section Modal -->
            <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                    <a class="nav-link @if($modal_active == 'photo') active @endif" href="#modify" role="tab" aria-controls="modify" aria-selected="true" wire:click="modal_active('photo')">Modify Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($modal_active == 'password') active @endif" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="false" wire:click="modal_active('password')">Change Password</a>
                                </li>
                            </ul>


                            <!-- Tab content -->
                            <div class="tab-content" id="accountSettingsTabContent">
                                <!-- Modify Info Tab -->
                                <div class="tab-pane fade @if($modal_active == 'photo')  show active @endif"  id="modify" role="tabpanel" aria-labelledby="modify" >
                                    <!-- Form to modify username and profile image -->
                                    <form wire:submit.prevent="save_photo()">
                                        <div class="form-group mt-4">
                                            <label class="fas" for="newProfileImage ">Change profile picture:</label>
                                            <input type="file" class="form-control" wire:model.defer="photo" required  accept="image/png, image/jpeg" id="photo-{{$photo_id}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                        <!-- Add more fields to modify user details as needed -->
                                    </form>
                                </div>

                                <!-- Change Password Tab -->
                                <div class="tab-pane fade @if($modal_active == 'password') show active @endif" id="changePassword" role="tabpanel" aria-labelledby="changePassword-tab">
                                    <!-- Form to change password -->
                                    <form wire:submit.prevent="change_password()">
                                        <div class="form-group row mt-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Current Password<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                                <input type="password"  wire:model.defer="current_password"  class="form-control" placeholder="Current Password" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="newFullName" class="col-sm-4 col-form-label">New Password<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                                <input type="password"  wire:model.defer="new_password"  class="form-control" placeholder="New Password" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Confirm Password<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                                <input type="password"  wire:model.defer="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        <div>
                                        @if(isset($password_error)) <span class="error" style="color:red;">{{ $password_error }}</span> @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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

                <div class="modal fade" id="modifyModalDetails" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabelDetails" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modifyModalLabelDetails">Modify Profile Details</h5>
                                <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </div>
                            </div>
                            <div class="modal-body">
                                <fieldset>
                                    <!-- Full Name -->
                                    <form wire:submit.prevent="save_profile_info()">
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">First name<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                            <input type="text"  wire:model.defer="firstname" class="form-control" placeholder="Enter firstname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Middle name<span style="color:red;"></span> :</label>
                                            <div class="col-sm-8">
                                            <input type="text"  wire:model.defer="middlename" class="form-control" placeholder="Enter middlename" >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Last name<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                            <input type="text"  wire:model.defer="lastname" class="form-control" placeholder="Enter lastname" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Suffix<span style="color:red;"></span> :</label>
                                            <div class="col-sm-8">
                                            <input type="text"  wire:model.defer="suffix" class="form-control" placeholder="Enter suffix" >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Gender<span style="color:red;"></span> :</label>
                                            <div class="col-sm-8">
                                            <input type="text"  wire:model.defer="gender" class="form-control" placeholder="Enter gender" >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Complete address<span style="color:red;"></span> :</label>
                                            <div class="col-sm-8">
                                            <input type="text"  wire:model.defer="address" class="form-control" placeholder="Enter address" >
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Phone number<span style="color:red;"></span> :</label>
                                            <div class="col-sm-8">
                                            <input type="text"  wire:model.defer="phone" class="form-control" placeholder="Enter phone number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="newFullName" class="col-sm-4 col-form-label">Birthdate<span style="color:red;">*</span> :</label>
                                            <div class="col-sm-8">
                                            <input type="date"  wire:model="birthdate" class="form-control" placeholder="Enter birthdate" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- End Inserted Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
