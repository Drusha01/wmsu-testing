
<div>
    <!-- Status Tab Content -->
    <div role="tabpanel" class="tab-pane" id="status">
        <section class="application-status-section">
            <div class="container">
                <h2 class="section-title mt-2 font-weight-bold">Application Status</h2>
                <table class="table table-bordered">
                    <thead style="background-color: #990000; color: white; position: sticky; top: 0;">
                        <tr>
                            <th>#</th>
                            <th>Test code</th>
                            <th>Exam Type</th>
                            <th class=" text-center align-middle">Description</th>
                            <th class="text-center align-middle">Date</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($application_details as $item => $value)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $value->applied_date.'-'.$value->t_a_id }}</td>
                            <td>{{ $value->test_type_name }}</td>
                            <td>{{ $value->test_type_details }}</td>
                            <td>{{date_format(date_create( $value->applied_date),"F d, Y ")}} </td>
                            <td>{{ $value->test_status_details }}</td>
                            <td class="text-center align-middle" > 
                                <button id="modifyButtonDetails" wire:click="view_application({{$value->t_a_id}})" class="btn btn-primary " data-toggle="modal" data-target="#view_application_modal">
                                    <i class="fas fa-eye"></i>
                                    View
                                </button>
                            @if( $value->test_status_details == 'Pending')
                                <button id="modifyButtonDetails" wire:click="cancel_application({{$value->t_a_id}})" class="btn btn-danger " data-toggle="modal" data-target="#confirm_cancel_modal">
                                    <i class="fas fa-xmark"></i>
                                    Cancel
                                </button>
                            @endif
                            
                            </td>
                            
                            </tr>                            
                        @empty
                            <td class="text-center font-weight-bold" colspan="42">
                                NO RECORDS 
                                <br>
                                <a  href="{{ route('student.application') }} "> 
                                <button type="button" class="btn btn-success " style="width: 70px;">Apply</button>
                                </a>
                            </td>
                        @endforelse
                        <!-- Add more rows for additional exam applications -->
                    </tbody>
                </table>
                <!-- Pagination for Application Status Table -->
                <div class="pagination">
                    <button class="btn btn-danger">Previous</button>
                    <button class="btn btn-primary">Next</button>
                </div>
                <br>
                <hr>


                <h2 class="section-title font-weight-bold">Exam History</h2>
                <table class="table table-bordered">
                    <thead style="background-color: #990000; color: white; position: sticky; top: 0;">
                        <tr>
                        <th>#</th>
                            <th class="text-center align-middle">Exam Type</th>
                            <th class="text-center align-middle">Description</th>
                            <th class="text-center align-middle">Date</th>
                            <th class="text-center align-middle">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($application_history as $item => $value)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td class="text-center align-middle">{{ $value->test_type_name }}</td>
                            <td>{{ $value->test_type_details }}</td>
                            <td class="text-center align-middle">{{date_format(date_create( $value->applied_date),"F d, Y ")}} </td>
                            <td class="text-center align-middle">{{ $value->test_status_details }}</td>
                        <tr>                    
                    @empty
                        <td class="text-center font-weight-bold" colspan="42">
                            NO RECORDS 
                            <br>
                            <a  href="{{ route('student.application') }} "> 
                                <button class="btn btn-warning"> Apply</button>
                            </a>
                        </td>
                    @endforelse
                   
                        <!-- Add more exam history rows as needed -->
                    </tbody>
                </table>
                <!-- Pagination for Application Status Table -->
                <div class="pagination">
                    <button class="btn btn-danger">Previous</button>
                    <button class="btn btn-primary">Next</button>
                </div>
            </div>

            <!--  MODAL Cancel-->
            <div class="modal fade" id="confirm_cancel_modal" tabindex="-1" role="dialog" aria-labelledby="confirm_cancel_modalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Application Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <fieldset>
                                <!-- Full Name -->
                                <form wire:submit.prevent="confirm_cancel({{$t_a_id}})">
                                    @if( isset($cancel_details))
                                        {{$cancel_details}}
                                    @endif
                                    @if(isset($password_error)) <span class="error" style="color:red;">{{ $password_error }}</span> @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="view_application_modal" tabindex="-1" role="dialog" aria-labelledby="view_application_modalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modifyModalLabelDetails">Application Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <!-- Full Name -->
                                <form wire:submit.prevent="confirm_cancel({{$t_a_id}})">
                                    @if($view_details)
                                        <!--  check what type and display that -->
                                        <div class="col-lg-12">
                                            <div class="border border-dark pt-3" >
                                                <div class="container">
                                                    <div class="header-eat " style="background:#990000;">
                                                        <div class="text-center py-3" style="color:#fff;">
                                                            <img src="{{ asset('images/logo/logo.png') }}" width="120" alt="Logo" class="mx-auto" >
                                                            <br>
                                                            <span>Western Mindanao State University</span>
                                                            <h2 class="mb-2">College Entrance Exam Application Form</h2>
                                                            
                                                            @if($view_details[0]->cet_type_name == 'shs_under_grad')
                                                                <span class="mb-2 custom-class">Senior Highschool Graduating Student Form</span>
                                                            @elseif($view_details[0]->cet_type_name == 'shs_grad')
                                                                <span class="mb-2 custom-class">Senior Highschool Graduate Form</span>
                                                            @elseif($view_details[0]->cet_type_name == 'shiftee/tranferee')
                                                                <span class="mb-2 custom-class">College Shiftee/Transferee Form</span>
                                                            @endif
                                                        </div>
                                                                                                            
                                                    </div>
                                                    <div class="container4">
                                                        <div class="form-container">
                                                            <form wire:submit.prevent="submit_application()">
                                                                <fieldset class="my-3">
                                                                    <legend class="form-legend">Applicant information</legend>
                                                                    <div class="border border-secondary mb-3">
                                                                        <div class=" row px-4 py-2 col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 mb-2">
                                                                                    <label for="first-name" class="form-label">First name <span style="color:red;">*</span></label>
                                                                                    <input type="text" class="form-control" id="first-name" wire:model="view_details.0.user_firstname" name="first_name" placeholder="First name" >
                                                                                </div>
                                                                                <div class="col-lg-6 mb-2">
                                                                                    <label for="last-name" class="form-label">Middle name</label>
                                                                                    <input type="text" class="form-control" id="last-name"  wire:model="view_details.0.user_middlename" name="last_name" placeholder="Middle name" >
                                                                                </div>
                                                                                <div class="col-lg-6 mb-2">
                                                                                    <label for="last-name" class="form-label">Last name <span style="color:red;">*</span></label>
                                                                                    <input type="text" class="form-control" id="last-name"  wire:model="view_details.0.user_lastname" name="last_name" placeholder="Last name" required>
                                                                                </div>
                                                                                <div class="col-lg-6 mb-2">
                                                                                    <label for="last-name" class="form-label">Suffix</label>
                                                                                    <input type="text" class="form-control" id="last-name"  wire:model="view_details.0.user_suffix" name="last_name" placeholder="Suffix" >
                                                                                </div>
                                                                            
                                                                                <div class="col-lg-6 col-md-12 mb-2">
                                                                                    <label for="email" class="form-label">Email <span style="color:red;">*</span></label>
                                                                                    <input type="email" class="form-control" id="email"  wire:model="view_details.0.user_email" name="email" placeholder="Email" required disabled>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-12 mb-2">
                                                                                    <label for="contact-number" class="form-label">Contact Number <span style="color:red;">*</span></label>
                                                                                    <input type="text"  wire:model="view_details.0.user_phone" class="form-control" required placeholder="Contact Number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);">
                                                                                    
                                                                                </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <fieldset class="my-3">
                                                                    <legend class="form-legend">Senior School information</legend>
                                                                    <div class="border border-secondary mb-3">
                                                                        <div class=" row px-3 py-2 col-lg-12">
                                                                            <div class="col-lg-6 col-md-12 mb-2">
                                                                                <label for="high-school-name" class="form-label">Senior School Name <span style="color:red;">*</span></label>
                                                                                
                                                                                <input type="text" class="form-control"  wire:model="view_details.0.t_a_school_school_name" name="high_school_name" placeholder="High School Name" required>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-2">
                                                                                <label for="high-school-address" class="form-label">Senior School Address <span style="color:red;">*</span></label>
                                                                                <input type="text" class="form-control" wire:model="view_details.0.t_a_school_address" name="high_school_address" placeholder="High School Address" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                @if($view_details[0]->cet_type_name == 'shs_under_grad')
                                                                <fieldset class="mb-2">
                                                                    <legend class="form-legend">Required Documents</legend>
                                                                    <div class="border border-secondary">
                                                                        <div class="row px-4 py-2">
                                                                            <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span></label>
                                                                            <br>
                                                                            <div>
                                                                                <img src="{{ asset('images/logo/logo.png') }}" width="200" alt="Logo"  >
                                                                            </div>
                                                                            
                                                                            <br>
                                                                            <label for="enrollment-certification" class="form-label">School Principal Certification <span style="color:red;">*</span></label>
                                                                            <br>
                                                                            <img src="{{ asset('images/logo/logo.png') }}" width="200" alt="Logo" class="mx-auto" >
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                @elseif($view_details[0]->cet_type_name == 'shs_grad')
                                                                <fieldset class="mb-2">
                                                                    <legend class="form-legend">Required Documents</legend>
                                                                    <div class="border border-secondary">
                                                                        <div class="row px-4 py-2">
                                                                            <div class="col-lg-6 mb-3">
                                                                                <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span><i class="fa fa-info-circle info-icon" title='e.g. 2x2 with name tag'style="padding: 11px 0 0 5px;"></i></label>
                                                                                
                                                                                <input type="file" class="form-control-file" wire:model="t_a_formal_photo" id="{{$t_a_formal_photo_id}}" name="graduation_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                            </div>
                                                                            <div class="col-lg-6 mb-3 ">
                                                                                <label for="senior-card-original">Senior High School Card<span style="color:red;">*</span><i class="fa fa-info-circle info-icon" title='Original senior high school card'style="padding: 11px 0 0 5px;"></i></label>

                                                                                <input type="file" class="form-control-file" wire:model="t_a_original_senior_high_school_card" id="{{$t_a_original_senior_high_school_card_id}}" name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                @elseif($view_details[0]->cet_type_name == 'shiftee/tranferee')
                                                                <fieldset class="mb-2">
                                                                    <legend class="form-legend">Required Documents</legend>
                                                                    <div class="border border-secondary">
                                                                        <div class="row px-4 py-2">
                                                                            <div class="col-lg-6 col-md-12 mb-2">
                                                                                <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span></label>
                                                                                <i class="fa fa-info-circle info-icon" title='e.g. 2x2 with name tag'style="padding: 11px 0 0 5px;"></i>
                                                                                <input type="file" class="form-control-file" id="{{$t_a_formal_photo_id}}" wire:model="t_a_formal_photo" name="graduation_certification" accept=".pdf,.jpg,.png,.jpeg" required  >
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-2 ">
                                                                                <label for="senior-card-original">Transcript of Records ( TOR ) <span style="color:red;">*</span></label>
                                                                                <i class="fa fa-info-circle info-icon" title='Transcript of records from registrar'style="padding: 11px 0 0 5px;"></i>
                                                                                <input type="file" class="form-control-file" id="{{$t_a_transcript_of_records_id}}" wire:model="t_a_transcript_of_records" name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 mb-2 ">
                                                                                <label for="barangay-clearance">WMSU Dean endorsement letter <span style="color:red;">*</span></label>
                                                                                <i class="fa fa-info-circle info-icon" title='Transcript of records from registrar'style="padding: 11px 0 0 5px;"></i>
                                                                                <input type="file" class="form-control-file" id="{{$t_a_endorsement_letter_from_wmsu_dean_id}}"  wire:model="t_a_endorsement_letter_from_wmsu_dean"  name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                @endif
                                                                <div class="row">
                                                                    <div class="col-lg-6">            
                                                                        <legend class="father form-legend">Father's Information</legend>
                                                                        <div class="border border-secondary">
                                                                            <div class="row px-3">
                                                                                <div class="mother col-lg-12 mb-3 mt-2">
                                                                                    <label for="mother-first-name" class="form-label">First Name <span style="color:red;">*</span></label>
                                                                                    <input type="text" class="form-control" wire:model="view_details.0.family_background_f_firstname" name="high_school_address" placeholder="First Name" required >
                                                                                </div>
                                                                                <div class="mother col-lg-12 mb-3">
                                                                                    <label for="mother-middle-name" class="form-label">Middle Name </label>
                                                                                    <input type="text" class="form-control" wire:model="view_details.0.family_background_f_firstname" name="high_school_address"placeholder="Middle Name" >
                                                                                </div>
                                                                                <div class="father col-lg-12 mb-3">
                                                                                    <label for="father-last-name" class="form-label">Last Name <span style="color:red;">*</span></label>
                                                                                    <input type="text" class="form-control" wire:model="view_details.0.family_background_f_firstname" name="high_school_address" required>
                                                                                </div>
                                                                                <div class="father col-lg-12 mb-3">
                                                                                    <label for="father-last-name" class="form-label">Suffix</label>
                                                                                    <input type="text" class="form-control" wire:model="view_details.0.family_background_f_firstname" name="high_school_address" placeholder="Suffix" >
                                                                                </div>
                                                                            </div>
                                                                            
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <legend class="mother form-legend">Mother's Information</legend>
                                                                    <div class="border border-secondary">
                                                                        <div class="mother col-lg-12 mb-3 mt-2">
                                                                            <label for="mother-first-name" class="form-label">First Name <span style="color:red;">*</span></label>
                                                                            <input type="text" class="form-control" wire:model="view_details.0.family_background_m_firstname" placeholder="First Name" required>
                                                                        </div>
                                                                        <div class="mother col-lg-12 mb-3">
                                                                            <label for="mother-middle-name" class="form-label">Middle Name </label>
                                                                            <input type="text" class="form-control" wire:model="view_details.0.family_background_m_firstname" placeholder="Middle Name" >
                                                                        </div>
                                                                        <div class="mother col-lg-12 mb-3">
                                                                            <label for="mother-last-name" class="form-label">Last Name <span style="color:red;">*</span></label>
                                                                            <input type="text" class="form-control" wire:model="view_details.0.family_background_m_firstname" placeholder="Last Name" required>
                                                                        </div>
                                                                        <div class="father col-lg-12 mb-3">
                                                                            <label for="father-last-name" class="form-label">Suffix</label>
                                                                            <input type="text" class="form-control" wire:model="view_details.0.family_background_m_firstname" id="father-last-name" placeholder="Suffix" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <legend class="form-legend">Guardian's Information <i class="fa fa-info-circle info-icon" title='If applicable'style="padding: 11px 0 0 5px;"></i></legend>
                                                                    <div class="border border-secondary mb-3">
                                                                        <div class="row px-3">
                                                                            <div class="col-lg-6 col-md-12  mb-3">
                                                                                <label for="first-name" class="form-label">First Name <span style="color:red;"></span></label>
                                                                                <input type="text" class="form-control" wire:model="view_details.0.family_background_g_firstname" placeholder="First Name" >
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="middle-name" class="form-label">Middle Name</label>
                                                                                <input type="text" class="form-control" wire:model="view_details.0.family_background_g_firstname" placeholder="Middle Name" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="row md-12 px-3">
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="last-name" class="form-label">Last Name <span style="color:red;"></span></label>
                                                                                <input type="text" class="form-control" wire:model="view_details.0.family_background_g_firstname" placeholder="Last Name" >
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="father-suffix" class="form-label">Suffix</label>
                                                                                <input type="text" class="form-control" wire:model="view_details.0.family_background_g_firstname" aria-label="Father's Suffix" placeholder="Enter Suffix">
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 mb-3 ">
                                                                                <label for="middle-name" class="form-label">Relationship <span style="color:red;"></span></label>
                                                                                <input type="text" class="form-control" wire:model="view_details.0.family_background_g_relationship" id="middle-name" placeholder="Relationship" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Close
                                        </button>                                        
                                    </div>
                                </form>
                      
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
