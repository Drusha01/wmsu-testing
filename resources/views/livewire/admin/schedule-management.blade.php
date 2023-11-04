<div>
    <main id="main" class="main">
        <div class="pagetitle">
        <h1>Schedule Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Schedule Management</li>
                </ol>
            </nav>
        </div>
        <section id="schedule-section">
            <table class="application-table mt-2">
                <thead>
                    <tr>
                        @foreach ($exam_filters as $item => $value)
                            @if($value)
                                <th >{{$item}}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse ($exam_schedules  as $item => $value)
                        <tr>
                            @if($exam_filters['#'])
                                <td>{{ $loop->index+1 }}</td>
                            @endif
                            @if($exam_filters['Exam name'])
                                <td class="align-left">    
                                    {{$value->es_exam_details}}
                                </td>
                            @endif
                            @if($exam_filters['Exam Abr'])
                                <td class="align-left">
                                    {{$value->es_exam_abr}}
                                </td>
                            @endif
                            @if($exam_filters['start-end'])
                                <td>
                                {{$value->es_date_start.' - '.$value->es_date_end}}
                                </td>
                            @endif
                            
                            @if($exam_filters['Status'])
                                <td class="align-left">
                                    @if($value->es_isactive) Active @else Inactive @endif
                                </td>
                            @endif
                        
                            @if($exam_filters['Action'])
                                <td class="align-middle"> 
                                    @if($access_role['R']==0 && 0)
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ViewCarouselModal" >View</button>
                                    @endif
                                    @if($access_role['U']==1)
                                    <button class="btn btn-success" wire:click="edit_exam_schedule({{$value->es_id}})" >Edit</button>
                                    @endif
                                    @if($access_role['D']==0)
                                    <button class="btn btn-danger" wire:click="delete_faq({{$value->es_id}})">Delete</button>
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

            <div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editScheduleModalLabel">Edit Schedule</h5>
                            <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        </div>
                        @if($exam_schedule['es_id'])
                            <form wire:submit.prevent="save_edit_exam_schedule({{$exam_schedule['es_id']}})">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="scheduleDate">Exam Details:</label>
                                        <input type="text" class="form-control" wire:model.defer="exam_schedule.es_exam_details" requird>
                                    </div>
                                    <div class="form-group">
                                        <label for="scheduleDate">Exam Abr:</label>
                                        <input type="text" class="form-control" wire:model.defer="exam_schedule.es_exam_abr" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="scheduleDate">Date Start:</label>
                                        <input type="date" class="form-control" wire:model.defer="exam_schedule.es_date_start" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="scheduleDate">Date End:</label>
                                        <input type="date" class="form-control" wire:model.defer="exam_schedule.es_date_end" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Active?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="exam_schedule.es_isactive" value="1" required>
                                            <label class="form-check-label" for="Active">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="exam_schedule.es_isactive" value="0" required>
                                            <label class="form-check-label" for="Active">Disabled</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" >Save</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>