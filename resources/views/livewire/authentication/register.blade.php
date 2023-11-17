<div style="background: linear-gradient(to top, #990000, #ccc); background-size: 100% 200%; animation: gradientAnimation 5s infinite;">
    <style>
        @keyframes gradientAnimation {
          0%, 100% {
            background-position: 0 0;
          }
          50% {
            background-position: 0 100%;
          }
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <span class="text-signup mt-1">Sign Up Form</span>
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Reminders</h4>
                            <ol class="mb-0">
                                <li>Sign Up with a valid and existing personal email address where we can send your activation link.</li>
                                <li>Make sure that you can access your inbox, and that the email address is correct and can receive email.</li>
                                <li>Enter your correct information to avoid delays in the processing of your application.</li>
                                <li>Double-check your school name.</li>
                                <li>You are only allowed to sign up once using the same email address you provided.</li>
                                <li>Make sure to activate your account sent to your Email address.</li>
                            </ol>
                            <br>
                            <form>
                                <div class="row mb-3">
                                    <div class="col-md-12 mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="middleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middleName" name="middleName">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                                    </div>
                                </div>
                
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <label for="suffix" class="form-label">Suffix (if applicable)</label>
                                        <input type="text" class="form-control" id="suffix" name="suffix" placeholder="E.g., Jr., Sr., III">
                                        <small class="form-text text-muted">Include any suffix associated with your name.</small>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="col-md-12 ">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 ">
                                        <label class="form-label"></label>
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label for="birthDate" class="form-label">Birthday</label>
                                        <input type="date" class="form-control" id="birthDate" name="birthDate" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                            <label for="seniorHighschool" class="form-label">Senior Highschool</label>
                                            <input type="text"   class="form-control" id="seniorHighschool" name="seniorHighschool" required>
                                    </div>
                                    <button type="submit" class="btn-block button-color ">Sign Up</button>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>