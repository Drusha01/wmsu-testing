<div>
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
                <a class="nav-link  @if($active == 'pending') show active @endif " data-toggle="tab"  wire:click="active_page('pending')">Pending Applicant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'accepted') show active @endif" data-toggle="tab"   wire:click="active_page('accepted')">Accepted Applicant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'declined') show active  @endif" data-toggle="tab"  wire:click="active_page('declined')">Declined Applicant</a>
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
                            <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#application-management-filter">
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
                                    <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                    <button wire:click="pending_applicant_filterView()" data-dismiss="modal" 
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
                        <button class="btn btn-danger mx-1"  data-toggle="modal" data-target="#declinePendingapplicantModal" >Decline </button>
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
                        <!-- Add more application rows here -->
                        
                    </tbody>
                </table>

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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#accepted-application-management-filter">
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
                                        <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                        <button wire:click="accepted_applicant_filterView()" data-dismiss="modal" 
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-10">
                            <!-- <button class="btn btn-warning mx-1" wire:click="accepted_return_check()" data-toggle="modal" data-target="#returnAcceptedapplicantModal">Return </button> -->
                            <button class="btn btn-warning mx-1"  data-toggle="modal" data-target="#returnAcceptedapplicantModal">Return </button>
                            <!-- <button class="btn btn-danger mx-1" wire:click="declined_check_accepted()" data-toggle="modal" data-target="#declineAcceptedapplicantModal" >Decline </button> -->
                            <button class="btn btn-danger mx-1"  data-toggle="modal" data-target="#declineAcceptedapplicantModal" >Decline </button>
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" > Return </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <select class="filter-select " id="exam-filter" wire:model="declined_test_type_id" wire:change="accepted_application_exam_type_filter()">
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
                                <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#declined-application-management-filter">
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
                                        <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                        <button wire:click="declined_applicant_filterView()" data-dismiss="modal" 
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-10">
                            <button class="btn btn-danger mx-1"  data-toggle="modal" data-target="#DeleteDeclinedapplicantModal">Delete </button>
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" > Delete </button>
                                </div>
                            </form>
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
