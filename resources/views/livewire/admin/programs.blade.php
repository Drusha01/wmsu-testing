<div>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manage Program</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Program</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link show @if($active == 'Colleges') show active @endif " wire:key="Colleges" wire:click="active_page('Colleges')">Colleges</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'Departments') show active @endif " wire:key="Departments" wire:click="active_page('Departments')">Departments</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Announcement Tab -->
            <div class="tab-pane fade fade @if($active == 'Colleges') show active @endif ">
                <br>
                <div class="d-flex mt-2">
                    <div class="col-md-3 sort-container">
                        <div class="d-flex">
                            @if(1)
                            <button class="btn btn-secondary me-2 d-flex justify-content-between sort-btn " type="button" data-bs-toggle="modal" data-bs-target="#College-filter">
                                <i class="bi bi-funnel-fill me-1"></i>
                                <div><span class='btn-text'>Columns</span></div>
                            </button>
                            @endif
                            
                            <!-- wire:model.debounce.500ms="search" -->
                        </div>
                    </div> 
                    <div class="modal fade" id="College-filter" tabindex="-1" role="dialog" aria-labelledby="College-filterLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="College-filterLabel">Sort&nbsp;Columns for FAQ</h5>
                                </div>
                                <hr>
                                <div class="modal-body">
                                    @foreach($college_filter as $item => $value)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="College-filter-{{$loop->iteration}}"
                                            wire:model.defer="college_filter.{{$item}}">
                                        <label class="form-check-label" for="College-filter-{{$loop->iteration}}">
                                            {{$item}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-secondary btn-block"data-bs-dismiss="modal" id='btn_close1'>Close</button>
                                    <button wire:click="carouselfilterView()" data-bs-dismiss="modal" 
                                        class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success   mx-1" wire:click="add_college()" >Add College</button>
                    </div>
                </div>

                <table class="application-table">
                    <thead>
                        <tr>
                            @foreach ($college_filter as $item => $value)
                                @if($value)
                                    <th >{{$item}}</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services_data  as $item => $value)
                            <tr>
                                @if($college_filter['#'])
                                    <td>{{ $loop->index+1 }}</td>
                                @endif
                                @if($college_filter['Logo'])
                                    <td>
                                        <img src="{{asset('storage/content/services/'.$value->service_logo)}}" alt="" style="height: 200px; ">
                                    </td>
                                @endif
                                @if($college_filter['Header'])
                                    <td>
                                        <div>
                                            {{$value->service_header}}
                                        </div>
                                    </td>
                                @endif
                                @if($college_filter['Content'])
                                    <td class="align-middle">
                                        <p>{{$value->service_content}}</p>
                                    </td>
                                @endif
                                @if($college_filter['Order'])
                                    <td class="align-middle"> 
                                        <div class="btn-group-vertical btn-group-sm " role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-outline-dark" wire:click="move_up_service({{$value->service_order}})"><i class="bx bx-up-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                            <button type="button" class="btn btn-outline-dark" wire:click="move_down_service({{$value->service_order}})"><i class="bx bx-down-arrow-alt" style="font-size:20px; vertical-align: middle;" ></i></button>
                                        </div>
                                    </td>
                                @endif
                                @if($college_filter['Action'])
                                    <td class="align-middle"> 
                                        @if($access_role['R']==0)
                                        <button class="btn btn-primary" wire:click="view_service({{$value->service_id}})" >View</button>
                                        @endif
                                        @if($access_role['U']==1)
                                        <button class="btn btn-success" wire:click="edit_service({{$value->service_id}})" >Edit</button>
                                        @endif
                                        @if($access_role['D']==1)
                                        <button class="btn btn-danger" wire:click="delete_service({{$value->service_id}})">Delete</button>
                                        @endif
                                    </td>
                                @endif 
                                </tr>
                            @empty
                                <td class="text-center font-weight-bold" colspan="42">
                                    NO RECORDS 
                                </td>
                            @endforelse
                    </tbody>
                </table>
                
                
            </div>
            
            <div class="tab-pane fade @if($active == 'Departments') show active @endif ">
            </div>
        </div>
        <!-- End Tab Content -->

        <!-- Add Announcement Modal -->
       

    
    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
