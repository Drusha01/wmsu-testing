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
                            <a class="test-list-item" href="{{ Route('student.cet.eat') }}">
                                    EAT Application
                                    <button class="btn btn-primary apply-button">Available</button>
                                </a>
                            </li>
                            <li>
                                <a class="test-list-item" href="{{ url('test-application.Gsat') }}">
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
                        <div class="nat-container">
        <div class="nat-header">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo" class="nat-logo">
            <div class="header-eat-text">
                <span>Western Mindanao State University</span>
                <h3>Nursing Admission Test (NAT)</h3>
            </div>
        </div>
        <form>
            <div class="row mt-4">
                <div class="col-md-4 mb-3">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="middle-name">Middle Name:</label>
                    <input type="text" id="middle-name" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address">Address:</label>
                    <input type="text" id="address" class="form-control" required>
                </div>
            </div>
           
            <legend class="father form-legend">Required Documents</legend>
             <div class="border border-secondary px-4 py-2">
                     <div class="row ">
                            <div class="col-md-6 mb-3">
                                <label for="test-result">College Entrance Test Result (70.00 And Above)</label>
                                <input type="file" class="form-control" id="tor1" name="test-result" accept=".pdf,.jpg,.png,.jpeg" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="test-result">Endorsement from the WMSU dean of admission</label>
                                <input type="file" class="form-control" id="tor1" name="test-result" accept=".pdf,.jpg,.png,.jpeg" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="photo">2x2 Picture with Name Tag (Selfie not Allowed)</label>
                                <input type="file" class="form-control" id="tor2" name="photo" accept=".pdf,.jpg,.png,.jpeg" required>
                            </div>
                     </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="payment-receipt" class="form-label" style="color: red;">Payment Receipt<br> To Complete your examination registration, please make the payment for the examination permit at the University cashier's office.<br> After Payment Upload the payment Receipt below: </label>
                            <input type="file" class="form-control" id="tor" name="payment-receipt" accept=".pdf,.jpg,.png,.jpeg" required>
                        </div>
                    </div>
                </div>
                <div class="family-background">
                                            <div class="row">
                                                <div class="col-md-6">            
                                                        <legend class="father form-legend">Father's Information</legend>
                                                        <div class="border border-secondary">
                                                            <div class="row px-3">
                                                                    <div class=" col-md-8 mb-3 mt-2">
                                                                        <label for="father-first-name" class="form-label">First Name</label>
                                                                        <input type="text" class="form-control" id="father-first-name" placeholder="First Name" required>
                                                                    </div>
                                                                    <div class=" col-md-8 mb-3">
                                                                        <label for="father-middle-name" class="form-label">Middle Name</label>
                                                                        <input type="text" class="form-control" id="father-middle-name" placeholder="Middle Name" required>
                                                                    </div>
                                                            
                                                                <div class=" col-md-8 mb-3">
                                                                    <label for="father-last-name" class="form-label">Last Name</label>
                                                                    <input type="text" class="form-control" id="father-last-name" placeholder="Last Name" required>
                                                                </div>
                                                                <div class=" col-md-8 mb-3">
                                                                    <label for="father-last-name" class="form-label">Suffix</label>
                                                                    <input type="text" class="form-control" id="father-suffix" placeholder="Suffix" required>
                                                                </div>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-md-6"> 
                                                        <legend class="mother form-legend">Mother's Information</legend>
                                                        <div class="border border-secondary">
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
                                                


                                                        <legend class="form-legend">Guardian's Information (If Applicable)</legend>
                                                        <div class="border border-secondary">
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
                                                                                    <label for="last-name" class="form-label">Last Name</label>
                                                                                    <input type="text" class="form-control" id="last-name" placeholder="Last Name" required>
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
                                                                        <button type="submit" class="mt-3 submit-button">Submit Application</button>
 
                   </div>
        </form>
    </div>
</body>
</html>