<div>
    <x-loading-indicator/>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Result Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Examination</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link @if($active == 'results') show active @endif " wire:key="results" wire:click="active_page('results')" >Result Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($active == 'examinees') show active @endif " wire:key="examinees" wire:click="active_page('examinees')" >Examinees Report</a>
            </li>
        </ul>
        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Result Management Tab -->
            <div class="tab-pane fade show @if($active == 'results') show active @endif " id="result-management-tab">
                <div class="container-fluid">
                    <!-- Button to upload results -->
                    <button type="button" class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#uploadResultModal" >
                        Upload Result
                    </button>
                    <!-- Modal for Upload Result -->
                    <div class="modal fade" id="uploadResultModal" tabindex="-1" role="dialog" aria-labelledby="uploadResultModalLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadResultModalLabel" >Upload Result</h5>
                                    <div type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </div>
                                </div>
                            
                                <!-- Upload Result Form -->
                                <form wire:submit.prevent="upload_file()" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="resultFile">Upload Result File:</label>
                                            <input type="file" class="form-control-file"  wire:model="examinees_results" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" >Upload</button>
                                    </div>
                                </form>
                                <!-- End Upload Result Form -->
                            </div>
                        </div>
                        <script>
                        //  $('#importCSV').on("change", function(){ 
                        //     alert('nice');
                        //     $.ajax({
                        //         url: 'php/upload.php',
                        //         data:  $("#fileInput")[0].files[0],
                        //         cache: false,
                        //         contentType: 'multipart/form-data',
                        //         processData: false,
                        //         type: 'POST',
                        //         success: function(data){
                        //             alert(data);
                        //         }
                        //     });
                           
                              
                        //     });


                            // $("form#data").submit(function() {
                            //     
                            //     return false;
                            // });
                        </script>
                    </div>
                    <!-- Result Table -->
                    <div class="table-responsive">
                        <table class="application-table">
                            <thead>
                                <tr>
                                    <th>Exam Type</th>
                                    <th>Exam Year</th>
                                    <th>Uploaded File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row -->
                                <tr>
                                    <td>CET</td>
                                    <td>2023-2024</td>
                                    <td>
                                        <a href="link_to_uploaded_file.pdf" target="_blank">View File</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                    <!-- End Result Table -->
                </div>
            </div>
            <!-- End Result Management Tab -->

            <!-- Examinees Management Tab -->
            <div class="tab-pane fade @if($active == 'examinees') show active @endif " id="examinees-management-tab">
                <div class="container-fluid">
                    <!-- Button to download examinee list -->
                    <a href="#" class="btn btn-success mt-4" wire:click="download_option()">Download Examinee List</a>
                    <div class="table-responsive">
                        <table class="application-table">
                            <thead>
                                <tr>
                                    <th>Exam Type</th>
                                    <th>Exam Year</th>
                                    <th>Examinee File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row -->
                                <tr>
                                    <td>CET</td>
                                    <td>2023-2024</td>
                                    <td>
                                        <a href="link_to_uploaded_file.pdf" target="_blank">List of Examinee</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Examinees Management Tab -->
        </div>
        <div class="modal fade" id="examinees_filter" tabindex="-1" role="dialog" aria-labelledby="examinees_filterLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="examinees_filterLabel">Download Filter</h5>
                    </div>
                    <hr>
                    <div class="modal-body">
                        <select name="" id="" class="form-select" wire:model="exam_type_name" wire:change="update_filter()">
                            <option value="0">Select Exam Type</option>
                            @foreach($exam_types as $item => $value)
                            <option value="{{$value->test_type_name}}">{{$value->test_type_details}}</option>
                            @endforeach
                        </select>
                        @if($exam_type_name == '0')
                        @elseif($exam_type_name == 'CET')
                            @foreach($cet_filter as $item => $value)
                                <div class="form-check">
                                    @if($item  == '#')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'First name')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'Middle name')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'Last name')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'id')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'Reading Comprehension')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'English Proficiency')
                                        <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                            wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'Science Processing Skills')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'Quantitative Skills')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'Abstract Thinking')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @elseif($item  == 'CET OAPR')
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}" disabled>
                                    @else
                                    <input class="form-check-input" type="checkbox" id="filtering-{{$loop->iteration}}"
                                        wire:model.defer="cet_filter.{{$item}}">
                                    @endif
                                    <label class="form-check-label" for="filtering-{{$loop->iteration}}">
                                        {{$item}}
                                    </label>
                                </div>
                            @endforeach
                        @endif

                        
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal" id='btn_close1'>Close</button>
                        <button wire:click="download_file()" data-bs-dismiss="modal" 
                            class="btn btn-primary">
                            Download Examinees
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back to Top Button -->
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    </div>
</main>
