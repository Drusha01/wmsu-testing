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
                        <button id="modifyButtonProfile" class="btn btn-primary" data-toggle="modal" data-target="#modifyModal">Modify</button>
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
                            <li class="list-group-item"><strong>Age: </strong> 18</li>
                            <li class="list-group-item"><strong>Home Address: </strong> {{$user_details['user_address']}}</li>
                            <li class="list-group-item"><strong>Phone number: </strong> {{$user_details['user_phone']}}</li>
                            <li class="list-group-item"><strong>Email: </strong> {{$user_details['user_email']}}</li>
                            <li class="list-group-item"><strong>Birthdate: </strong> {{date_format(date_create($user_details['user_birthdate']),"F d, Y ")}}</li>
                            <li class="list-group-item"><strong>Account Created: </strong> {{date_format(date_create($user_details['created_at']),"F d, Y ")}}</li>
                        </ul>
                        <button id="modifyButtonDetails" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalDetails">Modify</button>
                    </div>
                </div>
            </div>
            <!-- Family Background -->
            <div class="family-background">
                <h4>Family Background</h4>
                <ul class="list-group" id="familyBackgroundList">
                    <li class="list-group-item"><strong>Father's Name:</strong> John Doe Sr.</li>
                    <li class="list-group-item"><strong>Mother's Name:</strong> Jane Doe</li>
                    <li class="list-group-item"><strong>Number of Siblings:</strong> 2</li>
                    <li class="list-group-item"><strong>Family Address:</strong> 456 Oak St, City</li>
                </ul>
                <button id="modifyButtonFamilyBackground" class="btn btn-primary" data-toggle="modal" data-target="#modifyModalFamilyBackground">Modify</button>
            </div>
            <!-- Requirements Section -->
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

           

            
    <!-- content-->
    </section>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script></script>
</div>
