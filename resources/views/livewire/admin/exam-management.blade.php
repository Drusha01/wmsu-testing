<div>
    <x-loading-indicator/>
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
                <a class="nav-link @if($active == 'unassigned_proctors') show active @endif " data-toggle="tab"  wire:click="active_page('unassigned_proctors')">Unassigned Proctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'assigned_proctors') show active @endif " data-toggle="tab"  wire:click="active_page('assigned_proctors')">Assigned Proctors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'proctor_list') show active @endif " data-toggle="tab"  wire:click="active_page('proctor_list')">Proctors list</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">

        <!-- Exam Management Tab -->
        <div class="tab-pane show @if($active == 'unassigned_proctors') show active @else fade @endif" id="proctors-management-tab">
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
                    <button class="btn btn-success mx-1"  type="button" wire:click="assigning_room_check()">Assign Proctor </button>
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
                            @if($unassigned_proctor_filter['# of Examinees'])
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
                            @if($unassigned_proctor_filter['Proctor'])
                                <td>Unassigned</td>
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

            <div class="modal fade" id="assignProctorModal" tabindex="-1" role="dialog" aria-labelledby="assignProctorModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignProctorModalLabel">Assign room proctor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form >
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Room code</th>
                                            <th scope="col">Room name</th>
                                            <th scope="col">Venue</th>
                                            <th scope="col">Test Center</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($unassigned_valid)
                                        @foreach ($unassigned_proctor as $key => $value)
                                            @if($unassigned_proctor_selected[$key][$value->school_room_id])
                                            <tr>
                                                <td>{{$value->school_room_id.' - '.$value->school_room_name}}</td>
                                                <td>{{$value->school_room_name}}</td>
                                                <td>{{$value->school_room_venue}}</td>
                                                <td>{{$value->school_room_test_center}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @else
                                    @endif
                                    
                                        
                                    </tbody>
                                </table> 
                                <!-- Display the list of assigned applicant names here -->
                                <select class="form-control" wire:model="unassigned_proctor_user_id">
                                @forelse ($proctors_list as $item => $value)
                                    <option value="{{$value->user_id}}">{{$value->user_lastname.', '.$value->user_firstname.' '.$value->user_middlename.' : '.$value->user_address}}</option>
                                @empty
                                    <option value="">NO RECORDS</option>
                                @endforelse
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" wire:click="assign_room_proctor()">Assign Proctor</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assigned proctors Tab -->
        <div class="tab-pane show @if($active == 'assigned_proctors') show active @else fade @endif" >
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
                        <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#assigned-room-filter">
                            <i class="bi bi-funnel-fill me-1"></i>
                            <div><span class='btn-text'>Columns</span></div>
                        </button>
                        @endif
                        <input class="form-control" type="text" id="search" placeholder="Search "  wire:change="search_applicant()"/> 
                        <!-- wire:model.debounce.500ms="search" -->
                    </div>
                </div> 
            

                <div class="modal fade" id="assigned-room-filter" tabindex="-1" role="dialog" aria-labelledby="assigned-room-filterLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Unassigned Proctor</h5>
                            </div>
                            <hr>
                            <div class="modal-body">
                                @foreach($assigned_proctor_filter as $item => $value)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="assigned_proctor_filter-{{$loop->iteration}}"
                                        wire:model.defer="assigned_proctor_filter.{{$item}}">
                                    <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                        {{$item}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                <button wire:click="assigned_proctor_filterView()" data-dismiss="modal" 
                                    class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-10">
                <button class="btn btn-warning mx-1"  type="button" data-toggle="modal" data-target="#assignProctorModal" wire:click="reassigning_room_check()">Reassign Proctor </button>
                    <button class="btn btn-danger mx-1"  type="button" data-toggle="modal" data-target="#assignProctorModal" wire:click="remove_room_check()">Remove Proctor </button>
                </div>
            </div>
            <!-- List of Assigned Proctors Table -->
            <table class="application-table" id="assigned-proctors-tab">
                <thead>
                    <tr>
                        @foreach ($assigned_proctor_filter as $item => $value)
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
                @forelse ($assigned_proctor as $item => $value)
                    <tr >
                        
                        @if($assigned_proctor_filter['Select all'])
                            <td><input type="checkbox" 
                            
                                wire:model="unassigned_proctor_selected.{{$loop->index}}.{{$value->school_room_id}}"
                                >
                            </td>
                        @endif
                        @if($assigned_proctor_filter['#'])
                            <td>{{ $loop->index+1 }}</td>
                        @endif
                        @if($assigned_proctor_filter['# of Examinees'])
                            <td>{{ $value->school_room_capacity -  $value->school_room_slot  }}</td>
                        @endif
                        @if($assigned_proctor_filter['Capacity'])
                            <td>{{ $value->school_room_capacity }}</td>
                        @endif
                        @if($assigned_proctor_filter['Slots'])
                            <td>{{ $value->school_room_slot }}</td>
                        @endif
                        @if($assigned_proctor_filter['Venue'])
                            <td>{{ $value->school_room_venue }}</td>
                        @endif
                        @if($assigned_proctor_filter['Test center'])
                            <td>{{ $value->school_room_test_center }}</td>
                        @endif
                        @if($assigned_proctor_filter['College'])
                            <td>{{ $value->school_room_college_abr }}</td>
                        @endif
                        @if($assigned_proctor_filter['Room code'])
                        <td>{{ $value->school_room_id.' - '.$value->school_room_name }}</td>
                        @endif
                        @if($assigned_proctor_filter['Room name'])
                            <td>{{ $value->school_room_name }}</td>
                        @endif
                        @if($assigned_proctor_filter['Start - End'])
                        <td>{{ $value->school_room_test_time_start.' - '.$value->school_room_test_time_end }}</td>
                        @endif
                        @if($assigned_proctor_filter['Proctor'])
                            <td>{{$value->user_lastname.', '.$value->user_firstname.' '.$value->user_middlename}}</td>
                        @endif
                        
                        @if($assigned_proctor_filter['Actions'] )
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
                    <!-- Add more rows for other assigned proctors as needed -->
                </tbody>
            </table>
        </div>

        <div class="tab-pane show @if($active == 'proctor_list') show active @else fade @endif" >
            <!-- List of Assigned Proctors Table -->
            <div class="d-flex mt-2">
                <div class="col-md-3 sort-container">
                    <div class="d-flex">
                        @if(1)
                        <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#proctor-list-filter">
                            <i class="bi bi-funnel-fill me-1"></i>
                            <div><span class='btn-text'>Columns</span></div>
                        </button>
                        @endif
                        <input class="form-control" type="text" id="search" placeholder="Search "  wire:change="search_applicant()"/> 
                        <!-- wire:model.debounce.500ms="search" -->
                    </div>
                </div> 
            

                <div class="modal fade" id="proctor-list-filter" tabindex="-1" role="dialog" aria-labelledby="proctor-list-filterLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sortingModalLabel">Sort&nbsp;Columns for Unassigned Proctor</h5>
                            </div>
                            <hr>
                            <div class="modal-body">
                                @foreach($proctor_list_filter as $item => $value)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="proctor_list_filter-{{$loop->iteration}}"
                                        wire:model.defer="proctor_list_filter.{{$item}}">
                                    <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                        {{$item}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="button"  class="btn btn-secondary btn-block"data-dismiss="modal"  id='btn_close1'>Close</button>
                                <button wire:click="assigned_proctor_filterView()" data-dismiss="modal" 
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
            
            <table class="application-table" id="assigned-proctors-tab">
                <thead>
                    <tr>
                        @foreach ($proctor_list_filter as $item => $value)
                            @if($value)
                                <th >{{$item}}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                @forelse ($proctors_list as $item => $value)
                        <tr >
                            
                            @if($proctor_list_filter['Proctor username'])
                            <td>{{$value->user_name}}</td>
                                
                            @endif
                            @if($proctor_list_filter['Proctor fullname'])
                            <td>
                                {{$value->user_lastname.', '.$value->user_firstname.' '.$value->user_middlename}}
                            </td>
                            @endif
                            @if($proctor_list_filter['Address'])
                            <td>
                                {{$value->user_address}}
                            </td>
                            @endif
                            @if($proctor_list_filter['Action'] )
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
                </tbody>
            </table>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
