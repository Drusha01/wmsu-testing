<div class="col-lg-6">
    <div class="test-section">
        <h2>Online Application</h2>
        <p>Select the examination you would like to take from the options below:</p>

        <!-- CET Tests Dropdown with a Clear Label -->
        <div class="card mb-3">
            <div class="card-header" style="background-color: #990000; color: white; font-weight: bold;">
                College Entrance Test Form Applications
            </div>
            <div class="dropdown px-2 py-2">
                <button class="btn btn-secondary dropdown-toggle mt-2" type="button" id="cetDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose a CET Form
                </button>
                <ul class="dropdown-menu" aria-labelledby="cetDropdownButton">
                    @if($exam_schedules)
                    @foreach($exam_schedules as $key =>$value)
                        @if($value->es_exam_abr == 'CET')
                            <?php 
                            $current_date = date('Y-m-d');
                            $current_date=date('Y-m-d', strtotime($current_date));
                            $es_date_start = date('Y-m-d', strtotime($value->es_date_start));
                            $es_date_end = date('Y-m-d', strtotime($value->es_date_end));
                            ?>
                            @if(($current_date >= $es_date_start) && ($es_date_end <= $es_date_end)) 
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center " href="#"  wire:click="undergrad()">
                                    {{$value->es_exam_abr }} SHS Graduating form
                                    <button type="button" class="btn btn-primary  mx-2">Available</button>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="grad()">
                                    {{$value->es_exam_abr }} SHS Graduate form
                                    <button type="button" class="btn btn-primary  mx-2">Available</button>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="shiftee_tranferee()">
                                    {{$value->es_exam_abr }} Shiftee/Transferee
                                    <button type="button" class="btn btn-primary  mx-2">Available</button>
                                </a>
                            </li>
                            @else
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center " href="#" >
                                    CET SHS Graduating form
                                    <button type="button" class="btn btn-primary  mx-2"disabled>Unavailable</button>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                    CET SHS Graduate form
                                    <button type="button" class="btn btn-primary  mx-2"disabled>Unavailable</button>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" >
                                    CET Shiftee/Transferee
                                    <button type="button" class="btn btn-primary  mx-2" disabled>Unavailable</button>
                                </a>
                            </li>
                            @endif
                            @break
                        @endif
                    @endforeach
                    
                    @endif
                </ul>
            </div>
        </div>

        <!-- Other Tests Group -->
        <div class="card">
            <div class="card-header">
                Other Examination Form
            </div>
            <ul class="list-group list-group-flush">
                @if($exam_schedules)
                    @foreach($exam_schedules as $key =>$value)
                        @if($value->es_exam_abr == 'NAT')
                            <?php 
                            $current_date = date('Y-m-d');
                            $current_date=date('Y-m-d', strtotime($current_date));
                            $es_date_start = date('Y-m-d', strtotime($value->es_date_start));
                            $es_date_end = date('Y-m-d', strtotime($value->es_date_end));
                            ?>
                            @if(($current_date >= $es_date_start) && ($es_date_end <= $es_date_end)) 
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <a href="{{ Route('student.cet.nat') }}" class="text-decoration-none text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                                <button type="button" class="btn btn-primary ">Available</button>
                            </li>
                            @else
                            <li class="list-group-item d-flex justify-content-between align-items-center ">
                                <a class="text-decoration-none text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                                <button type="button" class="btn btn-primary " disabled>Unavailable</button>
                            </li>
                            @endif
                            @break
                        @endif
                    @endforeach
                    
                @endif
                @if($exam_schedules)
                    @foreach($exam_schedules as $key =>$value)
                        @if($value->es_exam_abr == 'EAT')
                            <?php 
                            $current_date = date('Y-m-d');
                            $current_date=date('Y-m-d', strtotime($current_date));
                            $es_date_start = date('Y-m-d', strtotime($value->es_date_start));
                            $es_date_end = date('Y-m-d', strtotime($value->es_date_end));
                            ?>
                            @if(($current_date >= $es_date_start) && ($es_date_end <= $es_date_end)) 
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ Route('student.cet.eat') }}" class="text-decoration-none text-secondary text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                                <button type="button" class="btn btn-primary rounded">Available</button>
                            </li>
                            @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a  class="text-decoration-none text-secondary text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                                <button type="button" class="btn btn-primary rounded" disabled>Unavailable</button>
                            </li>
                            @endif
                            @break
                        @endif
                    @endforeach
                    
                @endif
                @if($exam_schedules)
                    @foreach($exam_schedules as $key =>$value)
                        @if($value->es_exam_abr == 'GSAT')
                            <?php 
                            $current_date = date('Y-m-d');
                            $current_date=date('Y-m-d', strtotime($current_date));
                            $es_date_start = date('Y-m-d', strtotime($value->es_date_start));
                            $es_date_end = date('Y-m-d', strtotime($value->es_date_end));
                            ?>
                            @if(($current_date >= $es_date_start) && ($es_date_end <= $es_date_end)) 
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ Route('student.cet.gsat') }}" class="text-decoration-none text-secondary text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                                <button type="button" class="btn btn-primary rounded">Available</button>
                            </li>
                            @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ Route('student.cet.gsat') }}" class="text-decoration-none text-secondary text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                                <button type="button" class="btn btn-primary rounded" disabled>Unavailable</button>
                            </li>
                            @endif
                            @break
                        @endif
                    @endforeach
                    
                @endif
                @if($exam_schedules)
                    @foreach($exam_schedules as $key =>$value)
                        @if($value->es_exam_abr == 'LSAT')
                            <?php 
                            $current_date = date('Y-m-d');
                            $current_date=date('Y-m-d', strtotime($current_date));
                            $es_date_start = date('Y-m-d', strtotime($value->es_date_start));
                            $es_date_end = date('Y-m-d', strtotime($value->es_date_end));
                            ?>
                            @if(($current_date >= $es_date_start) && ($es_date_end <= $es_date_end)) 
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('student.cet.lsat') }}" class="text-decoration-none text-secondary text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                            <button type="button" class="btn btn-primary rounded">Available</button>
                        </li>
                            @else
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a  class="text-decoration-none text-secondary text-body font-weight-bold">{{$value->es_exam_details  }} Form</a>
                                <button type="button" class="btn btn-primary rounded" disabled>Unavailable</button>
                            </li>
                            @endif
                            @break
                        @endif
                    @endforeach
                    
                @endif
               
            </ul>
        </div>
    </div>
</div>
