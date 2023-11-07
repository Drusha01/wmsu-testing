<div>
    <x-loading-indicator/>

    <!-- ======= Main Content ======= -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Applicant management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Applicant management</li>
                </ol>
            </nav>
        </div><!-- End Right side columns -->
        <!-- Insert Section -->

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link  @if($active == 'pending') show active @endif " data-bs-toggle="tab"  wire:click="active_page('pending')" href="#pending-tab">Pending Applicant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'accepted') show active @endif" data-bs-toggle="tab"   wire:click="active_page('accepted')" href="#accepted-tab">Accepted Applicant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'declined') show active  @endif" data-bs-toggle="tab"  wire:click="active_page('declined')" href="#declined-tab">Declined Applicant</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- pending applicant tab -->
            <div class="tab-pane @if($active == 'pending') show active @else fade @endif px-1" id="review-applicant-tab">
                <div class="d-flex mt-2">
                    <label class="filter-label align-self-center " for="exam-filter">Filter by Type of Exam:</label>
                    <select class="filter-select " id="exam-filter" wire:model="pending_test_type_id" wire:change="pending_application_exam_type_filter()">
                        <option value="0"  >All</option>
                        @foreach ($exam_types as $item => $value)
                            <option value="{{$value->test_type_id}}" >{{$value->test_type_name}}</option>
                                                      
                        @endforeach
                        
                        <!-- Add more options as needed -->
                    </select>
                    <!-- <label class="filter-label align-self-center" for="exam-filter">Show:</label>
                    <select class="filter-select" id="exam-filter" wire:model="per_page" wire:change="pending_application_exam_type_filter()">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="2">2</option>
                        <option value="5">5</option>
                    </select> -->
                    <div class="col-md-3 sort-container">
                        <div class="d-flex">
                            @if(1)
                            <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn" type="button" data-bs-toggle="modal" data-bs-target="#application-management-filter">
                                <i class="bi bi-funnel-fill me-1"></i>
                                <div><span class='btn-text'>Columns</span></div>
                            </button>
                            @endif
                            <input class="form-control" type="text" id="search" placeholder="Search "  wire:change="search_applicant()"/> 
                            <!-- wire:model.debounce.500ms="search" -->
                        </div>
                    </div> 
                    

                    <div class="modal fade" id="application-management-filter" tabindex="-1" role="dialog" aria-labelledby="application-management-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns</h5>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    @foreach($pending_applicant_filter as $item => $value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                            wire:model.defer="pending_applicant_filter.{{$item}}">
                                        <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                            {{$item}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                    <button wire:click="pending_applicant_filterView()" data-bs-dismiss="modal" 
                                        class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-10">
                        <!-- <button class="btn btn-success mx-1" wire:click="accepted_pending()" >Accept </button> -->
                        <button class="btn btn-success mx-1" wire:click="accepted_pending()" >Accept </button>
                        <!-- <button class="btn btn-danger mx-1" wire:click="declined_check()" data-toggle="modal" data-target="#declinePendingapplicantModal" >Decline </button> -->
                        <button class="btn btn-danger mx-1"  data-bs-toggle="modal" data-bs-target="#declinePendingapplicantModal" >Decline </button>
                    </div>
                </div>

                <!-- Application Review Table -->
                <table class="application-table">
                    <thead>
                        <tr>
                        @foreach ($pending_applicant_filter as $item => $value)
                            @if ($loop->first && $value)
                                <th><input wire:model="pending_selected_all" wire:change="pending_applicant_select_all()" type="checkbox"></th> 
                            @elseif($loop->last && $value )
                                <th>
                                    <!--  for loop for access role-->
                                    Action
                                </th>
                            @elseif($value)
                                <th>{{$item}}</th>
                            @endif
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pending_applicant_data as $item => $value)
                        <tr wire:key="item-{{ $value->t_a_id }}">
                            
                            @if($pending_applicant_filter['Select all'])
                                <td><input type="checkbox" 
                                   
                                    wire:model="pending_selected.{{$loop->index}}.{{$value->t_a_id}}"
                                    >
                                </td>
                            @endif
                            @if($pending_applicant_filter['#'])
                                <td>{{ ($per_page*($page_number-1))+$loop->index+1 }}</td>
                            @endif
                            @if($pending_applicant_filter['Code'])
                                <td>{{$value->t_a_id.'-'.$value->date_applied }}</td>
                            @endif
                            @if($pending_applicant_filter['Applicant name'])
                                <td>{{ $value->user_fullname }}</td>
                            @endif
                            @if($pending_applicant_filter['Exam type'])
                                <td class="text-align center">{{ $value->test_type_name }}</td>
                            @endif
                            @if($pending_applicant_filter['Date applied'])
                                <td class="text-align center">{{date_format(date_create($value->date_applied),"F d, Y ")}}</td>
                            @endif
                            @if($pending_applicant_filter['Status'])
                                <td class="text-align center">Pending</td>
                            @endif
                            @if($pending_applicant_filter['Actions'] )
                                <td>
                                    @if($access_role['R']==1)
                                    <button class="btn btn-primary" wire:click="view_application({{$value->t_a_id}})">View</button>
                                    @endif
                                </td>
                            @endif
                        </tr>
                        @empty
                        <td class="text-center font-weight-bold" colspan="42">
                                NO RECORDS 
                            </td>
                        @endforelse
                        <!-- Add more application rows here -->
                        
                    </tbody>
                </table>
                <div class="modal fade" id="view_application_modal" tabindex="-1" role="dialog" aria-labelledby="view_application_modalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-lg modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modifyModalLabelDetails">Application Details</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Full Name -->
                                <form wire:submit.prevent="confirm_cancel({{1}})">
                                    @if($application_view_details)
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
                                                            
                                                            @if($application_view_details[0]->cet_type_name == 'shs_under_grad')
                                                                <span class="mb-2 custom-class">Senior Highschool Graduating Student Form</span>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shs_grad')
                                                                <span class="mb-2 custom-class">Senior Highschool Graduate Form</span>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shiftee/tranferee')
                                                                <span class="mb-2 custom-class">College Shiftee/Transferee Form</span>
                                                            @endif
                                                        </div>
                                                                                                            
                                                    </div>
                                                    <div class="container4">
                                                        <div class="form-container">
                                                            <fieldset class="my-3">
                                                                <legend class="form-legend">Applicant information</legend>
                                                                <div class="border border-secondary mb-3">
                                                                    <div class=" row px-4 py-2 col-lg-12">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="first-name" class="form-label">First name <span style="color:red;">*</span></label>
                                                                                <input disabled type="text" class="form-control" id="first-name" wire:model="application_view_details.0.user_firstname" name="first_name" placeholder="First name" >
                                                                            </div>
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="last-name" class="form-label">Middle name</label>
                                                                                <input disabled type="text" class="form-control" id="last-name"  wire:model="application_view_details.0.user_middlename" name="last_name" placeholder="Middle name" >
                                                                            </div>
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="last-name" class="form-label">Last name <span style="color:red;">*</span></label>
                                                                                <input disabled type="text" class="form-control" id="last-name"  wire:model="application_view_details.0.user_lastname" name="last_name" placeholder="Last name" required>
                                                                            </div>
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="last-name" class="form-label">Suffix</label>
                                                                                <input disabled type="text" class="form-control" id="last-name"  wire:model="application_view_details.0.user_suffix" name="last_name" placeholder="Suffix" >
                                                                            </div>
                                                                        
                                                                            <div class="col-lg-6 col-md-12 mb-2">
                                                                                <label for="email" class="form-label">Email <span style="color:red;">*</span></label>
                                                                                <input disabled type="email" class="form-control" id="email"  wire:model="application_view_details.0.user_email" name="email" placeholder="Email" required disabled>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-2">
                                                                                <label for="contact-number" class="form-label">Contact Number <span style="color:red;">*</span></label>
                                                                                <input disabled type="text"  wire:model="application_view_details.0.user_phone" class="form-control" required placeholder="Contact Number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);">
                                                                                
                                                                            </div>
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
                                                                            
                                                                            <input disabled type="text" class="form-control"  wire:model="application_view_details.0.t_a_school_school_name" name="high_school_name" placeholder="High School Name" required>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-12 mb-2">
                                                                            <label for="high-school-address" class="form-label">Senior School Address <span style="color:red;">*</span></label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.t_a_school_address" name="high_school_address" placeholder="High School Address" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            @if($application_view_details[0]->cet_type_name == 'shs_under_grad')
                                                            <fieldset class="mb-2">
                                                                <legend class="form-legend">Required Documents</legend>
                                                                <div class="border border-secondary">
                                                                    <div class="row px-4 py-2">
                                                                        <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span></label>
                                                                        <br>
                                                                        <div>
                                                                            <a target="blank" href="{{asset('storage/application-requirements/t_a_formal_photo/'.$application_view_details[0]->t_a_formal_photo)}}">
                                                                                <img src="{{asset('storage/application-requirements/t_a_formal_photo/'.$application_view_details[0]->t_a_formal_photo)}}" width="200" alt="Logo"  >
                                                                            </a>
                                                                        </div>
                                                                        
                                                                        <br>
                                                                        <label for="enrollment-certification" class="form-label">School Principal Certification <span style="color:red;">*</span></label>
                                                                        <br>
                                                                        <div>
                                                                            <a target="blank" href="{{asset('storage/application-requirements/t_a_school_principal_certification/'.$application_view_details[0]->t_a_school_principal_certification)}}">
                                                                                <img src="{{asset('storage/application-requirements/t_a_school_principal_certification/'.$application_view_details[0]->t_a_school_principal_certification)}}"  width="200" alt="Logo"  >
                                                                            </a>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shs_grad')
                                                            <fieldset class="mb-2">
                                                                <legend class="form-legend">Required Documents</legend>
                                                                <div class="border border-secondary">
                                                                    <div class="row px-4 py-2">
                                                                        <div class="col-lg-6 mb-3">
                                                                            <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span><i class="fa fa-info-circle info-icon" title='e.g. 2x2 with name tag'style="padding: 11px 0 0 5px;"></i></label>
                                                                            
                                                                            <input disabled type="file" class="form-control-file" wire:model="t_a_formal_photo" id="{{$t_a_formal_photo_id}}" name="graduation_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-3 ">
                                                                            <label for="senior-card-original">Senior High School Card<span style="color:red;">*</span><i class="fa fa-info-circle info-icon" title='Original senior high school card'style="padding: 11px 0 0 5px;"></i></label>

                                                                            <input disabled type="file" class="form-control-file" wire:model="t_a_original_senior_high_school_card" id="{{$t_a_original_senior_high_school_card_id}}" name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shiftee/tranferee')
                                                            <fieldset class="mb-2">
                                                                <legend class="form-legend">Required Documents</legend>
                                                                <div class="border border-secondary">
                                                                    <div class="row px-4 py-2">
                                                                        <div class="col-lg-6 col-md-12 mb-2">
                                                                            <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span></label>
                                                                            <i class="fa fa-info-circle info-icon" title='e.g. 2x2 with name tag'style="padding: 11px 0 0 5px;"></i>
                                                                            <input disabled type="file" class="form-control-file" id="{{$t_a_formal_photo_id}}" wire:model="t_a_formal_photo" name="graduation_certification" accept=".pdf,.jpg,.png,.jpeg" required  >
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-12 mb-2 ">
                                                                            <label for="senior-card-original">Transcript of Records ( TOR ) <span style="color:red;">*</span></label>
                                                                            <i class="fa fa-info-circle info-icon" title='Transcript of records from registrar'style="padding: 11px 0 0 5px;"></i>
                                                                            <input disabled type="file" class="form-control-file" id="{{$t_a_transcript_of_records_id}}" wire:model="t_a_transcript_of_records" name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 mb-2 ">
                                                                            <label for="barangay-clearance">WMSU Dean endorsement letter <span style="color:red;">*</span></label>
                                                                            <i class="fa fa-info-circle info-icon" title='Transcript of records from registrar'style="padding: 11px 0 0 5px;"></i>
                                                                            <input disabled type="file" class="form-control-file" id="{{$t_a_endorsement_letter_from_wmsu_dean_id}}"  wire:model="t_a_endorsement_letter_from_wmsu_dean"  name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
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
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address" placeholder="First Name" required >
                                                                            </div>
                                                                            <div class="mother col-lg-12 mb-3">
                                                                                <label for="mother-middle-name" class="form-label">Middle Name </label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address"placeholder="Middle Name" >
                                                                            </div>
                                                                            <div class="father col-lg-12 mb-3">
                                                                                <label for="father-last-name" class="form-label">Last Name <span style="color:red;">*</span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address" required>
                                                                            </div>
                                                                            <div class="father col-lg-12 mb-3">
                                                                                <label for="father-last-name" class="form-label">Suffix</label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address" placeholder="Suffix" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <legend class="mother form-legend">Mother's Information</legend>
                                                                    <div class="border border-secondary">
                                                                        <div class="mother col-lg-12 mb-3 mt-2">
                                                                            <label for="mother-first-name" class="form-label">First Name <span style="color:red;">*</span></label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" placeholder="First Name" required>
                                                                        </div>
                                                                        <div class="mother col-lg-12 mb-3">
                                                                            <label for="mother-middle-name" class="form-label">Middle Name </label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" placeholder="Middle Name" >
                                                                        </div>
                                                                        <div class="mother col-lg-12 mb-3">
                                                                            <label for="mother-last-name" class="form-label">Last Name <span style="color:red;">*</span></label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" placeholder="Last Name" required>
                                                                        </div>
                                                                        <div class="father col-lg-12 mb-3">
                                                                            <label for="father-last-name" class="form-label">Suffix</label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" id="father-last-name" placeholder="Suffix" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-12">
                                                                    <legend class="form-legend">Guardian's Information <i class="fa fa-info-circle info-icon" title='If applicable'style="padding: 11px 0 0 5px;"></i></legend>
                                                                    <div class="border border-secondary mb-3">
                                                                        <div class="row px-3">
                                                                            <div class="col-lg-6 col-md-12  mb-3">
                                                                                <label for="first-name" class="form-label">First Name <span style="color:red;"></span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" placeholder="First Name" >
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="middle-name" class="form-label">Middle Name</label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" placeholder="Middle Name" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="row md-12 px-3">
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="last-name" class="form-label">Last Name <span style="color:red;"></span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" placeholder="Last Name" >
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="father-suffix" class="form-label">Suffix</label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" aria-label="Father's Suffix" placeholder="Enter Suffix">
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 mb-3 ">
                                                                                <label for="middle-name" class="form-label">Relationship <span style="color:red;"></span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_relationship" id="middle-name" placeholder="Relationship" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for viewing the form -->
                <div class="modal fade" id="formApplicantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Content</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Add your form content here -->
                                <form>
                                    <!-- Your form elements go here -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Add any other buttons or actions here -->
                            </div>
                        </div>
                    </div>
                </div>


      <!-- decline confirmation modal -->
                <div class="modal fade" id="declinePendingapplicantModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignModalLabel">Decline Pending Applicants</h5>
                            </div>
                            <form wire:submit.prevent="decline()">
                                <div class="modal-body">
                                    <hr>
                                    <label for="">Reason</label>
                                    
                                    <input type="text" class="form-control" wire:model.defer="declined_pending_reason" placeholder="Reason to decline" required>

                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" > Decline </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Accepted Applicant Tab -->
            <div class="tab-pane @if($active == 'accepted') show active @else fade @endif" id="accepted-applicant-tab">
                <div class="d-flex mt-2">
                    <label class="filter-label align-self-center " for="exam-filter">Filter by Type of Exam:</label>
                    <select class="filter-select " id="exam-filter" wire:model="accepted_test_type_id" wire:change="accepted_application_exam_type_filter()">
                        <option value="0"  >All</option>
                        @foreach ($exam_types as $item => $value)
                            <option value="{{$value->test_type_id}}" >{{$value->test_type_name}}</option>
                        @endforeach
                        <!-- Add more options as needed -->
                    </select>
                    <!-- <label class="filter-label align-self-center" for="exam-filter">Show:</label>
                    <select class="filter-select" id="exam-filter" wire:model="per_page" wire:change="pending_application_exam_type_filter()">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="2">2</option>
                        <option value="5">5</option>
                    </select> -->
                    <div class="col-md-3 sort-container">
                        <div class="d-flex">
                            @if(1)
                            <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-bs-toggle="modal" data-bs-target="#accepted-application-management-filter">
                                <i class="bi bi-funnel-fill me-1"></i>
                                <div><span class='btn-text'>Columns</span></div>
                            </button>
                            @endif
                            <input class="form-control" type="text" id="search" placeholder="Search "  wire:change="search_applicant()"/> 
                            <!-- wire:model.debounce.500ms="search" -->
                        </div>
                    </div> 
                        
                    <div class="modal fade" id="accepted-application-management-filter" tabindex="-1" role="dialog" aria-labelledby="accepted-application-management-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns</h5>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    @foreach($accepted_applicant_filter as $item => $value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                            wire:model.defer="accepted_applicant_filter.{{$item}}">
                                        <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                            {{$item}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="accepted_applicant_filterView()" data-bs-dismiss="modal" 
                                        class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-10">
                        <!-- <button class="btn btn-warning mx-1" wire:click="accepted_return_check()" data-toggle="modal" data-target="#returnAcceptedapplicantModal">Return </button> -->
                        <button class="btn btn-secondary mx-1"  data-bs-toggle="modal" data-bs-target="#returnAcceptedapplicantModal">Return </button>
                        <!-- <button class="btn btn-danger mx-1" wire:click="declined_check_accepted()" data-toggle="modal" data-target="#declineAcceptedapplicantModal" >Decline </button> -->
                        <button class="btn btn-danger mx-1"  data-bs-toggle="modal" data-bs-target="#declineAcceptedapplicantModal" >Decline </button>
                    </div> 
                </div>
                                    
                <table class="application-table">
                    <thead>
                        <tr>
                        @foreach ($accepted_applicant_filter as $item => $value)
                            @if ($loop->first && $value)
                                <th><input wire:model="accepted_selected_all" wire:change="accepted_applicant_select_all()" type="checkbox"></th> 
                            @elseif($loop->last && $value )
                                <th>
                                    <!--  for loop for access role-->
                                    Action
                                </th>
                            @elseif($value)
                                <th>{{$item}}</th>
                            @endif
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($accepted_applicant_data as $item => $value)
                        <tr wire:key="item-{{ $value->t_a_id }}">
                            
                            @if($accepted_applicant_filter['Select all'])
                                <td wire:key="item-{{ $value->t_a_id }}-{{$value->t_a_id}}"><input type="checkbox" 
                                
                                    wire:model="accepted_selected.{{$loop->index}}.{{$value->t_a_id}}"
                                    >
                                </td>
                            @endif
                            @if($accepted_applicant_filter['#'])
                                <td>{{ ($per_page*($page_number-1))+$loop->index+1 }}</td>
                            @endif
                            @if($accepted_applicant_filter['Code'])
                                <td>{{$value->t_a_id.'-'.$value->date_applied }}</td>
                            @endif
                            @if($accepted_applicant_filter['Applicant name'])
                                <td>{{ $value->user_fullname }}</td>
                            @endif
                            @if($accepted_applicant_filter['Exam type'])
                                <td>{{ $value->test_type_name }}</td>
                            @endif
                            @if($accepted_applicant_filter['Date applied'])
                                <td class="text-align center">{{date_format(date_create($value->date_applied),"F d, Y ")}}</td>
                            @endif
                            @if($accepted_applicant_filter['Status'])
                            <td class="text-align center">Accepted</td>
                            @endif
                            @if($accepted_applicant_filter['Actions'] )
                                <td>
                                @if($access_role['R']==1)
                                <button class="btn btn-primary" wire:click="view_accepted_application({{$value->t_a_id}})">View</button>
                                @endif
                                </td>
                            @endif
                        </tr>
                        @empty
                        <td class="text-center font-weight-bold" colspan="42">
                                NO RECORDS 
                            </td>
                        @endforelse
                        <!-- Add more accepted applicant rows here -->
                    </tbody>
                </table>

                <div class="modal fade" id="view_accepted_application_modal" tabindex="-1" role="dialog" aria-labelledby="view_accepted_application_modalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-lg modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="view_accepted_application_modal">Application Details</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Full Name -->
                                <form wire:submit.prevent="confirm_cancel({{1}})">
                                    @if($application_view_details)
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
                                                            
                                                            @if($application_view_details[0]->cet_type_name == 'shs_under_grad')
                                                                <span class="mb-2 custom-class">Senior Highschool Graduating Student Form</span>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shs_grad')
                                                                <span class="mb-2 custom-class">Senior Highschool Graduate Form</span>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shiftee/tranferee')
                                                                <span class="mb-2 custom-class">College Shiftee/Transferee Form</span>
                                                            @endif
                                                        </div>
                                                                                                            
                                                    </div>
                                                    <div class="container4">
                                                        <div class="form-container">
                                                            <fieldset class="my-3">
                                                                <legend class="form-legend">Applicant information</legend>
                                                                <div class="border border-secondary mb-3">
                                                                    <div class=" row px-4 py-2 col-lg-12">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="first-name" class="form-label">First name <span style="color:red;">*</span></label>
                                                                                <input disabled type="text" class="form-control" id="first-name" wire:model="application_view_details.0.user_firstname" name="first_name" placeholder="First name" >
                                                                            </div>
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="last-name" class="form-label">Middle name</label>
                                                                                <input disabled type="text" class="form-control" id="last-name"  wire:model="application_view_details.0.user_middlename" name="last_name" placeholder="Middle name" >
                                                                            </div>
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="last-name" class="form-label">Last name <span style="color:red;">*</span></label>
                                                                                <input disabled type="text" class="form-control" id="last-name"  wire:model="application_view_details.0.user_lastname" name="last_name" placeholder="Last name" required>
                                                                            </div>
                                                                            <div class="col-lg-6 mb-2">
                                                                                <label for="last-name" class="form-label">Suffix</label>
                                                                                <input disabled type="text" class="form-control" id="last-name"  wire:model="application_view_details.0.user_suffix" name="last_name" placeholder="Suffix" >
                                                                            </div>
                                                                        
                                                                            <div class="col-lg-6 col-md-12 mb-2">
                                                                                <label for="email" class="form-label">Email <span style="color:red;">*</span></label>
                                                                                <input disabled type="email" class="form-control" id="email"  wire:model="application_view_details.0.user_email" name="email" placeholder="Email" required disabled>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-2">
                                                                                <label for="contact-number" class="form-label">Contact Number <span style="color:red;">*</span></label>
                                                                                <input disabled type="text"  wire:model="application_view_details.0.user_phone" class="form-control" required placeholder="Contact Number"  oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);">
                                                                                
                                                                            </div>
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
                                                                            
                                                                            <input disabled type="text" class="form-control"  wire:model="application_view_details.0.t_a_school_school_name" name="high_school_name" placeholder="High School Name" required>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-12 mb-2">
                                                                            <label for="high-school-address" class="form-label">Senior School Address <span style="color:red;">*</span></label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.t_a_school_address" name="high_school_address" placeholder="High School Address" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            @if($application_view_details[0]->cet_type_name == 'shs_under_grad')
                                                            <fieldset class="mb-2">
                                                                <legend class="form-legend">Required Documents</legend>
                                                                <div class="border border-secondary">
                                                                    <div class="row px-4 py-2">
                                                                        <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span></label>
                                                                        <br>
                                                                        <div>
                                                                            <a target="blank" href="{{asset('storage/application-requirements/t_a_formal_photo/'.$application_view_details[0]->t_a_formal_photo)}}">
                                                                                <img src="{{asset('storage/application-requirements/t_a_formal_photo/'.$application_view_details[0]->t_a_formal_photo)}}" width="200" alt="Logo"  >
                                                                            </a>
                                                                        </div>
                                                                        
                                                                        <br>
                                                                        <label for="enrollment-certification" class="form-label">School Principal Certification <span style="color:red;">*</span></label>
                                                                        <br>
                                                                        <div>
                                                                            <a target="blank" href="{{asset('storage/application-requirements/t_a_school_principal_certification/'.$application_view_details[0]->t_a_school_principal_certification)}}">
                                                                                <img src="{{asset('storage/application-requirements/t_a_school_principal_certification/'.$application_view_details[0]->t_a_school_principal_certification)}}"  width="200" alt="Logo"  >
                                                                            </a>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shs_grad')
                                                            <fieldset class="mb-2">
                                                                <legend class="form-legend">Required Documents</legend>
                                                                <div class="border border-secondary">
                                                                    <div class="row px-4 py-2">
                                                                        <div class="col-lg-6 mb-3">
                                                                            <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span><i class="fa fa-info-circle info-icon" title='e.g. 2x2 with name tag'style="padding: 11px 0 0 5px;"></i></label>
                                                                            
                                                                            <input disabled type="file" class="form-control-file" wire:model="t_a_formal_photo" id="{{$t_a_formal_photo_id}}" name="graduation_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                        </div>
                                                                        <div class="col-lg-6 mb-3 ">
                                                                            <label for="senior-card-original">Senior High School Card<span style="color:red;">*</span><i class="fa fa-info-circle info-icon" title='Original senior high school card'style="padding: 11px 0 0 5px;"></i></label>

                                                                            <input disabled type="file" class="form-control-file" wire:model="t_a_original_senior_high_school_card" id="{{$t_a_original_senior_high_school_card_id}}" name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            @elseif($application_view_details[0]->cet_type_name == 'shiftee/tranferee')
                                                            <fieldset class="mb-2">
                                                                <legend class="form-legend">Required Documents</legend>
                                                                <div class="border border-secondary">
                                                                    <div class="row px-4 py-2">
                                                                        <div class="col-lg-6 col-md-12 mb-2">
                                                                            <label for="graduation-certification" class="form-label">Formal Photo with name tag <span style="color:red;">*</span></label>
                                                                            <i class="fa fa-info-circle info-icon" title='e.g. 2x2 with name tag'style="padding: 11px 0 0 5px;"></i>
                                                                            <input disabled type="file" class="form-control-file" id="{{$t_a_formal_photo_id}}" wire:model="t_a_formal_photo" name="graduation_certification" accept=".pdf,.jpg,.png,.jpeg" required  >
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-12 mb-2 ">
                                                                            <label for="senior-card-original">Transcript of Records ( TOR ) <span style="color:red;">*</span></label>
                                                                            <i class="fa fa-info-circle info-icon" title='Transcript of records from registrar'style="padding: 11px 0 0 5px;"></i>
                                                                            <input disabled type="file" class="form-control-file" id="{{$t_a_transcript_of_records_id}}" wire:model="t_a_transcript_of_records" name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 mb-2 ">
                                                                            <label for="barangay-clearance">WMSU Dean endorsement letter <span style="color:red;">*</span></label>
                                                                            <i class="fa fa-info-circle info-icon" title='Transcript of records from registrar'style="padding: 11px 0 0 5px;"></i>
                                                                            <input disabled type="file" class="form-control-file" id="{{$t_a_endorsement_letter_from_wmsu_dean_id}}"  wire:model="t_a_endorsement_letter_from_wmsu_dean"  name="enrollment_certification" accept=".pdf,.jpg,.png,.jpeg" required>
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
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address" placeholder="First Name" required >
                                                                            </div>
                                                                            <div class="mother col-lg-12 mb-3">
                                                                                <label for="mother-middle-name" class="form-label">Middle Name </label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address"placeholder="Middle Name" >
                                                                            </div>
                                                                            <div class="father col-lg-12 mb-3">
                                                                                <label for="father-last-name" class="form-label">Last Name <span style="color:red;">*</span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address" required>
                                                                            </div>
                                                                            <div class="father col-lg-12 mb-3">
                                                                                <label for="father-last-name" class="form-label">Suffix</label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_f_firstname" name="high_school_address" placeholder="Suffix" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <legend class="mother form-legend">Mother's Information</legend>
                                                                    <div class="border border-secondary">
                                                                        <div class="mother col-lg-12 mb-3 mt-2">
                                                                            <label for="mother-first-name" class="form-label">First Name <span style="color:red;">*</span></label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" placeholder="First Name" required>
                                                                        </div>
                                                                        <div class="mother col-lg-12 mb-3">
                                                                            <label for="mother-middle-name" class="form-label">Middle Name </label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" placeholder="Middle Name" >
                                                                        </div>
                                                                        <div class="mother col-lg-12 mb-3">
                                                                            <label for="mother-last-name" class="form-label">Last Name <span style="color:red;">*</span></label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" placeholder="Last Name" required>
                                                                        </div>
                                                                        <div class="father col-lg-12 mb-3">
                                                                            <label for="father-last-name" class="form-label">Suffix</label>
                                                                            <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_m_firstname" id="father-last-name" placeholder="Suffix" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            
                                                                <div class="col-md-12">
                                                                    <legend class="form-legend">Guardian's Information <i class="fa fa-info-circle info-icon" title='If applicable'style="padding: 11px 0 0 5px;"></i></legend>
                                                                    <div class="border border-secondary mb-3">
                                                                        <div class="row px-3">
                                                                            <div class="col-lg-6 col-md-12  mb-3">
                                                                                <label for="first-name" class="form-label">First Name <span style="color:red;"></span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" placeholder="First Name" >
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="middle-name" class="form-label">Middle Name</label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" placeholder="Middle Name" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="row md-12 px-3">
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="last-name" class="form-label">Last Name <span style="color:red;"></span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" placeholder="Last Name" >
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-12 mb-3">
                                                                                <label for="father-suffix" class="form-label">Suffix</label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_firstname" aria-label="Father's Suffix" placeholder="Enter Suffix">
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 mb-3 ">
                                                                                <label for="middle-name" class="form-label">Relationship <span style="color:red;"></span></label>
                                                                                <input disabled type="text" class="form-control" wire:model="application_view_details.0.family_background_g_relationship" id="middle-name" placeholder="Relationship" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                    
                <div class="modal fade" id="returnAcceptedapplicantModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignModalLabel">Return Accepted Applicants</h5>
                            </div>
                            <form wire:submit.prevent="accepted_return()">
                                <div class="modal-body">
                                    <hr>
                                    <label for="">Return reason</label>
                                    
                                    <input type="text" class="form-control" wire:model.defer="return_reason" placeholder="Reason to return" required>

                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" > Return </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              
                <div class="modal fade" id="declineAcceptedapplicantModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignModalLabel">Decline Accepted Applicants</h5>
                            </div>
                            <form wire:submit.prevent="decline_accepted()">
                                <div class="modal-body">
                                    <hr>
                                    <label for="">Reason</label>
                                    
                                    <input type="text" class="form-control" wire:model.defer="declined_accepted_reason" placeholder="Reason to decline" required>

                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" > Decline </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane @if($active == 'declined') show active @else fade @endif" id="declined-applicant-tab">
                <div class="d-flex mt-2">
                        <label class="filter-label align-self-center " for="exam-filter">Filter by Type of Exam:</label>
                        <select class="filter-select " id="exam-filter" wire:model="declined_test_type_id" wire:change="declined_application_exam_type_filter()">
                            <option value="0"  >All</option>
                            @foreach ($exam_types as $item => $value)
                                <option value="{{$value->test_type_id}}" >{{$value->test_type_name}}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                        <!-- <label class="filter-label align-self-center" for="exam-filter">Show:</label>
                        <select class="filter-select" id="exam-filter" wire:model="per_page" wire:change="pending_application_exam_type_filter()">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="2">2</option>
                            <option value="5">5</option>
                        </select> -->
                        <div class="col-md-3 sort-container">
                            <div class="d-flex">
                                @if(1)
                                <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-bs-toggle="modal" data-bs-target="#declined-application-management-filter">
                                    <i class="bi bi-funnel-fill me-1"></i>
                                    <div><span class='btn-text'>Columns</span></div>
                                </button>
                                @endif
                                <input class="form-control" type="text" id="search" placeholder="Search "  wire:change="search_applicant()"/> 
                                <!-- wire:model.debounce.500ms="search" -->
                            </div>
                        </div> 
                        

                        <div class="modal fade" id="declined-application-management-filter" tabindex="-1" role="dialog" aria-labelledby="declined-application-management-filterLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns</h5>
                                    </div>
                                    <hr>
                                    <div class="modal-body">
                                        @foreach($declined_applicant_filter as $item => $value)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                                wire:model.defer="declined_applicant_filter.{{$item}}">
                                            <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                                {{$item}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal"  id='btn_close1'>Close</button>
                                        <button wire:click="declined_applicant_filterView()" data-bs-dismiss="modal" 
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-10">
                            <button class="btn btn-danger mx-1"  data-bs-toggle="modal" data-bs-target="#DeleteDeclinedapplicantModal">Delete </button>
                            <!-- <button class="btn btn-danger mx-1" wire:click="delete_check()" data-toggle="modal" data-target="#DeleteDeclinedapplicantModal">Delete </button> -->
                        </div>
                    </div>
                                    
                    <table class="application-table">
                        <thead>
                            <tr>
                            @foreach ($declined_applicant_filter as $item => $value)
                                @if ($loop->first && $value)
                                    <th><input wire:model="declined_selected_all" wire:change="declined_applicant_select_all()" type="checkbox"></th> 
                                @elseif($loop->last && $value )
                                    <th>
                                        <!--  for loop for access role-->
                                        Action
                                    </th>
                                @elseif($value)
                                    <th>{{$item}}</th>
                                @endif
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($declined_applicant_data as $item => $value)
                            <tr wire:key="item-{{ $value->t_a_id }}">
                                
                                @if($declined_applicant_filter['Select all'])
                                    <td wire:key="item-{{ $value->t_a_id }}-{{$value->t_a_id}}"><input type="checkbox" 
                                    
                                        wire:model="declined_selected.{{$loop->index}}.{{$value->t_a_id}}"
                                        >
                                    </td>
                                @endif
                                @if($declined_applicant_filter['#'])
                                    <td>{{ ($per_page*($page_number-1))+$loop->index+1 }}</td>
                                @endif
                                @if($declined_applicant_filter['Code'])
                                    <td>{{$value->t_a_id.'-'.$value->date_applied }}</td>
                                @endif
                                @if($declined_applicant_filter['Applicant name'])
                                    <td>{{ $value->user_fullname }}</td>
                                @endif
                                @if($declined_applicant_filter['Exam type'])
                                    <td>{{ $value->test_type_name }}</td>
                                @endif
                                @if($declined_applicant_filter['Date applied'])
                                    <td class="text-align center">{{date_format(date_create($value->date_applied),"F d, Y ")}}</td>
                                @endif
                                @if($declined_applicant_filter['Status'])
                                    <td class="text-align center">Declined</td>
                                @endif
                                @if($declined_applicant_filter['Reason'])
                                    <td class="text-align center"> {{ $value->t_a_declined_reason }}</td>
                                @endif

                               
                                @if($declined_applicant_filter['Actions'] )
                                    <td>
                                        @if($access_role['R']==1)
                                        <button class="btn btn-primary">View</button>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                            @empty
                            <td class="text-center font-weight-bold" colspan="42">
                                    NO RECORDS 
                                </td>
                            @endforelse
                            <!-- Add more accepted applicant rows here -->
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="DeleteDeclinedapplicantModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignModalLabel">Delete declined applicants</h5>
                            </div>
                            <form wire:submit.prevent="delete_declined()">
                                <div class="modal-body">
                                    <label for="">Are you sure to delete declined applicants?</label>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" > Delete </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </main>
    <!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script>
        window.addEventListener('swal:remove_backdrop', event => {
            Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showConfirmButton: false,
                    timer: event.detail.timer,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                    })
                
                .then(function() {
                    $('div.modal-backdrop').remove();
                    window.location.href = `${event.detail.link}`
                });
        });
    </script>
</div>
