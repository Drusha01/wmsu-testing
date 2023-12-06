<div class="mt-10"style="margin-top:100px;margin-left:50px">
    <div class="container">
        <section class="layout d-flex"   style="justify-content: center; margin: right -100px;">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo" style="height: 100px; margin-left: -100px;">
                <div style="text-align: center;">
                    <h4>Western Mindanao State University</h4>
                    <h5>Testing And Evaluation Center</h5>
                    <h6>Normal Road, Baliwasa, Zamboanga City</h6>  
                </div> 
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo" style="height: 100px; margin-right: -100px;">
        </section>
        @if(isset($view_permit))
            <div style="text-align: center;" >
                <div >
                    <legend>EXAM PERMIT</legend>
                    <h3>{{$view_permit[0]->user_lastname.', '.$view_permit[0]->user_firstname.' '.$view_permit[0]->user_middlename}}</h3>
                    <p>School from: {{$view_permit[0]->t_a_school_school_name}}</p>
                </div> 
                <table class="table mt-2">
                    <thead>
                        <tr>
                        <th >Test Date</th>
                        <th class="table-text" >Test Center</th>
                        <th class="table-text" >Room No.</th>
                        <th class="table-text">Test Time</th>
                        <th class="table-text" >Test Code</th>
                        <th class="table-text" >High School Code</th>
                        <!-- <th class="table-text" >High School Code</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{date_format(date_create($view_permit[0]->test_date), "F d, Y ")}}</th>
                            <td>{{$view_permit[0]->test_center_name}}</td>
                            <td>{{ $view_permit[0]->school_room_id.' - '.$view_permit[0]->school_room_name }}</td>
                            <td>@if($view_permit[0]->t_a_ampm == 'AM'){{ $view_permit[0]->am_start.' - '.$view_permit[0]->am_end }}@else {{$view_permit[0]->pm_start.' - '.$view_permit[0]->pm_end }} @endif</td>
                            <td>{{$view_permit[0]->test_center_code }}</td>
                            <td>{{$view_permit[0]->high_school_code.' - '.$view_permit[0]->high_school_name }}</td> 
                            
                            <!-- <td>{{$view_permit[0]->test_center_code}}</td> -->
                        </tr>
                        <tr>  
                    </tbody>
                </table>
                <div class="bottom-content mt-2 d-flex justify-content-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="image-container-left   border border-danger rounded ">
                                <img src=" {{$qrcode}}" alt="" width="250" height="250">
                                <!-- <img src="http://wmsutec/images/logo/qr.png" alt="Logo" class="form-logo"> -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="image-container-right border border-danger float-right ">
                                <img src="{{asset('storage/application-requirements/t_a_formal_photo/'.$view_permit[0]->t_a_formal_photo)}}" alt="" style="object-fit: cover;"width="250" height="250">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
