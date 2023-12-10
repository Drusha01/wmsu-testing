<div>
    <x-loading-indicator/>
        <!-- Main Content -->
        <main id="main" class="main">
        <div class="pagetitle">
            <h1>Exam administrator</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam Administrator</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link   @if($active == 'exam_admin') show active @endif "wire:key="exam_admin"  wire:click="active_page('exam_admin')">Assigned Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'attendance_list') show active @endif "wire:key="attendance_list"  wire:click="active_page('attendance_list')">Attendance Rooms</a>
            </li>
          
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Proctor Table -->
            <div class="tab-pane @if($active == 'exam_admin') show active @endif " id="exam-administrator">
                <div class="d-flex mt-2">
                    <label class="filter-label align-self-center " for="exam-filter">Filter by Test Date:</label>
                    <select class="filter-select " wire:model.defer="test_date" wire:change="update_data()">
                        @foreach ($assigned_test_date as $item => $value)
                            <option wire:key="assigned-{{$value->test_schedule_id}}"value="{{$value->test_schedule_id}}" >{{$value->test_date}}</option>
                        @endforeach
                        
                        <!-- Add more options as needed -->
                    </select>
                
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
                                    <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Assigned Rooms</h5>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    @foreach($assigned_proctor_filter as $item => $value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="assigned-filtering-{{$loop->iteration}}"
                                            wire:model.defer="assigned_proctor_filter.{{$item}}">
                                        <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                            {{$item}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                    <button wire:click="assigned_proctor_filterView()" data-bs-dismiss="modal" 
                                        class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-10">
                        <button class="btn btn-success mx-1" type="button" wire:click="download_examinees_list()">Download All Examinees</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="application-table" id="proctor-table">
                        <thead>
                            <tr>
                            @foreach ($assigned_proctor_filter as $item => $value)
                               @if($value)
                                    <th >{{$item}}</th>
                                @endif
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assigned_room_data as $item => $value)
                                <tr wire:key="item-{{ $value->school_room_id }}">
                                    @if($assigned_proctor_filter['#'])
                                        <td>{{ $loop->index+1 }}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Proctor'])
                                        <td>@if(isset($value->user_id) ){{$value->user_lastname.', '.$value->user_firstname." ".$value->user_middlename}}@endif</td>
                                    @endif
                                    @if($assigned_proctor_filter['Test Date'])
                                        <td>{{ $value->test_date }}</td>
                                    @endif
                                    
                                    @if($assigned_proctor_filter['Test Center Name'])
                                        <td>{{ $value->test_center_name }}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Test Center Code'])
                                        <td>{{ $value->test_center_code}}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Building name'])
                                        <td>{{ $value->school_room_bldg_name}}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Room name'])
                                        <td>{{ $value->school_room_name}}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Room no.'])
                                        <td>{{ $value->school_room_number}}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Room Description'])
                                        <td>{{ $value->school_room_description}}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Capacity'])
                                        <td>{{ $value->school_room_max_capacity}}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Capacity'])
                                        <td>{{ $value->total_examinees_count}}</td>
                                    @endif
                                    @if($assigned_proctor_filter['Status'])
                                        <td>@if($value->school_room_isactive ) Active @else Inactive @endif</td>
                                    @endif
                                    @if($assigned_proctor_filter['Actions'] )
                                        <td class="text-center">
                                            @if($access_role['R']==0)
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewRoomModal" wire:click="view_room_details({{$value->school_room_id }})">View</button>
                                            @endif
                                            @if($access_role['R']==1)
                                            <button class="btn btn-primary" wire:click="view_examinees_list({{$value->test_schedule_id.','.$value->school_room_id }})">Student List</button>
                                            @endif
                                            @if($access_role['R']==0)
                                                <button class="btn btn-warning" wire:click="attendance_list({{$value->school_room_id }})">Attendance</button>
                                            @endif
                                            @if($access_role['D']==0)
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
                            <!-- Add more proctor entries as needed -->
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Attendance List -->
            <div class="tab-pane @if($active == 'attendance_list') show active @endif " id="attendance-list">
                <div class="d-flex mt-2">
                    <label class="filter-label align-self-center " for="exam-filter">Filter by Test Date:</label>
                    <select class="filter-select " wire:model.defer="a_test_schedule_id" wire:change="view_schedule_change()">
                        @foreach ($a_test_schedule as $item => $value)
                            <option wire:key="assigned-{{$value->test_schedule_id}}"value="{{$value->test_schedule_id}}" >{{$value->test_date}}</option>
                        @endforeach
                        
                        <!-- Add more options as needed -->
                    </select>
                    <label class="filter-label align-self-center " for="exam-filter">Filter by Room:</label>
                    <select class="filter-select " wire:model.defer="a_school_room_id" wire:change="update_attendance_data()">
                        @foreach ($a_room_details as $item => $value)
                            <option wire:key="assigned-{{$value->school_room_id}}"value="{{$value->school_room_id}}" >{{$value->school_room_name}}</option>
                        @endforeach
                        
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="container text-center">
                    @if($room_schedule['ampm'] == 'AM')
                    <button type="button" class="btn btn-primary"  wire:click="view_schedule_change('AM')">AM</button>
                        <button type="button" class="btn btn-secondary"  wire:click="view_schedule_change('PM')">PM</button>
                    @else
                        <button type="button" class="btn btn-secondary"  wire:click="view_schedule_change('AM')">AM</button>
                        <button type="button" class="btn btn-primary"  wire:click="view_schedule_change('PM')">PM</button>
                    @endif
                </div>
               
                <!-- Attendance Table -->
                <div class="container mt-3">
                    <table class="table table-bordered" id="attendanceListTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Applicant Photo</th>
                                <th>Applicant Name</th>
                                <th>Attendance Status</th>
                                <th>Attendance Check</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Attendance data will be displayed here -->
                            <?php $count = 0 ?>
                            @forelse($a_examinees as $key =>$value)
                                @if($room_schedule['ampm'] == $value->t_a_ampm)
                                    <?php $count++?>
                                    <tr wire:key="examinees-{{$key}}" class="align-middle">
                                        <td>{{ $count }}</td>
                                        <td><img src="{{asset('storage/application-requirements/t_a_formal_photo/'.$value->t_a_formal_photo)}}" alt="Student Picture" width="70" height="70" style="object-fit: cover;"></td>
                                        <td>{{$value->user_lastname.', '.$value->user_firstname." ".$value->user_middlename}}</td>
                                        <td>@if($value->ispresent) Present @else  @endif</td>
                                        <td>
                                            <!-- Checkbox for attendance done -->
                                            <div class="form-check">
                                                <input type="checkbox" @if($value->ispresent) checked @else  @endif class="form-check-input" wire:click="check_attendance({{$value->t_a_id}} @if($value->ispresent) ,{{0}} @else, {{1}}@endif)" id="attendanceDone1">
                                                <label class="form-check-label" for="attendanceDone1">Present</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <td class="text-center font-weight-bold" colspan="42">
                                    NO RECORDS 
                                </td>
                            @endforelse
                            @if($count == 0 )
                                <td class="text-center font-weight-bold" colspan="42">
                                    NO RECORDS 
                                </td>
                            @endif

                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>



            <!-- Instructions Modal -->
            <div class="modal fade" id="proctorInstructionsModal" tabindex="-1" role="dialog" aria-labelledby="proctorInstructionsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="proctorInstructionsModalLabel">Proctor Instructions</h5>
                            <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <!-- Add your proctor instructions here -->
                            <p>Welcome, Proctor (NAME). Here are your instructions:</p>
                                <!-- Download Button for Applicant List -->
                                <a href="#" class="btn btn-primary mt-2 align-center mb-2">Download Applicant List</a>
                            <ol>
                                <li>Scan the QR code to check the applicants' information.</li>
                                <li>Ensure that all registered applicants are present.</li>
                                <li>Report any issues or discrepancies to the exam administrators.</li>
                            </ol>

                            <!-- Applicant List and Download Button -->
                            <h1></h1>
                            <p>Applicant List:</p>
                            <table class="application-table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Applicant Name</th>
                                        <th>CET</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Code 1</td>
                                        <td>hanz dumapit</td>
                                        <td>CET</td>
                                    </tr>
                                    <tr>
                                        <td>Code 2</td>
                                        <td>dap dap</td>
                                        <td>CET</td>
                                    </tr>
                                    <!-- Add more rows for additional applicants -->
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="viewExamineesWithProctorModal" tabindex="-1" role="dialog" aria-labelledby="viewExamineesWithProctorModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewExamineesWithProctorModalLabel">Examinees details</h5>
                            <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                           
                            @if($room_details)
                                <p class="modal-title" >Proctor:  {{$room_details[0]->user_lastname.', '.$room_details[0]->user_firstname.' '.$room_details[0]->user_middlename}}</p>
                  
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="col">Test Center</th>
                                            <td>{{$room_details[0]->school_room_test_center}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Room venue</th>
                                            <td>{{$room_details[0]->school_room_venue}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Room code</th>
                                            <td>{{$room_details[0]->school_room_id.' - '.$room_details[0]->school_room_name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Room name</th>
                                            <td>{{$room_details[0]->school_room_name}}</td>
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>                               
                            @endif

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($examinees)
                                    @foreach ($examinees as $key => $value)
                                    <tr>
                                        <td>{{$value->user_name}}</td>
                                        <td>{{$value->user_lastname.', '.$value->user_firstname.' '.$value->user_middlename}}</td>
                                        <td>{{$value->user_address}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table> 
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student List Modal -->
            <div class="modal fade" id="studentListModal" tabindex="-1" aria-labelledby="studentListModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @if(isset($room_schedule['school_room_id']) && isset($room_schedule['ampm']))
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="addRoomCapacity">Test Center code - name: ( {{$room_schedule['test_center_code'].' - '.$room_schedule['test_center_name']}} )</label>
                            <br>
                            <label for="addRoomCapacity">Test Date: ( {{date_format(date_create(  $room_schedule['test_date']), "F d ")}} )</label>
                            <br>
                            <label for="addRoomCapacity">Room No.: ( {{$room_schedule['school_room_number']}} )</label>
                            <br>
                            <br>
                            <div class="container text-center">
                                @if($room_schedule['ampm'] == 'AM')
                                <button type="button" class="btn btn-primary"  wire:click="view_schedule_change({{$room_schedule['test_schedule_id'].','.$room_schedule['school_room_id']}},'AM')">AM</button>
                                    <button type="button" class="btn btn-secondary"  wire:click="view_schedule_change({{$room_schedule['test_schedule_id'].','.$room_schedule['school_room_id']}},'PM')">PM</button>
                                @else
                                    <button type="button" class="btn btn-secondary"  wire:click="view_schedule_change({{$room_schedule['test_schedule_id'].','.$room_schedule['school_room_id']}},'AM')">AM</button>
                                    <button type="button" class="btn btn-primary"  wire:click="view_schedule_change({{$room_schedule['test_schedule_id'].','.$room_schedule['school_room_id']}},'PM')">PM</button>
                                @endif
                            </div>
                            
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Application Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0 ?>
                                @forelse($examinees_data as $key => $value)
                                    @if($room_schedule['ampm'] == $value->t_a_ampm)
                                        <?php $count ++ ?>
                                        <tr class="align-middle">
                                            <td>{{ $count }}</td>
                                            <td><img src="{{asset('storage/application-requirements/t_a_formal_photo/'.$value->t_a_formal_photo)}}" alt="Student Picture" width="70" height="70" style="object-fit: cover;"></td>
                                            <td>{{$value->user_lastname.', '.$value->user_firstname." ".$value->user_middlename}}</td>
                                            <td>{{$value->applied_date.'-'.$value->t_a_id }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <td class="text-center font-weight-bold" colspan="42">
                                        NO RECORDS 
                                    </td>
                                @endforelse
                                @if($count == 0 )
                                    <td class="text-center font-weight-bold" colspan="42">
                                        NO RECORDS 
                                    </td>
                                @endif
                                <!-- Add more rows for other students -->
                            </tbody>
                        </table>
                    </div>
                    @endif
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="proctor-list">
                <div class="table-responsive">
                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#addProctorModal">Add Proctor</button>
                    <table class="application-table" id="proctorListTable">
                        <thead>
                            <tr>
                                <th>Proctor Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Proctor names will be displayed here -->
                            <tr>
                                <td>John Smith</td>
                            </tr>
                            <!-- Add more proctor names as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Add Proctor Modal -->
            <div class="modal fade" id="addProctorModal" tabindex="-1" role="dialog" aria-labelledby="addProctorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProctorModalLabel">Add Proctor</h5>
                            <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <!-- Add form fields for adding a new proctor here -->
                            <form>
                                <div class="form-group">
                                    <label for="proctorName">Proctor Name</label>
                                    <input type="text" class="form-control" id="proctorName" placeholder="Enter Proctor Name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="addProctorButton">Add Proctor</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
        <!-- Back to Top Button -->
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
