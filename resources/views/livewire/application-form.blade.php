<div class="container border border-dark  mt-5 mb-5">
  <div class="row ">
    <span class="text-center text-danger border border-danger m-4   ">
        <img src="{{ asset('images/logo/qr.png') }}" alt="Logo" class="form-logo" style="width: 300px; height: 300px; object-fit: cover;" >
    </span>
    <div class="col-sm mt-5 my-4 pt-5  text-center  mx-5 ">
        
      <p class="text-danger font-weight-bold">Western Mindanao State University <br> TESTING AND EVALUATION CENTER  <br> Zamboanga City</p>
      <p class="text-danger font-weight-bold">WMSU-CET APPLICATION FORM  <br> For School Year 2024-2025</p>
    </div>
    <span class="text-center text-danger border border-danger m-4">
        <img src="{{ asset('images/slider/campus.jpg') }}" alt="Logo" class="form-logo" style="width: 300px; height: 300px; object-fit: cover;" >
    </span>
    
  </div>
   <br>
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
                                                </div>
                                              