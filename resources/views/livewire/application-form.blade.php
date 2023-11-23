<div class="container border border-dark  mt-5 mb-5">
  <div class="row ">
    <div class="col-sm border border-danger my-4 mx-2 d-flex align-items-center justify-content-center mx-5" style="height:300px;">
        <span class="text-center text-danger"> <img src="{{ asset('images/logo/qr.png') }}" alt="Logo" class="form-logo"></span>
    </div>

    <div class="col-sm  my-4 mx-2  text-center py-5 mx-5">
        
      <p class="text-danger font-weight-bold">Western Mindanao State University <br> TESTING AND EVALUATION CENTER  <br> Zamboanga City</p>
      <p class="text-danger font-weight-bold">WMSU-CET APPLICATION FORM  <br> For School Year 2024-2025</p>
    </div>
    <div class="col-sm text-center border border-danger my-4 mx-2 d-flex align-items-center justify-content-center mx-5">
        <span class="text-center text-danger"> 2x2 Picture</span>
    </div>
  </div> 
                                        <legend class="text-danger font-weight-bold">TO THE APPLICANTS:Forms with incomplete entries/requirements will not be processed</legend>
                                                 <div class="container border border-4 w-80">
                                                    <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label for="first-name" class="form-label">First name </label>
                                                                <input type="text" class="form-control" id="first-name" wire:model="firstname" name="first_name" placeholder="First name" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="last-name" class="form-label">Middle name</label>
                                                                <input type="text" class="form-control" id="last-name"  wire:model="middlename" name="last_name" placeholder="Middle name" >
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="last-name" class="form-label">Last name </label>
                                                                <input type="text" class="form-control" id="last-name"  wire:model="lastname" name="last_name" placeholder="Last name" required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="last-name" class="form-label">Suffix</label>
                                                                <input type="text" class="form-control" id="last-name"  wire:model="suffix" name="last_name" placeholder="Suffix" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 mb-2">
                                                                <label for="birthdate">Birthday:</label>
                                                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="contact-number" class="form-label">Contact Number</label>
                                                                <input type="text"  wire:model="phone" class="form-control" required placeholder="Contact Number" >
                                                            </div>
                                                            <div class="col-md-4 mb-2">
                                                                <label for="contact-number" class="form-label">Age</label>
                                                                <input type="text"  wire:model="phone" class="form-control" required placeholder="Contact Number" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label for="contact-number" class="form-label">Email Address</label>
                                                                <input type="text"  wire:model="phone" class="form-control" required placeholder="Contact Number" >
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label for="contact-number" class="form-label">Citizenship </label>
                                                                <input type="text"  wire:model="phone" class="form-control" required placeholder="Contact Number" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <legend class="text-danger font-weight-bold">TYPE OF APPLICANT (CHECK ONE of the categories that applies to you):</legend>
                                                    <div class="form-check"> 
                                                        <label class="form-check-label">
                                                            <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
                                                            <span class="text-danger font-weight-bold">SENIOR HIGH SCHOOL GRADUATING STUDENT</span>
                                                        </label>
                                                    </div>
                                                     <div class="container border border-4 w-80">
                                                         <div class="row">
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="first-name" class="form-label">Name Of School </label>
                                                                    <input type="text" class="form-control" id="first-name" wire:model="firstname" name="first_name" placeholder="Name Of School" required>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="last-name" class="form-label">Expected Date of Graduation</label>
                                                                    <input type="text" class="form-control" id="last-name"  wire:model="middlename" name="last_name" placeholder="Expected Date of Graduation" >
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="last-name" class="form-label">School Address </label>
                                                                    <input type="text" class="form-control" id="last-name"  wire:model="lastname" name="last_name" placeholder="School Address " required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            

                                                        <div class="form-check"> 
                                                        <label class="form-check-label">
                                                            <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
                                                            <span class="text-danger font-weight-bold">SENIOR HIGH SCHOOL GRADUATE who has not enrolled in college</span>
                                                        </label>
                                                    </div>
                                                     <div class="container border border-4 w-80">
                                                         <div class="row">
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="first-name" class="form-label">From what School </label>
                                                                    <input type="text" class="form-control" id="first-name" wire:model="firstname" name="first_name" placeholder="Name Of School" required>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="last-name" class="form-label"> Date/Year Graduated</label>
                                                                    <input type="text" class="form-control" id="last-name"  wire:model="middlename" name="last_name" placeholder="Year Graduated" >
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="last-name" class="form-label">School Address</label>
                                                                    <input type="text" class="form-control" id="last-name"  wire:model="lastname" name="last_name" placeholder="School Address " required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-check"> 
                                                        <label class="form-check-label">
                                                            <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
                                                            <span class="text-danger font-weight-bold">COLLEGE STUDENT</span>
                                                        </label>
                                                    </div>
                                                     <div class="container border border-4 w-80">
                                                         <div class="row">
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="first-name" class="form-label">School enrolled in/last attended</label>
                                                                    <input type="text" class="form-control" id="first-name" wire:model="firstname" name="first_name" placeholder="Name Of School" required>
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="last-name" class="form-label">Course</label>
                                                                    <input type="text" class="form-control" id="last-name"  wire:model="middlename" name="last_name" placeholder="Course" >
                                                                </div>
                                                                <div class="col-md-6 mb-2">
                                                                    <label for="last-name" class="form-label">School Address </label>
                                                                    <input type="text" class="form-control" id="last-name"  wire:model="lastname" name="last_name" placeholder="School Address " required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="text-danger font-weight-bold">To be filled out by person authorized to receive and/or process application</span>
                                                        <table class="table table-danger " style="height:130px;">
                                                                    <thead>
                                                                        <tr>
                                                                        <th scope="col">Test Date</th>
                                                                        <th scope="col">Test Center</th>
                                                                        <th scope="col">Room No</th>
                                                                        <th scope="col">Test Time</th>
                                                                        <th scope="col">Test Center Code</th>
                                                                        <th scope="col">High School Code</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                        <th scope="row"></th>
                                                                        <td>   </td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                    </tbody>
                                                         </table>
                                                         <div class="text-danger font-weight-bold"> Course to take up:(Choose from the list of WMSU Campuses and Undergraduate degree programs/courses offered by WMSU posted in your school's bulletin board.)</div>
            <div class="container border border-4 w-80">
                    <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="first-name" class="form-label">1st Choice</label>
                                    <input type="text" class="form-control" id="first-name" wire:model="firstname" name="first_name" placeholder="1st Choice" required>
                                </div>
                                    <div class="col-md-6 mb-2">
                                    <label for="last-name" class="form-label">Campus</label>
                                    <input type="text" class="form-control" id="last-name"  wire:model="middlename" name="last_name" placeholder=" Campus" >
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="last-name" class="form-label">2nd Choice </label>
                                        <input type="text" class="form-control" id="last-name"  wire:model="lastname" name="last_name" placeholder="2nd Choice " required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="last-name" class="form-label">Campus</label>
                                        <input type="text" class="form-control" id="last-name"  wire:model="suffix" name="last_name" placeholder="Campus" >
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="first-name" class="form-label">3rd Choice</label>
                                        <input type="text" class="form-control" id="first-name" wire:model="firstname" name="first_name" placeholder="3rd Choice" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="last-name" class="form-label">Campus</label>
                                        <input type="text" class="form-control" id="last-name"  wire:model="middlename" name="last_name" placeholder=" Campus" >
                                    </div>
                                    
                     </div>
             </div>
             <div class="text-danger font-weight-bold">Socio Econic Data: Furnish all required information. Under Column "Highest Education Finished" indicate the educational level actually completed (eg. Grade III, Third Year high school, High School Gradute, Secon Year, College Graduate,etc) </div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Parents</th>
                        <th scope="col">Citizenship</th>
                        <th scope="col">Highest Education Finished</th>
                        <th scope="col">Work/Occupation</th>
                        <th scope="col">Employer/Place of Work</th>
                        <th scope="col">Monthly Income/Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Father</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     
                        </tr>
                        <tr>
                        <th scope="row">Mother</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        </tr>
                       
                    </tbody>
                </table>

                    <div class="text-danger font-weight-bold">
                        <p style="display: inline;">Do you know how to use a computer?</p>
                        <input type="checkbox" id="checkbox1"> <label for="checkbox1">Yes</label>
                        <input type="checkbox" id="checkbox2"> <label for="checkbox2">No</label>
                    </div>
                    <div class="text-danger font-weight-bold">
                        <p class="d-inline-block mr-3">Are you a member of a Cultural/Ethnic group?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox1">
                            <label class="form-check-label" for="checkbox1">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox1">
                            <label class="form-check-label" for="checkbox1">Yes,if yes, please check any one below.</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox3">
                            <label class="form-check-label mr-3" for="checkbox3">Badjao</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox4">
                            <label class="form-check-label mr-3" for="checkbox4">Kalibugan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox5">
                            <label class="form-check-label mr-3" for="checkbox5">Maranaw</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox6">
                            <label class="form-check-label mr-3" for="checkbox6">Subanen</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox7">
                            <label class="form-check-label mr-3" for="checkbox7">Yakan</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox8">
                            <label class="form-check-label mr-3" for="checkbox8">Bagobo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox9">
                            <label class="form-check-label mr-3" for="checkbox9">Maguindanao</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox10">
                            <label class="form-check-label mr-3" for="checkbox10">Samal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox11">
                            <label class="form-check-label mr-3" for="checkbox11">Tausug</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox12">
                            <label class="form-check-label mr-3" for="checkbox12">Others (specify):</label>
                        </div>
                    </div>
                    <div  class="text-danger font-weight-bold mt-2">
                        <p class="mb-1" >Religous affiliation </p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox10">
                            <label class="form-check-label mr-3" for="checkbox10">Protestant</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox11">
                            <label class="form-check-label mr-3" for="checkbox11">Islam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox11">
                            <label class="form-check-label mr-3" for="checkbox11">Roman Catholic</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="checkbox12">
                            <label class="form-check-label mr-3" for="checkbox12">Others (specify):</label>
                        </div>
                    </div>

                        <div class="container border border-danger mt-5 rounded">
                            <div class="form-check form-check-inline">
                                <p class="text-danger mt-2"> <input class="form-check-input" type="checkbox" id="checkbox11">I herby accept that i have read and understood all the instructions in connection with my application for the WMSU-CET. I further accept that all information supplied herein and the supporting documents attached are true and correct if found otherwise, my exam shall be considered null and void. I also allow WMSU-TECT to process and store the data i have provided in this form in accordance with the provision of the Data Privacy Act of 2012</p>
                            </div>
                            <div class="row px-5 py-3">
                                <button type="button" class="btn btn-danger">Accept</button>
                             </div>
                        </div>

                        <div>
                            <p class="text-danger mt-5">Only prospective freshmen will be allowed to take the WMSU CET schedule for November 2023. Transferess Should join in the Febraruary 2024 exam.</p>
                        </div>
                        <div>
                            <Span class="text-danger font-weight-bold">IMPORTANT</Span>
                            <p class="text-danger">1. An Applicant can take  the WMSU-CET for S.Y 2024-2025, <span class="text-danger font-weight-bold text-decoration-underline" >ONLY ONCE,</span>wheter in the Main Campus or any other test Venue</p>
                            <p class="text-danger">For further inquries, Call WMSU-Testing and Evaluation Center at 09066131868 or email at tec@wmsu.edu.ph</p>
                        </div>
                            <div class="text-center" >
                                <legend class="text-danger font-weight-bold">REMINDERS</legend>
                            </div>
                            <div class="row">
                                 <div class="col-sm-5 col-md-6 text-danger">a. You must be at the test venue <span class="text-danger font-weight-bold">30 minutes before the test time </span><br>b. Bring your Test Permit and one (1) short-sized transparent plastic envelope with the following materials inside: <ul>
                                    <li>At least 2 Mongol No.2 pencils </li>
                                    <li>Sharpener </li>
                                    <li>Eraser of good quality </li>
                                    </ul> c. For your Snacks, you are only allowed to bring water, biscuits and candies.
                                 </div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 text-danger mb-5 px-2">d. Mobile Phones, calculators, smart watches, cameras and other eletronic gadgets are not ALLOWED during the test. <br> e. Observer proper dress code when you are in the test venue. Slippers, shorts, sleeveless shirts and blouses, jackets/sweatshirts and hats/caps are NOT allowed. <br> <span class="text-danger font-weight-bold">f. Present this Test Permit when claiming results.</span>
                                    </div>
                            </div>
                        

                                                </div>
                                                
                                              