<div>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Exam management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam management</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#proctors-management-tab">Unassigned Proctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#assigned-proctors-tab">Assigned Proctors</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">

        <!-- Exam Management Tab -->
        <div class="tab-pane show active" id="proctors-management-tab">
            <!-- Exam Management Table -->
            <div class="d-flex mt-2">
                <label class="filter-label align-self-center " for="exam-filter">Filter by Room:</label>
                
                <select class="filter-select " wire:model.defer="unassigned_proctor_school_room_id" wire:change="unassigned_proctor_school_room_filter()">
                    <option value="0"  >All</option>
                    @foreach ($school_rooms as $item => $value)
                        <option wire:key="assigned-{{$value->school_room_id}}"value="{{$value->school_room_id}}" >{{ $value->school_room_id.' - '.$value->school_room_name }}</option>
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
                                <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Unassigned Proctor</h5>
                            </div>
                            <hr>
                            <div class="modal-body">
                                @foreach($unassigned_proctor_filter as $item => $value)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="unassigned-filtering-{{$loop->iteration}}"
                                        wire:model.defer="unassigned_proctor_filter.{{$item}}">
                                    <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                        {{$item}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                <button wire:click="unassigned_proctor_filterView()" data-dismiss="modal" 
                                    class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-10">
                    <button class="btn btn-success mx-1"  type="button" data-toggle="modal" data-target="#assignProctorModal" wire:click="assigning_room_check()">Assign Proctor </button>
                </div>
            </div>
            <table class="application-table" id="exam-management-table">
                <thead>
                    <tr>
                    @foreach ($unassigned_proctor_filter as $item => $value)
                        @if($loop->first && $value)
                            <th><input wire:model="unassigned_proctor_selected_all" wire:change="unassigned_proctor_selected_all()" type="checkbox" ></th> 
                        @elseif($loop->last && $value )
                        <th class="text-center">Action</th>
                        @elseif($value)
                            <th >{{$item}}</th>
                        @endif
                    @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse ($unassigned_proctor as $item => $value)
                        <tr >
                            
                            @if($unassigned_proctor_filter['Select all'])
                                <td><input type="checkbox" 
                                
                                    wire:model="unassigned_proctor_selected.{{$loop->index}}.{{$value->school_room_id}}"
                                    >
                                </td>
                            @endif
                            @if($unassigned_proctor_filter['#'])
                                <td>{{ $loop->index+1 }}</td>
                            @endif
                            @if($unassigned_proctor_filter['No. of Examinees'])
                                <td>{{ $value->school_room_capacity -  $value->school_room_slot  }}</td>
                            @endif
                            
                            @if($unassigned_proctor_filter['Capacity'])
                                <td>{{ $value->school_room_capacity }}</td>
                            @endif
                            @if($unassigned_proctor_filter['Slots'])
                                <td>{{ $value->school_room_slot }}</td>
                            @endif
                            @if($unassigned_proctor_filter['Venue'])
                                <td>{{ $value->school_room_venue }}</td>
                            @endif
                            @if($unassigned_proctor_filter['Test center'])
                                <td>{{ $value->school_room_test_center }}</td>
                            @endif
                            @if($unassigned_proctor_filter['College'])
                                <td>{{ $value->school_room_college_abr }}</td>
                            @endif
                            @if($unassigned_proctor_filter['Room code'])
                            <td>{{ $value->school_room_id.' - '.$value->school_room_name }}</td>
                            @endif
                            @if($unassigned_proctor_filter['Room name'])
                                <td>{{ $value->school_room_name }}</td>
                            @endif
                            @if($unassigned_proctor_filter['Start - End'])
                            <td>{{ $value->school_room_test_time_start.' - '.$value->school_room_test_time_end }}</td>
                            @endif
                           
                            
                            @if($unassigned_proctor_filter['Actions'] )
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
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
            <div class="modal fade" id="assignProctorModal" tabindex="-1" role="dialog" aria-labelledby="assignProctorModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignProctorModalLabel">Assign room proctor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form >
                            <div class="modal-body">
                                <!-- Display the list of assigned applicant names here -->
                                <ul>
                                    <li>John Doe</li>
                                    <li>Jane Smith</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Assign Proctor</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assigned proctors Tab -->
        <div class="tab-pane show" id="assigned-proctors-tab">
            <!-- List of Assigned Proctors Table -->
            <table class="application-table" id="assigned-proctors-tab">
                <thead>
                    <tr>
                        <th>Proctor Name</th>
                        <th>Venue</th>
                        <th>Room</th>
                        <th>School Year</th>
                        <th>Capacity</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Smith</td>
                        <td>WMSU MAIN</td>
                        <td>CLA 102</td>
                        <td>2023-2024</td>
                        <td>FULL</td>
                        <td>First Floor CLA Building</td>
                        <td>
                        <button type="button" class="accept-button btn btn-primary btn-sm" data-toggle="modal" data-target="#">Edit</button>
                        <button type="button" class="decline-button btn btn-danger btn-sm" data-toggle="modal" data-target="#">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows for other assigned proctors as needed -->
                </tbody>
            </table>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
