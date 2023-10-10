<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('css/application.css') }}">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studentgrad</title>
</head>
<body>
<div>
    
    <div role="tabpanel" class="tab-pane" id="application">
        <section class="test-application-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="test-section">
                           
                            <p>Select the test you would like to take from the options below:</p>
                            <ul class="test-list">
                            <li class="custom-dropdown" id="cetDropdownContainer">
                                <span class="test-list-item">CET Form Applications<span class="dropdown-indicator">&#9662;</span></span>
                                <ul class="dropdown-content" id="cetDropdown">
                                    <li><a href="{{ Route('student.cet.undergrad') }}">CET SHS Graduating form</a></li>
                                    <li><a href="{{ Route('student.cet.Grad') }}">CET SHS Graduate form</a></li>
                                    <li><a href="{{ Route('student.cet.shiftee') }}">CET Shiftee/Transferee</a></li>
                                </ul>
                            </li>
                            <li>
                            <a class="test-list-item" href="{{ Route('student.cet.nat') }}">
                                    NAT Application
                                    <button class="btn btn-primary apply-button">Available</button>
                                </a>
                            </li>
                            <li>
                                <a class="test-list-item" href="{{ url('student.cet.eat') }}">
                                    EAT Application
                                    <button class="btn btn-primary apply-button">Available</button>
                                </a>
                            </li>
                            <li>
                            <a class="test-list-item" href="{{ Route('student.cet.eat') }}">
                                    GSAT Application
                                    <button class="btn btn-primary apply-button">Unavailabe</button>
                                </a>
                            </li>
                            <li>
                                <a class="test-list-item" href="{{ url('test-application.Lsat') }}">
                                    LSAT Application
                                    <button class="btn btn-primary apply-button">Unavailabe</button>
                                </a>
                            </li>
                        </ul>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="guide-section">
                        <button type="button" class="btn-close" aria-label="Close"></button>
                        <div class="container4">
    <div class="header-eat">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="form-logo">
        <div class="header-eat-text">
            <span>Western Mindanao State University</span>
            <h2 class="mb-2">College Entrance Exam Application Form</h2>
            <span class="mb-2 custom-class">Senior highschool graduate</span>
        </div>
    </div>
    <form method="POST" action="{{ url('submit.application') }}" enctype="multipart/form-data">
        @csrf
        <div class="container4">
            <div class="form-container">
                <form class="needs-validation" novalidate>
                    <fieldset class="mb-2">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first-name" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="contact-number" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contact-number" name="contact_number" placeholder="Contact Number">
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="high-school-name" class="form-label">High School Name</label>
                            <input type="text" class="form-control" id="high-school-name" name="high_school_name" placeholder="High School Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="high-school-address" class="form-label">High School Address</label>
                            <input type="text" class="form-control" id="high-school-address" name="high_school_address" placeholder="High School Address" required>
                        </div>
                    </div>
                    <fieldset class="mb-2">
                    <legend>Document Uploads</legend>
                    <div class="school-information-grad">
                    <div class="row px-4 mt-2">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="senior-card-original">Original Senior High School Card:</label>
                                <input type="file" class="form-control" id="tor" name="payment-receipt" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                            </div>
                           
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="barangay-clearance">Two Identical 2x2 Photos with Name Tag:</label>
                                <input type="file" class="form-control" id="tor" name="payment-receipt" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
                            </div>
                           
                        </div>
                    </div></div>
                </fieldset>
                <div class="family-background">
                    <div class="row">
        <div class="col-md-6">            
                <legend class="father form-legend">Father's Information</legend>
                     <div class="father-information">
                         <div class="row">
                            <div class="father col-md-8 mb-3 mt-2">
                                 <label for="father-first-name" class="form-label">First Name</label>
                                    <input type="text" class="form-control-fr" id="father-first-name" placeholder="First Name" required>
                         </div>
                                <div class="father col-md-8 mb-3">
                                    <label for="father-middle-name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control-fr" id="father-middle-name" placeholder="Middle Name" required>
                                </div>
                            </div>

                <div class="father col-md-8 mb-3">
                    <label for="father-last-name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="father-last-name" placeholder="Last Name" required>
                </div>
                <div class="father col-md-8 mb-3">
                    <label for="father-last-name" class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="father-last-name" placeholder="Suffix" required>
                </div>
            </div>
        </div>



        <div class="col-md-6"> <legend class="mother form-legend">Mother's Information</legend>
            <div class="mother-information">
                <div class="mother col-md-8 mb-3 mt-2">
                    <label for="mother-first-name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="mother-first-name" placeholder="First Name" required>
                </div>
                <div class="mother col-md-8 mb-3">
                    <label for="mother-middle-name" class="form-label">Middle Name </label>
                    <input type="text" class="form-control" id="mother-middle-name" placeholder="Middle Name" required>
                </div>
                <div class="mother col-md-8 mb-3">
                    <label for="mother-last-name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="mother-last-name" placeholder="Last Name" required>
                </div>
                <div class="father col-md-8 mb-3">
                    <label for="father-last-name" class="form-label">Suffix</label>
                    <input type="text" class="form-control" id="father-last-name" placeholder="Suffix" required>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Guardian information-->
<legend class=" form-legend">Guardian's Information (If Applicable)</legend>
  <div class="guardian-grad">
  <div class="mother col-md-8 mb-3 mt-2">
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="first-name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first-name" placeholder="First Name" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="middle-name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middle-name" placeholder="Middle Name" required>
        </div>
    </div>


                
<div class="row">
        <div class="col-md-6 mb-3">
            <label for="first-name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="first-name" placeholder="Last Name" required>
        </div>
        <div class="col-md-6 mb-3">
    <label for="father-suffix" class="form-label">Suffix</label>
<input type="text" class="form-control" id="father-suffix" aria-label="Father's Suffix" placeholder="Enter Suffix">
</div>

        <div class="col-md-6 mb-3">
            <label for="middle-name" class="form-label">Relationship</label>
            <input type="text" class="form-control" id="middle-name" placeholder="Relationship" required>
        </div>
    </div>
  </div>
  </div>

 </div>

                   
                    <button type="submit" class="submit-button mt-2">Submit Application</button>
                </form>
            </div>
        </div>
    </form>
</div>
</body>
</html>

