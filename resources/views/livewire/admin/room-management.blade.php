<div>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Room Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Room Management</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link  @if($active == 'unassigned_room') show active @endif " wire:key="unassigned_room" wire:click="active_page('unassigned_room')" data-toggle="tab" href="#room-assignment-tab">Unassigned Room</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if($active == 'assigned_room') show active @endif " wire:key="assigned_room" wire:click="active_page('assigned_room')" data-toggle="tab" href="#room-assignment1-tab">Assigned Room</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if($active == 'room_management') show active @endif "wire:key="room_management"  wire:click="active_page('room_management')" data-toggle="tab" href="#room-management-tab">Room Management</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">

            <!-- Unnassigned Tab -->
            <div class="tab-pane @if($active == 'unassigned_room') show active @endif " id="room-assignment-tab">
                <!-- Room Assignment Form -->
                <!-- List of Room Assignments -->
                <div class="room-assignments">
                    <div class="d-flex mt-2">
                        <label class="filter-label align-self-center " for="exam-filter">Filter by Type of Exam:</label>
                        <select class="filter-select " wire:model.defer="unassigned_test_type_id" wire:change="unassigned_applicant_exam_type_filter()">
                            <option value="0"  >All</option>
                            @foreach ($exam_types as $item => $value)
                                <option wire:key="unassigned-{{$value->test_type_id}}" value="{{$value->test_type_id}}" >{{$value->test_type_name}}</option>
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
                                <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#unassigned-room-filter">
                                    <i class="bi bi-funnel-fill me-1"></i>
                                    <div><span class='btn-text'>Columns</span></div>
                                </button>
                                @endif
                                <input class="form-control" type="text" id="search" placeholder="Search "  wire:change="search_applicant()"/> 
                                <!-- wire:model.debounce.500ms="search" -->
                            </div>
                        </div> 
                    

                        <div class="modal fade" id="unassigned-room-filter" tabindex="-1" role="dialog" aria-labelledby="unassigned-room-filterLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Unassigned Room</h5>
                                    </div>
                                    <hr>
                                    <div class="modal-body">
                                        @foreach($unassigned_applicant_filter as $item => $value)
                                        <div class="form-check" wire:key="div-unassigned">
                                            <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                                wire:model.defer="unassigned_applicant_filter.{{$item}}">
                                            <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                                {{$item}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                        <button wire:click="unassigned_applicant_filterView()" data-dismiss="modal" 
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-10">
                            <button class="btn btn-success mx-1"  type="button" data-toggle="modal" data-target="#assignModal" wire:click="assigning_room_check()">Assign room </button>
                        </div>
                    </div>
                    <!-- Displays a table of room assignment and list of applicants -->
                    <table class="application-table">
                        <thead>
                            <tr wire:key="unassigned-tr">
                            @foreach ($unassigned_applicant_filter as $item => $value)
                                @if($loop->first && $value)
                                    <th><input wire:model="unassigned_selected_all" wire:change="unassigned_applicant_select_all()" type="checkbox" wire:key="filter-unassigned-selected"></th> 
                                @elseif($loop->last && $value )
                                <th class="text-center"wire:key="filter-Actions">Action</th>
                                @elseif($value)
                                    <th wire:key="filter-{{$item}}">{{$item}}</th>
                                @endif
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($unassigned_applicant_data as $item => $value)
                            <tr wire:key="item-{{ $value->t_a_id }}">
                                
                                @if($unassigned_applicant_filter['Select all'])
                                    <td><input type="checkbox" 
                                    
                                        wire:model="unassigned_selected.{{$loop->index}}.{{$value->t_a_id}}"
                                        >
                                    </td>
                                @endif
                                @if($unassigned_applicant_filter['#'])
                                    <td>{{ $loop->index+1 }}</td>
                                @endif
                                @if($unassigned_applicant_filter['Code'])
                                    <td>{{$value->t_a_id.'-'.$value->date_applied }}</td>
                                @endif
                                @if($unassigned_applicant_filter['Applicant name'])
                                    <td>{{ $value->user_fullname }}</td>
                                @endif
                                @if($unassigned_applicant_filter['Exam type'])
                                    <td class="text-align center">{{ $value->test_type_name }}</td>
                                @endif
                                @if($unassigned_applicant_filter['Room venue'])
                                    <td class="text-align center">Not assigned</td>
                                @endif
                                @if($unassigned_applicant_filter['A.Y.'])
                                    <td>{{ $value->school_year_details }}</td>
                                @endif
                                @if($unassigned_applicant_filter['Date applied'])
                                    <td class="text-align center">{{date_format(date_create($value->date_applied),"F d, Y ")}}</td>
                                @endif
                                
                                @if($unassigned_applicant_filter['Actions'] )
                                    <td class="text-center">
                                        @if($access_role['R']==1)
                                        <button class="btn btn-primary">View</button>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center font-weight-bold" colspan="42">
                                    NO RECORDS 
                                </td>
                            </tr>
                        @endforelse
                            <!-- Add more accepted applicant rows here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Assign Modal -->
            @if($unassigned_valid)
            <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignModalLabel">Assign Venue and Room</h5>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <label for="">Selected:</label>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Full name</th>
                                    <th scope="col">Exam type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($unassigned_valid)
                                        @foreach ($unassigned_applicant_data as $item => $value)
                                            @if($unassigned_selected[$item][$value->t_a_id])
                                    <tr>
                                        <td>{{$value->t_a_id.'-'.$value->date_applied }}</td>
                                        <td>{{ $value->user_fullname }}</td>
                                        <td>{{ $value->test_type_name }}</td>
                                    </tr>
                                            @endif
                                        @endforeach
                                    @else
                                    <td class="text-center font-weight-bold" colspan="42" style="color:red;">
                                        NO RECORD SELECTED
                                    </td>
                                    @endif
                                    
                                </tbody>
                            </table> 
                           
                            <br>
                            <hr>
                            <div class="form-group">
                                <label for="venueSelect">Select Venue:</label>
                                <select class="form-control"  wire:model.defer="unassigned_school_room_id">
                                 
                                    @forelse ($school_rooms as $item => $value)
                                    <option wire:key="unassigned-room-{{$value->school_room_id}}" value="{{$value->school_room_id}}">{{$value->school_room_test_center.' '.$value->school_room_name}}</option>
                                    @empty
                                        <option value="">NO RECORDS</option>
                                    @endforelse
                                </select>
                            </div>

                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="assignButton" wire:click="assigning_room()">Assign</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Assigned Tab -->
            <div class="tab-pane  @if($active == 'assigned_room') show active @endif " id="room-assignment1-tab">
                <!-- Room Assignment Form -->
                <!-- List of Room Assignments -->
                <div class="room-assignments">
                    <div class="d-flex mt-2">
                        <label class="filter-label align-self-center " for="exam-filter">Filter by Type of Exam:</label>
                        <select class="filter-select " wire:model.defer="assigned_test_type_id" wire:change="assigned_applicant_exam_type_filter()">
                            <option value="0"  >All</option>
                            @foreach ($exam_types as $item => $value)
                                <option wire:key="assigned-{{$value->test_type_id}}"value="{{$value->test_type_id}}" >{{$value->test_type_name}}</option>
                                                        
        

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
                                <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#assigned-room-filter">
                                    <i class="bi bi-funnel-fill me-1"></i>
                                    <div><span class='btn-text'>Columns</span></div>
                                </button>
                                @endif
                                <input class="form-control" type="text" id="search" placeholder="Search "  wire:change="search_applicant()"/> 
                                <!-- wire:model.debounce.500ms="search" -->
                            </div>
                        </div> 
                    

                        <div class="modal fade" id="assigned-room-filter" tabindex="-1" role="dialog" aria-labelledby="unassigned-room-filterLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Assigned Room</h5>
                                    </div>
                                    <hr>
                                    <div class="modal-body">
                                        @foreach($assigned_applicant_filter as $item => $value)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="assigned-filtering-{{$loop->iteration}}"
                                                wire:model.defer="assigned_applicant_filter.{{$item}}">
                                            <label class="form-check-label" for="assigned-filtering-{{$loop->iteration}}">
                                                {{$item}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="modal-footer">
                                        <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                        <button wire:click="unassigned_applicant_filterView()" data-dismiss="modal" 
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-10">
                            <button class="btn btn-warning mx-1" wire:click="accepted_pending()" >Reassign room </button>
                        </div>
                    </div>
                    <!-- Displays a table of room assignment and list of applicants -->
                    <table class="application-table">
                        <thead>
                            <tr>
                                @foreach ($assigned_applicant_filter as $item => $value)
                                    @if ($loop->first && $value)
                                        <th><input wire:model="assigned_selected_all" wire:change="assigned_applicant_select_all()" type="checkbox" wire:key="assigned-filter-unassigned-selected"></th> 
                                    @elseif($loop->last && $value )
                                    <th class="text-center"wire:key="assigned-filter-action">Action</th>
                                    @elseif($value && $item != 'Action')
                                        <th wire:key="assigned-filter-{{$item}}">{{$item}}</th>
                                    @endif
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($assigned_applicant_data as $item => $value)
                            <tr wire:key="item-{{ $value->t_a_id }}">
                                
                                @if($assigned_applicant_filter['Select all'])
                                    <td><input type="checkbox" 
                                    
                                        wire:model="pending_selected.{{$loop->index}}.{{$value->t_a_id}}"
                                        >
                                    </td>
                                @endif
                                @if($assigned_applicant_filter['#'])
                                    <td>{{ $loop->index+1 }}</td>
                                @endif
                                @if($assigned_applicant_filter['Code'])
                                    <td>{{$value->t_a_id.'-'.$value->date_applied }}</td>
                                @endif
                                @if($assigned_applicant_filter['Applicant name'])
                                    <td>{{ $value->user_fullname }}</td>
                                @endif
                                @if($assigned_applicant_filter['Exam type'])
                                    <td class="text-align center">{{ $value->test_type_name }}</td>
                                @endif
                                @if($assigned_applicant_filter['Room venue'])
                                    <td>{{ $value->school_room_id.' - '.$value->school_room_name }}</td>
                                @endif
                                @if($assigned_applicant_filter['Test center'])
                                    <td>{{ $value->school_room_test_center }}</td>
                                @endif
                                @if($assigned_applicant_filter['Start - End'])
                                    <td>{{ $value->school_room_test_time_start.' - '.$value->school_room_test_time_end }}</td>
                                @endif
                                @if($assigned_applicant_filter['A.Y.'])
                                    <td>{{ $value->school_year_details }}</td>
                                @endif
                                @if($assigned_applicant_filter['Date applied'])
                                    <td class="text-align center">{{date_format(date_create($value->date_applied),"F d, Y ")}}</td>
                                @endif
                                
                                @if($assigned_applicant_filter['Actions'] )
                                    <td class="text-center">
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
            </div>

            <!-- Re-assign Modal -->
            <div class="modal fade" id="reassignModal" tabindex="-1" role="dialog" aria-labelledby="reassignModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reassignModalLabel">Re-assign Venue and Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Re-assignment form fields -->
                            <form id="reassignForm">
                                <div class="form-group">
                                    <label for="reassignVenue">Select Venue:</label>
                                    <select class="form-control" id="reassignVenue" name="reassignVenue">
                                        <option value="">Select Venue</option>
                                        <option value="WMSU MAIN">WMSU MAIN</option>
                                        <option value="WMSU ESU">WMSU ESU</option>
                                        <!-- Add more venue options as needed -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="reassignRoom">Select Room:</label>
                                    <select class="form-control" id="reassignRoom" name="reassignRoom">
                                        <option value="">Select Room</option>
                                        <!-- Room options will be dynamically populated based on the selected venue -->
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="reassignConfirmButton">Re-assign</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- View Names Modal (Add the modal content as needed) -->
            <div class="modal fade" id="viewNamesModal" tabindex="-1" role="dialog" aria-labelledby="viewNamesModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewNamesModalLabel">Assigned Applicants</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Display the list of assigned applicant names here -->
                            <ul>
                                <li>John Doe</li>
                                <li>Jane Smith</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Room Management Tab -->
            <div class="tab-pane  @if($active == 'room_management') show active @endif " id="room-management-tab">
                <!-- Room Management Table -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Button to trigger the Add Room modal -->
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn" style="background-color: #990000; color: white;" data-toggle="modal" data-target="#addRoomModal">Add Room</button>
                </div>


                <table class="application-table">
                    <thead>
                        <tr>
                        @foreach ($school_room_filter as $item => $value)
                           
                            @if($loop->last && $value )
                                <th class="text-center">
                                    Action
                                </th>
                            @elseif($value)
                                <th>{{$item}}</th>
                            @endif
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($school_rooms as $item => $value)
                        <tr wire:key="item-{{ $value->school_room_id }}">
                            @if($school_room_filter['#'])
                                <td>{{ $loop->index+1 }}</td>
                            @endif
                            @if($school_room_filter['Venue'])
                                <td>{{$value->school_room_venue }}</td>
                                @endif
                            @if($school_room_filter['Test center'])
                                <td>{{ $value->school_room_test_center }}</td>
                            @endif
                            @if($school_room_filter['College'])
                                <td class="text-center">{{ $value->school_room_college_abr }}</td>
                            @endif
                            @if($school_room_filter['Room code'])
                                <td>{{ $value->school_room_id.' - '.$value->school_room_name }}</td>
                            @endif
                            @if($school_room_filter['Room name'])
                                <td>{{ $value->school_room_name }}</td>
                            @endif
                            @if($school_room_filter['Capacity'])
                                <td>{{ $value->school_room_capacity }}</td>
                            @endif
                            @if($school_room_filter['Start - End'])
                                <td>{{ $value->school_room_test_time_start.' - '.$value->school_room_test_time_end }}</td>
                            @endif
                            @if($school_room_filter['Actions'] )
                                <td class="text-center">
                                    @if($access_role['R']==1)
                                    <button class="btn btn-primary">View</button>
                                    @endif
                                    @if($access_role['U']==1)
                                    <button class="btn btn-success">Edit</button>
                                    @endif
                                    @if($access_role['D']==1)
                                    <button class="btn btn-danger">Delete</button>
                                    @endif
                                </td>
                            @endif
                        </tr>
                        @empty
                            <td class="text-center font-weight-bold" colspan="42">
                                NO RECORDS 
                            </td>
                        @endforelse
                        <!-- Add more room entries as needed -->
                    </tbody>
                </table>
            </div>

            <!-- Add Room Modal -->
            <div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="addRoomModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addRoomModalLabel">Add Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding a new room -->
                            <form id="addRoomForm">
                            <div class="form-group">
                                <label for="addSchoolYear">School Year:</label>
                                <select class="form-control" id="addSchoolYear" name="addSchoolYear" required>
                                    <option value="">Select School Year</option>
                                    <option value="2023-2024">2023-2024</option>
                                    <option value="2024-2025">2024-2025</option>
                                    <option value="2025-2026">2025-2026</option>
                                    <!-- Add more options for additional years as needed -->
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="addCollegeName">College Name:</label>
                                    <input type="text" class="form-control" id="addCollegeName" name="addCollegeName" required>
                                </div>
                                <div class="form-group">
                                    <label for="addRoomName">Venue:</label>
                                    <input type="text" class="form-control" id="addRoomName" name="addRoomName" required>
                                </div>
                                <div class="form-group">
                                    <label for="addRoomName">Room name #:</label>
                                    <input type="text" class="form-control" id="addRoomName" name="addRoomName" required>
                                </div>
                                <div class="form-group">
                                    <label for="addRoomCapacity">Capacity:</label>
                                    <input type="number" class="form-control" id="addRoomCapacity" name="addRoomCapacity" required>
                                </div>
                                <div class="form-group">
                                    <label for="addRoomCapacity">Slot:</label>
                                    <input type="number" class="form-control" id="addRoomCapacity" name="addRoomCapacity" required>
                                </div>
                                <div class="form-group">
                                    <label for="addRoomDescription">Room Description:</label>
                                    <textarea class="form-control" id="addRoomDescription" name="addRoomDescription" rows="4" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="saveAddRoom">Add Room</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Room Modal -->
            <div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editRoomModalLabel">Edit Room Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing room details -->
                            <form id="editRoomForm">
                            <div class="form-group">
                                    <label for="editSchoolYear">School Year:</label>
                                    <input type="number" class="form-control" id="editSchoolYear" name="editSchoolYear" required>
                                </div>
                                <div class="form-group">
                                    <label for="editCollegeName">College Name:</label>
                                    <input type="text" class="form-control" id="editCollegeName" name="editCollegeName" required>
                                </div>
                                <div class="form-group">
                                    <label for="editCollegeName">Venue:</label>
                                    <input type="text" class="form-control" id="editCollegeName" name="editCollegeName" required>
                                </div>
                                <div class="form-group">
                                    <label for="editRoomName">Room Name #:</label>
                                    <input type="text" class="form-control" id="editRoomName" name="editRoomName" required>
                                </div>
                                <div class="form-group">
                                    <label for="editRoomCapacity">Capacity:</label>
                                    <input type="number" class="form-control" id="editRoomCapacity" name="editRoomCapacity" required>
                                </div>
                                <div class="form-group">
                                    <label for="editRoomCapacity">Slot:</label>
                                    <input type="number" class="form-control" id="editRoomCapacity" name="editRoomCapacity" required>
                                </div>
                                <div class="form-group">
                                    <label for="editRoomDescription">Room Description:</label>
                                    <textarea class="form-control" id="editRoomDescription" name="editRoomDescription" rows="4" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="saveEditRoom">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const venueSelect = document.getElementById("venueSelect");
            const roomSelectGroup = document.getElementById("roomSelectGroup");
            const roomSelect = document.getElementById("roomSelect");

            // Define room options based on venues
            const rooms = {
                "WMSU MAIN": ["CLA 12", "CLA 01", "LAW 121"],
                "WMSU ESU": ["ESU Room 1", "ESU Room 2", "ESU Room 3"],
            };

            venueSelect.addEventListener("change", function () {
                const selectedVenue = venueSelect.value;
                if (selectedVenue in rooms) {
                    // Populate the room dropdown based on the selected venue
                    roomSelectGroup.style.display = "block";
                    roomSelect.innerHTML = '<option value="">Select Room</option>';
                    rooms[selectedVenue].forEach(function (room) {
                        const option = document.createElement("option");
                        option.value = room;
                        option.textContent = room;
                        roomSelect.appendChild(option);
                    });
                } else {
                    // Hide the room dropdown if no venue is selected
                    roomSelectGroup.style.display = "none";
                }
            });

            // Handle the "Assign" button click
            const assignButton = document.getElementById("assignButton");
            assignButton.addEventListener("click", function () {
                const selectedVenue = venueSelect.value;
                const selectedRoom = roomSelect.value;
                // Perform assignment logic here based on the selected venue and room
                // You can send this information to the server or perform any other necessary actions.
                console.log("Selected Venue: " + selectedVenue);
                console.log("Selected Room: " + selectedRoom);
                // Close the modal
                $('#assignModal').modal('hide');
            });
        });
    </script>

    <script>
        // JavaScript to trigger the re-assign modal when the "Re-assign" button is clicked
        document.addEventListener("DOMContentLoaded", function () {
            const reassignModalButton = document.getElementById("reassignModalButton");
            const reassignModal = document.getElementById("reassignModal");

            reassignModalButton.addEventListener("click", function () {
                // Manually open the re-assign modal
                $(reassignModal).modal("show");
            });

            // Handle the "Re-assign" button click inside the re-assign modal
            const reassignConfirmButton = document.getElementById("reassignConfirmButton");
            reassignConfirmButton.addEventListener("click", function () {
                // Perform re-assignment logic here
                // You can send this information to the server or perform any other necessary actions.
                // Close the re-assign modal
                $('#reassignModal').modal('hide');
            });
        });

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
