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
                <a class="nav-link show active " data-toggle="tab" href="#review-applicant-tab">Pending Applicant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#accepted-applicant-tab">Accepted Applicant</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- pending applicant tab -->
            <div class="tab-pane show active" id="review-applicant-tab">
                <div class="examfilter-container">
                    <label class="filter-label" for="exam-filter">Filter by Type of Exam:</label>
                    <select class="filter-select" id="exam-filter" wire:model="pending_test_type_id" wire:change="pending_application_exam_type_filter()">
                        <option value="0"  >All</option>
                        @forelse ($exam_types as $item => $value)
                            <option value="{{$value->test_type_id}}" >{{$value->test_type_name}}</option>
                                                      
                        @empty

                        @endforelse
                        
                        <!-- Add more options as needed -->
                    </select>
                    <div class="col-md-3 sort-container">
                        <div class="d-flex">
                            @if(1)
                            <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-toggle="modal" data-target="#application-management-filter">
                                <i class="bi bi-funnel-fill me-1"></i>
                                <div><span class='btn-text'>Columns</span></div>
                            </button>
                            @endif
                            <input class="form-control" type="text" id="search" placeholder="Search..." /> 
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
                    <button class="accept-btn" wire:click="accepted()" >Accept </button>
                    <button class="decline-btn" wire:click="declined()">Decline </button>
                </div>
                <!-- Application Review Table -->
                <table class="application-table">
                    <thead>
                        <tr>
                        @foreach ($pending_applicant_filter as $item => $value)
                            @if ($loop->first && $value)
                                <th><input wire:click="pending_applicant_select_all()" type="checkbox"></th> 
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
                        <tr>
                            
                            @if($pending_applicant_filter['Select all'])
                                <td><input type="checkbox" 
                                    @if($selected_all) 
                                        checked 
                                    @endif>
                                </td>
                            @endif
                            @if($pending_applicant_filter['#'])
                                <td>{{ $loop->index+1 }}</td>
                            @endif
                            @if($pending_applicant_filter['Applicant name'])
                                <td>{{ $value->user_fullname }}</td>
                            @endif
                            @if($pending_applicant_filter['Exam type'])
                                <td>{{ $value->test_type_name }}</td>
                            @endif
                            @if($pending_applicant_filter['Date applied'])
                                <td>{{ $value->date_applied }}</td>
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
            </div>

            <!-- Accepted Applicant Tab -->
            <div class="tab-pane show" id="accepted-applicant-tab">
                <div class="examfilter-container">
                    <label class="filter-label1" for="accepted-exam-filter">Filter accepted applicant by Exam:</label>

                    <select class="filter-select1" id="accepted-exam-filter">
                        <option value="">All</option>
                        <option value="CET">CET</option>
                        <option value="NAT">NAT</option>
                        <option value="EAT">EAT</option>
                        <!-- Add more options as needed -->
                    </select>
                    <button class="decline-btn">Decline </button>
                </div>
                                
                <table class="application-table">
                    <thead>
                        <tr>
                            <th>
                                &#10003;   <!-- check icon -->
                            </th>
                            <th>#</th>
                            <th>Applicant Name</th>
                            <th>Exam Type</th>

                            <th>School Year</th>
                            <th>Date Applied</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td> <!-- Checkmark input -->
                            <td>2</td>
                            <td>Accepted Applicant 1</td>
                            <td>CET</td>

                            <td>2023-2024</td>
                            <td>2023-09-10</td>
                            <td>
                                <button class="btn btn-success">Edit</button>
                                <button class="btn btn-primary">Venue</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td> <!-- Checkmark input -->
                            <td>2</td>
                            <td>Accepted Applicant 2</td>
                            <td>NAT</td>

                            <td>2023-2024</td>
                            <td>2023-09-11</td>
                            <td>
                                <button class="btn btn-success">Edit</button>
                                <button class="btn btn-primary">Venue</button>
                            </td>
                        </tr>
                        <!-- Add more accepted applicant rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
