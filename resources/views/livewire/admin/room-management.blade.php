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
                    <a class="nav-link  @if($active == 'schedules') show active @endif " wire:key="schedules" wire:click="active_page('schedules')" >Test Scehdules</a>
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
                           
                                <!-- Add more accepted applicant rows here -->
                            </tbody>
                        </table>
                    </div>
                </div>

              
                

            
                



                <!-- Room Management Tab -->
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
                                @if($school_room_filter['Building name'])
                                    <td>{{$value->school_room_bldg_name }}</td>
                                    @endif
                                @if($school_room_filter['Building abr'])
                                    <td>{{ $value->school_room_bldg_abr }}</td>
                                @endif
                                @if($school_room_filter['Room Name'])
                                    <td class="text-center">{{ $value->school_room_name }}</td>
                                @endif
                                @if($school_room_filter['Room No.'])
                                    <td>{{$value->school_room_number }}</td>
                                @endif
                                @if($school_room_filter['Room Capacity'])
                                    <td class="text-center">{{ $value->school_room_max_capacity }}</td>
                                @endif
                                @if($school_room_filter['Room Description'])
                                    <td>{{ $value->school_room_description }}</td>
                                @endif
                                @if($school_room_filter['Status'])
                                    <td class="text-center">@if( $value->school_room_isactive) active @else deleted @endif</td>
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
                <div class="tab-pane  @if($active == 'schedules') show active @endif " id="test-schedule-tab">
                </div>


        </div>
        </main><!-- End #main -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</div>
