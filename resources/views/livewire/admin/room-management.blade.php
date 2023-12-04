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
                    <a class="nav-link  @if($active == 'unassigned_room') show active @endif " wire:key="unassigned_room" wire:click="active_page('unassigned_room')" >Unassigned Room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($active == 'assigned_room') show active @endif " wire:key="assigned_room" wire:click="active_page('assigned_room')">Assigned Room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($active == 'test_date') show active @endif "wire:key="test_date"  wire:click="active_page('test_date')">Test Date Schedules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($active == 'room_management') show active @endif "wire:key="room_management"  wire:click="active_page('room_management')" >Room Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if($active == 'test_centers') show active @endif "wire:key="test_centers"  wire:click="active_page('test_centers')" >Test Centers</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">

                <!-- Unnassigned Room Tab -->
                <div class="tab-pane @if($active == 'unassigned_room') show active @endif " id="room-assignment-tab">
                    <!-- Room Assignment Form -->
                    <!-- List of Room Assignments -->
                    <div class="room-assignments">
                        <div class="d-flex mt-2 flex-wrap">
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
                            <div class="col-md-6 mt-1 sort-container">
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
                            <div class="mx-md-3">
                                <button class="btn btn-success mt-1"  type="button" wire:click="assigning_room_check()">Assign room </button>
                            </div>
                        </div>
                        <!-- Displays a table of room assignment and list of applicants -->
                        <table class="application-table">
                            <thead>
                                <tr >
                           
                                </tr>
                            </thead>
                            <tbody>
                         
                                <!-- Add more accepted applicant rows here -->
                            </tbody>
                        </table>
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
                                <button class="btn btn-primary mx-1"  wire:click="reassigning_room_check()" >Reassign room </button>
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
                          
                                <!-- Add more accepted applicant rows here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane  @if($active == 'test_date') show active @endif " id="test-date-schedules-management-tab">
                </div>

                <div class="tab-pane  @if($active == 'room_management') show active @endif " id="room-management-tab">
                    <!-- Room Management Table -->
                    <!-- Button to trigger the Add Room modal -->
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <button type="button" class="btn" style="background-color: #990000; color: white;" data-bs-toggle="modal" data-bs-target="#addRoomModal">Add Room</button>
                        <button type="button" class="btn btn-warning"  wire:click="reset_room_proctor()">Reset Room Proctors</button>
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
                                @if($school_room_filter['Test Center Name'])
                                    <td>{{ $value->test_center_name }}</td>
                                @endif
                                @if($school_room_filter['Test Center Code'])
                                    <td>{{ $value->test_center_code}}</td>
                                @endif
                                @if($school_room_filter['Building name'])
                                    <td>{{ $value->school_room_bldg_name}}</td>
                                @endif
                                @if($school_room_filter['Room name'])
                                    <td>{{ $value->school_room_name}}</td>
                                @endif
                                @if($school_room_filter['Room no.'])
                                    <td>{{ $value->school_room_number}}</td>
                                @endif
                                @if($school_room_filter['Room Description'])
                                    <td>{{ $value->school_room_description}}</td>
                                @endif
                                @if($school_room_filter['Capacity'])
                                    <td>{{ $value->school_room_max_capacity}}</td>
                                @endif
                                @if($school_room_filter['Status'])
                                    <td>@if($value->school_room_isactive ) Active @else Inactive @endif</td>
                                @endif

                                
                                @if($school_room_filter['Actions'] )
                                    <td class="text-center">
                                        @if($access_role['R']==0)
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewRoomModal" wire:click="view_room_details({{$value->school_room_id }})">View</button>
                                        @endif
                                        @if($access_role['U']==1)
                                        <button class="btn btn-success" wire:click="edit_room({{$value->school_room_id }})">Edit</button>
                                        @endif
                                        @if($access_role['D']==1)
                                            @if($value->school_room_isactive)
                                                <button class="btn btn-danger" wire:key="delete" id="confirmDeleteRoom" wire:click="delete_room({{ $value->school_room_id }})">Delete</button>
                                            @else
                                                <button class="btn btn-warning" wire:key="delete" wire:click="activate_room({{ $value->school_room_id}})">Activate</button>
                                            @endif
                                       
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

                <div class="tab-pane  @if($active == 'test_centers') show active @endif " id="test-centers-tab">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <button type="button" class="btn btn-success" wire:click="add_test_center()" >Add Test Centers</button>
                    </div>

                    <table class="application-table">
                        <thead>
                            <tr>
                            @foreach ($test_center_filter as $item => $value)
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
                        @forelse ($test_center_data as $item => $value)
                            <tr wire:key="item-{{ $value->id }}">
                                @if($test_center_filter['#'])
                                    <td>{{ $loop->index+1 }}</td>
                                @endif
                                @if($test_center_filter['Test Center Code'])
                                    <td>{{ $value->test_center_code}}</td>
                                @endif
                                @if($test_center_filter['Test Center Name'])
                                    <td>{{ $value->test_center_name }}</td>
                                @endif
                                @if($test_center_filter['Test Center Code Name'])
                                    <td>{{ $value->test_center_code_name }}</td>
                                @endif
                                @if($test_center_filter['isactive?'])
                                    <td>@if($value->test_center_isactive ) Active @else Inactive @endif</td>
                                @endif
                                
                                @if($test_center_filter['Actions'] )
                                    <td class="text-center">
                                        @if($access_role['R']==0)
                                        <button class="btn btn-primary" wire:click="view_room_details({{$value->id }})">View</button>
                                        @endif
                                        @if($access_role['U']==1)
                                        <button class="btn btn-success" wire:click="edit_test_center({{$value->id }})">Edit</button>
                                        @endif
                                        @if($access_role['D']==1)
                                            @if($value->test_center_isactive ) 
                                                <button class="btn btn-danger" wire:click="delete_test_center({{ $value->id }})">Delete</button>
                                            @else
                                                <button class="btn btn-warning" wire:click="activate_test_center({{ $value->id}})">Activate</button>
                                            @endif
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
                
                <div class="modal fade" id="addTestCenterModal" tabindex="-1" role="dialog" aria-labelledby="addTestCenterModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTestCenterModalLabel">Add Test Center</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                                <form wire:submit.prevent="save_add_test_center()">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Test Center code:</label>
                                            <input type="text" class="form-control" wire:model.defer="test_center.test_center_code" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addCollegeName">Test Center name:</label>
                                            <input type="text" class="form-control" wire:model.defer="test_center.test_center_name"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomName">Test Center Code name:</label>
                                            <input type="text" class="form-control" wire:model.defer="test_center.test_center_code_name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Test Center</button>
                                    </div>
                                </form>
                      
                        </div> 
                    </div>
                </div>
                <div class="modal fade" id="editTestCenterModal" tabindex="-1" role="dialog" aria-labelledby="editTestCenterModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTestCenterModalLabel">Edit Test Center</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                               @if(isset($test_center['id']))
                                    <form wire:submit.prevent="save_edit_test_center({{$test_center['id']}})">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="addRoomCapacity">Test Center code:</label>
                                                <input type="text" class="form-control" wire:model.defer="test_center.test_center_code" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="addCollegeName">Test Center name:</label>
                                                <input type="text" class="form-control" wire:model.defer="test_center.test_center_name"required>
                                            </div>
                                            <div class="form-group">
                                                <label for="addRoomName">Test Center Code name:</label>
                                                <input type="text" class="form-control" wire:model.defer="test_center.test_center_code_name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Edit Test Center</button>
                                        </div>
                                    </form>
                                @endif
                        </div> 
                    </div>
                </div>
                <div class="modal fade" id="deleteTestCenterModal" tabindex="-1" role="dialog" aria-labelledby="deleteTestCenterModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteTestCenterModalLabel">Delete Test Center</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                            @if(isset($test_center['id']))
                                <form wire:submit.prevent="save_delete_test_center({{$test_center['id']}})">
                                    <div class="modal-body">
                                        Are you sure you want to delete this testing center?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete Test Center</button>
                                    </div>
                                </form>
                            @endif
                        </div> 
                    </div>
                </div>
                <div class="modal fade" id="ActivateTestCenterModal" tabindex="-1" role="dialog" aria-labelledby="ActivateTestCenterModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ActivateTestCenterModalLabel">Activate Test Center</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                            @if(isset($test_center['id']))
                                <form wire:submit.prevent="save_activate_test_center({{$test_center['id']}})">
                                    <div class="modal-body">
                                        Are you sure you want to activate this testing center?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning">Activate Test Center</button>
                                    </div>
                                </form>
                            @endif
                        </div> 
                    </div>
                </div>

                <div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="addRoomModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addRoomModalLabel">Add Room</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                                <form wire:submit.prevent="save_add_room()">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Test Center:</label>
                                            <select wire:model.defer="school_room.school_room_test_center_id" class="form-select">
                                                @foreach ($test_center_data as $item => $value)
                                                <option value="{{$value->id}}">{{$value->test_center_code.' - '.$value->test_center_name}}</option>
                                                @endforeach
                                            </select>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Building name:</label>
                                            <input type="text"  class="form-control" wire:model.defer="school_room.school_room_bldg_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Building ABR:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room.school_room_bldg_abr" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room Name:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room.school_room_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room No.:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room.school_room_number" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room Capacity:</label>
                                            <input type="number" min="1" max="500" class="form-control" wire:model.defer="school_room.school_room_max_capacity" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomDescription">Room description:</label>
                                            <textarea class="form-control" wire:model.defer="school_room.school_room_description" rows="4"></textarea>
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
                <div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                            @if(isset($school_room['school_room_id']))
                                <form wire:submit.prevent="save_edit_room({{$school_room['school_room_id']}})">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Test Center:</label>
                                            <select wire:model.defer="school_room.school_room_test_center_id" class="form-select">
                                                @foreach ($test_center_data as $item => $value)
                                                <option value="{{$value->id}}">{{$value->test_center_code.' - '.$value->test_center_name}}</option>
                                                @endforeach
                                            </select>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Building name:</label>
                                            <input type="text"  class="form-control" wire:model.defer="school_room.school_room_bldg_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Building ABR:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room.school_room_bldg_abr" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room Name:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room.school_room_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room No.:</label>
                                            <input type="text" class="form-control" wire:model.defer="school_room.school_room_number" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomCapacity">Room Capacity:</label>
                                            <input type="number" min="1" max="500" class="form-control" wire:model.defer="school_room.school_room_max_capacity" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="addRoomDescription">Room description:</label>
                                            <textarea class="form-control" wire:model.defer="school_room.school_room_description" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save Room</button>
                                    </div>
                                </form>
                            @endif
                        </div> 
                    </div>
                </div>
                <div class="modal fade" id="DeleteRoomModal" tabindex="-1" role="dialog" aria-labelledby="DeleteRoomModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="DeleteRoomModalLabel">Delete Room</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                            @if(isset($school_room['school_room_id']))
                                <form wire:submit.prevent="save_delete_room({{$school_room['school_room_id']}})">
                                    <div class="modal-body">
                                        Are you sure you want to delete this room?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete Room</button>
                                    </div>
                                </form>
                            @endif
                        </div> 
                    </div>
                </div>
                <div class="modal fade" id="ActivateRoomModal" tabindex="-1" role="dialog" aria-labelledby="ActivateRoomModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ActivateRoomModalLabel">Activate Room</h5>
                                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" ></button>
                            </div>
                            @if(isset($school_room['school_room_id']))
                                <form wire:submit.prevent="save_activate_room({{$school_room['school_room_id']}})">
                                    <div class="modal-body">
                                        Are you sure you want to activate this room?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-warning">Activate Room</button>
                                    </div>
                                </form>
                            @endif
                        </div> 
                    </div>
                </div>
                
             

            
        </div>
        </main><!-- End #main -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</div>
