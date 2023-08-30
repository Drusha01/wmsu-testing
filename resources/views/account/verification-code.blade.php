<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Account Registration Verification</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{ asset('css/account.css') }}">
</head>
<body>

<section class="d-flex align-items-center min-vh-100 py-3 py-md-0 verification-section">
    <div class="container">
      <div class="card verification-card">
        <div class="card-body">
          <p class="login-card-description">Enter Verification Code</p>
          <form action="{{ url('verify-code') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="verificationCode" class="sr-only">Verification Code</label>
              <input type="text" name="verificationCode" id="verificationCode" class="form-control" placeholder="Verification code" required>
            </div>
            <button type="submit" class="btn btn-block login-btn mb-4 button-color">Verify Code</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>
