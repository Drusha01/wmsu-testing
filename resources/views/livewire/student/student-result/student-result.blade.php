<div>
    <!-- Results Tab Content -->
    <div role="tabpanel" class="tab-pane" id="results">
        <section class="results-section">
            <div class="container">
                <h2 class="section-title">Exam Results</h2>
                <table class="table table-bordered">
                    <thead style="background-color: #990000; color: white; position: sticky; top: 0;">
                        <tr>
                            <th>Exam</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CET Result</td>
                            <td>
                               <!-- Button trigger CET Result Modal -->
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uniqueCetResultModal">
                                    View
                                </button>
                                <a href="path-to-cet-result-pdf.pdf" download class="btn btn-success"><i class="fa fa-download"></i> Download </a>
                            </td>
                        </tr>
                        <tr>
                            <td>NAT Result</td>
                            <td>
                                <!-- Button trigger EXAM Permit Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uniqueExamPermitModal">
                                    View
                                </button>
                                <a href="path-to-nat-result-pdf.pdf" download class="btn btn-success"><i class="fa fa-download"></i> Download </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Eat Result</td>
                            <td>
                                <!-- Button trigger another Modal (assuming it's a different modal) -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    View
                                </button>
                                <a href="path-to-eat-result-pdf.pdf" download class="btn btn-success"><i class="fa fa-download"></i> Download </a>
                            </td>
                        </tr>
                        <!-- Add more exam result rows as needed -->
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>


    <!-- EXAM permit Modal -->
    <div class="modal fade" id="uniqueExamPermitModal" tabindex="-1" role="dialog" aria-labelledby="uniqueExamModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div>
                    <section class="layout d-flex"   style="justify-content: center; margin: right -100px;">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo" style="height: 100px; margin-left: -100px;">
                        <div style="text-align: center;">
                            <h4>Western Mindanao State University</h4>
                            <h5>Testing And Evaluation Center</h5>
                            <h6>Normal Road, Baliwasa, Zamboanga City</h6>  
                        </div> 
                    <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo" style="height: 100px; margin-right: -100px;">
                    </section>
                    <div style="text-align: center;" >
                        <div >
                            <legend>EXAM PERMIT</legend>
                            <h3>SALI, ALKHAYZEL ABDILLA</h3>
                            <p>School from: Southern City Colleges</p>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>  
                            </tbody>
                        </table>
                        <div class="bottom-content mt-2">
                            <div class="image-container-left  border border-danger rounded float-left">
                                <img src="http://wmsutec/images/logo/qr.png" alt="Logo" class="form-logo">
                            </div>
                            <div class="image-container-right border border-danger float-right">
                                <img src="http://wmsutec/images/logo/qr.png" alt="Logo" class="form-logo ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="path-to-cet-result-pdf.pdf" download class="btn btn-success"><i class="fa fa-download"></i> Download </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>

        
<!-- CET result Modal -->
<div class="modal fade" id="uniqueCetResultModal" tabindex="-1" role="dialog" aria-labelledby="uniqueCetModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 950px;  margin-left:-200px;">
            <div class="modal-body"  >
            <div>
            <section class="layout d-flex"   style="justify-content: center; margin: right -100px;">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo" style="height: 100px; margin-left: -100px;">
                <div style="text-align: center;">
                    <h4>Western Mindanao State University</h4>
                    <h5>Testing And Evaluation Center</h5>
                    <h6>Normal Road, Baliwasa, Zamboanga City</h6>  
                </div> 
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo" style="height: 100px; margin-right: -100px;">
            </section>
            <div style="text-align: center;" >
                <div >
                    <legend>COLLEGE ENTRANCE EXAM RESULT</legend>
                    <h3>SALI, ALKHAYZEL ABDILLA</h3>
                </div> 
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" colspan="2">CET PARTS</th>
                        <th scope="col">Communication Skills</th>
                        <th scope="col">Reading Comprehension</th>
                        <th scope="col">General Information</th>
                        <th scope="col">Quantitative Skills</th>
                        <th scope="col">Decesion Making & Reportorial Skills</th>
                        <th scope="col">OVRP</th>
                        <th scope="col">Percentile Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2"></td>
                            <td>20%</td>
                            <td>90%</td>
                            <td>82%</td>
                            <td>75%</td>
                            <td>50%</td>
                            <td>80%</td>
                            <td>79%</td>
                        </tr>
                        <tr>  
                    </tbody>
                </table>
                <!-- <img src="{{ asset('images/logo/qr.png') }}" alt="Logo" class="form-logo" style="height: 100px; "> -->
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

