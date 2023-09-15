<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMSU TEC - Appointment</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    @include('components.navigation');
    <!-- Navigation -->

    <!-- Appointment Section -->
    <section class="appointment">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="appointment-form">
                        <h2>Schedule an Appointment</h2>
                        <p>If you would like to visit us in person for your transactions, please use the form below to schedule an appointment.</p>
                        <form action="{{ url('submit_appointment') }}" method="POST">
                            @csrf <!-- CSRF Token -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="appointmentDate" class="form-label">Preferred Appointment Date</label>
                                <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="purpose" class="form-label">Purpose of Appointment</label>
                                <input type="text" class="form-control" id="purpose" name="purpose" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message (Optional)</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Schedule Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment Section -->


    <!-- Footer -->
    @include('components.footer')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>