<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    
</body>
</html><div>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container-signup">
        <div class="card login-card">
            <div class="row no-gutters">
            <div class="col-md-5">
                <img src="{{ asset('images/slider/wm.jpg') }}" alt="login" class="login-card-img">
            </div>
            <div class="left-container col-md-7">
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
                            <button type="submit"   class="btn btn-block login-btn mb-4 button-color">Verify</button>
                            <a href="{{ route('login') }}" class="forgot-password-link">Back to Login</a>
                       </form>
                    @endif
                @else
                <div class="signup-right alert alert-danger" role="alert">
                    <form wire:submit.prevent="sign_up()">
                    <div class="mb-1">
    <label for="username" class="form-label">Username</label>
    <input type="text" style="color: {{$style}}" class="form-control input-lg" wire:model="username" wire:keyup="verify_username()" required>
</div>
<div class="mb-1">
    <label for="firstName" class="form-label">First Name</label>
    <input type="text" class="form-control input-lg" wire:model="firstname" required>
</div>



                                                    <div class="mb-1">
                                <div class=" mb-1">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" wire:model="middlename">
                                </div>
                                <div class=" mb-1">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" wire:model="lastname" required>
                                </div>
                            </div>

         <div class="suffix col-md-8 mb-3">
                    <label  class="form-label">Suffix</label>
                    <select class="form-select"  >
                        <option selected>None</option>
                        <option value="1">Jr.</option>
                        <option value="2">Sr.</option>
                        <option value="3">III</option>
                    </select>
                </div>
                <div class="row mb-2">
    <div class="mb-1">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" min="8" wire:model="password" wire:keyup="verify_password()" required>
    </div>
    <div class="mb-1">
        <label for="confirmPassword" class=" form-label">Confirm Password</label>
        <input type="password" class="form-control" min="8" wire:model="confirm_password" wire:keyup="verify_confirm_password()" required>
    </div>
</div>



                            <div class="row mb-2">
                                <div class="col-md-12 ">
                                    <label class="form-label"></label>
                                </div>
                                <div class="col-md-8 ">
                                    <label for="birthDate" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" wire:model="birthdate"  wire:change="verify_birthdate()"required>
                                </div>
                                <div class="col-md-12 mb-1">
                                        <label for="seniorHighschool" class="form-label">Senior Highschool</label>
                                        <input type="text"   class="form-control" wire:model="high_school" required>
                                </div>
                                <button type="submit" class="button-signup btn-block button-color ml-2 ">{{$sign_up_button}}</button>
                           
                            </div>
                        </form>
                    </div>
                @endif
                <nav class="login-card-footer-nav">
                    <a href="#!">Terms of use.</a>
                    <a href="#!">Privacy policy</a>
                </nav>
                <!-- Add the back to homepage button -->
                <a href="{{ route('home') }}" class="button-home btn mt-3 mb-2">Back to Homepage</a>
                

                </div>
            </div>
            </div>
        </div>
        </div>
  </main>
</div>
