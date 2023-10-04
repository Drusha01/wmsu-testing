    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add Bootstrap JS and Popper.js script links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div>
    
    <div role="tabpanel" class="tab-pane" id="application">
        <section class="test-application-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="test-section">
                            <h2>Choose Your Test</h2>
                            <p>Select the test you would like to take from the options below:</p>
                            <ul class="test-list">
                            <li class="custom-dropdown" id="cetDropdownContainer">
                                <span class="test-list-item">CET Form Applications<span class="dropdown-indicator">&#9662;</span></span>
                                <ul class="dropdown-content" id="cetDropdown">
                                    <li><a href="{{ Route('application.cet') }}">CET SHS Graduating form</a></li>
                                    <li><a href="{{ Route('application.cetgraduate') }}">CET SHS Graduate form</a></li>
                                    <li><a href="{{ Route('application.cetshiftee') }}">CET Shiftee/Transferee</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="test-list-item" href="{{ url('test-application.Nat') }}">
                                    NAT Application
                                    <button class="btn btn-primary apply-button">Unavailabe</button>
                                </a>
                            </li>
                            <li>
                                <a class="test-list-item" href="{{ url('test-application.Eat') }}">
                                    EAT Application
                                    <button class="btn btn-primary apply-button">Unavailabe</button>
                                </a>
                            </li>
                            <li>
                                <a class="test-list-item" href="{{ url('test-application.Gsat') }}">
                                    GSAT Application
                                    <button class="btn btn-primary apply-button">Unavailabe</button>
                                </a>
                            </li>
                            <li>
                                <a class="test-list-item" href="{{ url('test-application.Lsat') }}">
                                    LSAT Application
                                    <button class="btn btn-primary apply-button">Unavailabe</button>
                                </a>
                            </li>
                        </ul>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="guide-section">
                            <h3>Step-by-Step Guide to Apply</h3>
                            <ol class="step-list">
                                <li>Create an account on our website.</li>
                                <li>Choose the test you want to take.</li>
                                <li>Upload the required documents.</li>
                                <li>Submit your application.</li>
                            </ol>
                            <p>Follow these steps to complete the application process. If you have questions, contact our support team.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
