<!DOCTYPE html>
<html lang="en">
    
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GSAT Application Form</title>
<link rel="stylesheet" href="{{ asset('css/test-application.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
  body {
    background-color: #f8f9fa;
  }
  .container {
    margin-top: 50px;
    max-width: 600px;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
</style>
</head>

<body>

<div class="container">
  <h2 class="mb-4">GSAT Application Form</h2>
  <form>
    <div class="row mb-3">
      <div class="col">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required>
      </div>
      <div class="col">
        <label for="middleName" class="form-label">Middle Name</label>
        <input type="text" class="form-control" id="middleName" name="middleName">
      </div>
      <div class="col">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required>
      </div>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Document Uploads</label>
      <div class="row">
        <div class="col">
           <input type="file" class="form-control" id="tor" name="tor" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
          <label for="bachelorDegree">Bachelor Degree (Original)</label>
        </div>
        <div class="col">
          <input type="file" class="form-control" id="tor" name="tor" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
          <label for="tor">TOR (Original)</label>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">2x2 Photo with Name Tag</label>
      <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Barangay Clearance</label>
      <input type="file" class="form-control" id="tor" name="tor" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Medical Certificate</label>
      <input type="file" class="form-control" id="tor" name="tor" accept=".pdf,.doc,.docx,.jpg,.png,.jpeg" required>
    <button type="submit" class="btn btn-primary mt-2">Submit Application</button>
  </form>
</div>

</body>
</html>
