<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Account Registration using Email Verification</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/account.css') }}">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{ asset('images/slider/wm.jpg') }}" alt="registration" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="{{ asset('images/logo/logo.png') }}" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Register an Account</p>
              <form method="POST" action="{{ route('register') }}">
              @csrf
                <div class="form-group">
                  <label for="name" class="sr-only">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                </div>
                <div class="form-group">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="password_confirmation" class="sr-only">Confirm Password</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-block login-btn mb-4 button-color">Register</button>
              </form>
              <p class="login-card-footer-text">Register Using <a href="{{ route('create-using-email') }}" class="text-reset"> Email Address</a></p>
              <p class="login-card-footer-text">Already have an account? <a href="{{ route('login') }}" class="text-reset">Login here</a></p>
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
</body>
</html>
