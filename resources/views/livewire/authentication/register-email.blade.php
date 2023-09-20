<div>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
            <div class="col-md-5">
                <img src="{{ asset('images/slider/wm.jpg') }}" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                <div class="brand-wrapper">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="logo" class="logo">
                </div>
                <p class="login-card-description">Register an Account Using your Email</p>
                
                @if($sign_up)
                    @if($email_send)
                        <form wire:submit.prevent="send_verification_code()" >
                        @csrf
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email"  wire:model="email" class="form-control" placeholder="Email address" required>
                        </div>
                        <button type="submit"   class="btn btn-block login-btn mb-4 button-color">Send Verification Code</button>
                        <a href="{{ route('login') }}" class="forgot-password-link">Back to Login</a>
                       </form>
                    @else
                        <form wire:submit.prevent="verify_code()" >
                            @csrf
                            <div class="form-group">    
                                <label for="email" class="sr-only">Email</label>
                                <input type="number"  wire:model="code" class="form-control" placeholder="Enter code" min="100000" max="999999" required>
                            </div>
                            <button type="submit"   class="btn btn-block login-btn mb-4 button-color">Verify Code</button>
                            <a href="{{ route('login') }}" class="forgot-password-link">Back to Login</a>
                       </form>
                    @endif
                @else
                <div class="alert alert-danger" role="alert">
                <form>
                    <div class="row mb-1">
                        <div class="col-md-12 mb-1">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="col-md-12 mb-1">
                            <label for="middleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" name="middleName">
                        </div>
                        <div class="col-md-12 mb-1">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                    </div>
                
                                <div class="row mb-1">
                                    <div class="col-md-6 mb-1">
                                        <label for="suffix" class="form-label">Suffix</label>
                                        <input type="text" class="form-control" id="suffix" name="suffix">
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
                                    <div class="col-md-12 mb-1">
                                            <label for="seniorHighschool" class="form-label">Senior Highschool</label>
                                            <input type="text"   class="form-control" id="seniorHighschool" name="seniorHighschool" required>
                                    </div>
                                    <button type="submit" class="btn-block button-color ">Sign Up</button>
                                </div>
                                
                            </form>
                    </div>

                @endif
                <nav class="login-card-footer-nav">
                    <a href="#!">Terms of use.</a>
                    <a href="#!">Privacy policy</a>
                </nav>
                <!-- Add the back to homepage button -->
                <a href="{{ route('home') }}" class="btn btn-block btn-outline-primary mt-3">Back to Homepage</a>
                </div>
            </div>
            </div>
        </div>
        </div>
  </main>
</div>
