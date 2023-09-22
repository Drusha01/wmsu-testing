<nav class="navbar navbar-expand-lg navbar-dark bg-crimson">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU Logo" height="60px">
            <span class="company-name">Testing and Evaluation Center</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointment') }}">Appointment</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="testApplicationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Test Application
                    </a>
                    <div class="dropdown-menu" aria-labelledby="testApplicationDropdown">
                        <a class="dropdown-item" href="{{ Route('test-application.Cet') }}">CET</a>
                        <a class="dropdown-item" href="{{ Route('test-application.Nat') }}">NAT</a>
                        <a class="dropdown-item" href="{{ Route('test-application.Eat') }}">EAT</a>
                        <a class="dropdown-item" href="{{ Route('test-application.Gsat') }}">GSAT</a>
                        <a class="dropdown-item" href="{{ Route('test-application.Lsat') }}">LSAT</a>
                    </div>
                </li>
                <!-- Add "Contact Us" navigation link here -->

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#contactModal">Contact Us</a>
                    </li>
            </ul>

            <!-- Contact Us Modal -->
            <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Contact form -->
                            <form id="contact-form" method="post" action="contact-form-handler.php">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="contact-form" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>


            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User Name <!-- Replace with the user's name or icon -->
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('student.profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('student.application') }}">Application</a>
                        <a class="dropdown-item" href="{{ route('student.status') }}">Status</a>
                        <a class="dropdown-item" href="{{ route('student.results') }}">Results</a>
                        <a class="dropdown-item" href="{{ route('student.schedule') }}">Schedule</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('home') }}">Sign Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
