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
                    <a class="nav-link  @if($active == 'unassigned_room') show active @endif " wire:key="unassigned_room" wire:click="active_page('unassigned_room')" data-bs-toggle="tab" href="#room-assignment-tab">Unassigned Room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($active == 'assigned_room') show active @endif " wire:key="assigned_room" wire:click="active_page('assigned_room')" data-bs-toggle="tab" href="#room-assignment1-tab">Assigned Room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($active == 'room_management') show active @endif "wire:key="room_management"  wire:click="active_page('room_management')" data-bs-toggle="tab" href="#room-management-tab">Room Management</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">

                <!-- Unnassigned Room Tab -->
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
                                    <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-bs-toggle="modal" data-bs-target="#unassigned-room-filter">
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
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="unassigned-filtering-{{$loop->iteration}}"
                                                    wire:model.defer="unassigned_applicant_filter.{{$item}}">
                                                <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                                    {{$item}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                            <button wire:click="unassigned_applicant_filterView()" data-bs-dismiss="modal" 
                                                class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-10">
                                <button class="btn btn-success mx-1"  type="button" wire:click="assigning_room_check()">Assign room </button>
                            </div>
                        </div>
                        <!-- Displays a table of room assignment and list of applicants -->
                        <table class="application-table">
                            <thead>
                                <tr >
                                @foreach ($unassigned_applicant_filter as $item => $value)
                                    @if($loop->first && $value)
                                        <th><input wire:model="unassigned_selected_all" wire:change="unassigned_applicant_select_all()" type="checkbox" ></th> 
                                    @elseif($loop->last && $value )
                                    <th class="text-center">Action</th>
                                    @elseif($value)
                                        <th >{{$item}}</th>
                                    @endif
                                @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($unassigned_applicant_data as $item => $value)
                                <tr >
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
                                            NO RECORDS SELECTED
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
                                        <option wire:key="unassigned-room-{{$value->school_room_id}}" value="{{$value->school_room_id}}">{{$value->school_room_test_center.' '.$value->school_room_name.' ( '.$value->school_room_test_time_start.' - '.$value->school_room_test_time_end.' )'}}</option>
                                        @empty
                                            <option value="">NO RECORDS</option>
                                        @endforelse
                                    </select>
                                </div>

                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" >Close</button>
                                <button type="button" class="btn btn-primary" wire:click="assigning_room()">Assign</button>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-bs-toggle="modal" data-bs-target="#assigned-room-filter">
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
                                            <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                            <button wire:click="unassigned_applicant_filterView()" data-bs-dismiss="modal" 
                                                class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-10">
                                <button class="btn btn-warning mx-1"  wire:click="reassigning_room_check()" >Reassign room </button>
                                <button class="btn btn-danger mx-1"  wire:click="remove_room_check()" >Remove room </button>
                            </div>
                        </div>
                        <!-- Displays a table of room assignment and list of applicants -->
                        <table class="application-table ">
                            <thead>
                                <tr>
                                    @foreach ($assigned_applicant_filter as $item => $value)
                                        @if ($loop->first && $value)
                                            <th><input wire:model="assigned_selected_all" wire:change="assigned_applicant_select_all()" type="checkbox" ></th> 
                                        @elseif($loop->last && $value )
                                        <th class="text-center">Action</th>
                                        @elseif($value && $item != 'Action')
                                            <th >{{$item}}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($assigned_applicant_data as $item => $value)
                                <tr >
                                    
                                    @if($assigned_applicant_filter['Select all'])
                                        <td><input type="checkbox" 
                                        
                                            wire:model="assigned_selected.{{$loop->index}}.{{$value->t_a_id}}"
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
                                <h5 class="modal-title" id="reassignModalLabel">Assign Venue and Room</h5>
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
                                        @if($assigned_valid)
                                            @foreach ($assigned_applicant_data as $item => $value)
                                                @if($assigned_selected[$item][$value->t_a_id])
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
                                    <select class="form-control"  wire:model.defer="assigned_school_room_id">
                                    
                                        @forelse ($school_rooms as $item => $value)
                                        <option wire:key="unassigned-room-{{$value->school_room_id}}" value="{{$value->school_room_id}}">{{$value->school_room_test_center.' '.$value->school_room_name.' ( '.$value->school_room_test_time_start.' - '.$value->school_room_test_time_end.' )'}}</option>
                                        @empty
                                            <option value="">NO RECORDS</option>
                                        @endforelse
                                    </select>
                                </div>

                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="assignButton" wire:click="reassigning_room()">Assign</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="removeassignedRoom" tabindex="-1" role="dialog" aria-labelledby="removeassignedRoomLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="removeassignedRoomLabel">Remove assigned room</h5>
                                <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </div>
                            </div>
                            <hr>
                            <div class="modal-body">
                                <h6>Are you sure you want to remove the assigned room?</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Full name</th>
                                        <th scope="col">Exam type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($remove_valid)
                                            @foreach ($assigned_applicant_data as $item => $value)
                                                @if($assigned_selected[$item][$value->t_a_id])
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
                                
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="reassignConfirmButton" wire:click="remove_room()">Remove</button>
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
                    <!-- Button to trigger the Add Room modal -->
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <button type="button" class="btn" style="background-color: #990000; color: white;" data-bs-toggle="modal" data-bs-target="#addRoomModal">Add Room</button>
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
                                @if($school_room_filter['Status'])
                                    <td>@if ($value->school_room_isactive)Active @else Deleted @endif</td>
                                @endif
                                @if($school_room_filter['Actions'] )
                                    <td class="text-center">
                                        @if($access_role['R']==1)
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewRoomModal" wire:click="view_room_details({{$value->school_room_id }})">View</button>
                                        @endif
                                        @if($access_role['U']==1)
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EditRoomModal" wire:click="edit_room_details({{$value->school_room_id }})">Edit</button>
                                        @endif
                                        @if($access_role['D']==1)
                                        <button class="btn btn-danger" id="confirmDeleteRoom" wire:click="deleteRoom({{ $value->school_room_id }})">Delete</button>
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

                @if ($roomToDelete)
                <div class="modal fade" id="confirmDeleteRoom" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteRoom" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteRoom">Confirm Deletion</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this room?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" wire:click="confirmDeleteRoom">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Add Room Modal -->
                <div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="addRoomModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addRoomModalLabel">Add Room</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                                <form wire:submit.prevent="add_room()">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room name:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addCollegeName">College Name:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room_college_name"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomName">College Abbreviation:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room_college_abr">
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomName">Test Venue :</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room_venue" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomName">Test Center :</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room_test_center" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room Capacity #:</label>
                                            <input type="number" min="1" max="500" class="form-control" wire:model.defer="school_room_capacity" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomDescription">Test Date:</label>
                                            <input type="date" class="form-control" wire:model.defer="school_room_test_date" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomDescription">Test start time:</label>
                                            <input type="time" class="form-control" wire:model.defer="school_room_test_time_start" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomDescription">Test end time:</label>
                                            <input type="time" class="form-control" wire:model.defer="school_room_test_time_end" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomDescription">Room description:</label>
                                            <textarea class="form-control" wire:model.defer="school_room_description" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Room</button>
                                    </div>
                                </form>
                      
                        </div> 
                    </div>
                </div>

                <!-- View Room Modal -->
                @if($view_room)
                <div class="modal fade" id="ViewRoomModal" tabindex="-1" role="dialog" aria-labelledby="ViewRoomModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewRoomModalLabel">View Room Details</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                            <form >
                                <div class="modal-body">
                                    @forelse ($view_room as $item => $value)
                                    <div class="form-group">
                                        <label for="addRoomCapacity">Room name:</label>
                                        <input disabled type="text" class="form-control" wire:model.defer="school_room_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addCollegeName">College Name:</label>
                                        <input disabled type="text" class="form-control" wire:model.defer="school_room_college_name"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomName">College Abbreviation:</label>
                                        <input disabled type="text" class="form-control" wire:model.defer="school_room_college_abr">
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomName">Test Venue :</label>
                                        <input disabled type="text" class="form-control" wire:model.defer="school_room_venue" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomName">Test Center :</label>
                                        <input disabled type="text" class="form-control" wire:model.defer="school_room_test_center" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomCapacity">Room Capacity #:</label>
                                        <input disabled type="number" min="1" max="500" class="form-control" wire:model.defer="school_room_capacity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Test Date:</label>
                                        <input disabled type="date" class="form-control" wire:model.defer="school_room_test_date" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Test start time:</label>
                                        <input disabled type="time" class="form-control" wire:model.defer="school_room_test_time_start" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Test end time:</label>
                                        <input disabled type="time" class="form-control" wire:model.defer="school_room_test_time_end" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Room description:</label>
                                        <textarea disabled class="form-control" wire:model.defer="school_room_description" rows="4"></textarea>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                @empty 
                                    <div>NO DATA</div>
                                @endforelse
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($edit_room)
                <div class="modal fade" id="EditRoomModal" tabindex="-1" role="dialog" aria-labelledby="EditRoomModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditRoomModalLabel">View Room Details</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal" ></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing room details -->
                                <hr>
                                @forelse ($edit_room as $item => $value)
                                <form wire:submit.prevent="edit_room({{$value->school_room_id}})">
                                <div class="modal-body">
                                    
                                    <div class="form-group">
                                        <label for="addRoomCapacity">Room name:</label>
                                        <input  type="text" class="form-control" wire:model.defer="school_room_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addCollegeName">College Name:</label>
                                        <input  type="text" class="form-control" wire:model.defer="school_room_college_name"required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomName">College Abbreviation:</label>
                                        <input  type="text" class="form-control" wire:model.defer="school_room_college_abr">
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomName">Test Venue :</label>
                                        <input  type="text" class="form-control" wire:model.defer="school_room_venue" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomName">Test Center :</label>
                                        <input  type="text" class="form-control" wire:model.defer="school_room_test_center" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomCapacity">Room Capacity #:</label>
                                        <input  type="number" min="1" max="500" class="form-control" wire:model.defer="school_room_capacity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Test Date:</label>
                                        <input  type="date" class="form-control" wire:model.defer="school_room_test_date" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Test start time:</label>
                                        <input  type="time" class="form-control" wire:model.defer="school_room_test_time_start" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Test end time:</label>
                                        <input  type="time" class="form-control" wire:model.defer="school_room_test_time_end" required></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="addRoomDescription">Room description:</label>
                                        <textarea class="form-control" wire:model.defer="school_room_description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" >Save</button>
                                </div>
                                @empty 
                                    <div>NO DATA</div>
                                @endforelse
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endif

        </div>
        </main><!-- End #main -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</div>
