<div class="col-lg-6">
    <div class="test-section">
        <h2>Choose Your Test</h2>
        <p>Select the test you would like to take from the options below:</p>

        <!-- CET Tests Dropdown with a Clear Label -->
        <div class="card mb-3">
            <div class="card-header" style="background-color: #990000; color: white; font-weight: bold;">
                CET Form Applications
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="cetDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose a CET Form
                </button>
                <ul class="dropdown-menu" aria-labelledby="cetDropdownButton">
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="undergrad()">
                            CET SHS Graduating form
                            <span class="badge bg-primary rounded-pill">Available</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="grad()">
                            CET SHS Graduate form
                            <span class="badge bg-primary rounded-pill">Available</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="shiftee_tranferee()">
                            CET Shiftee/Transferee
                            <span class="badge bg-primary rounded-pill">Available</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Other Tests Group -->
        <div class="card">
            <div class="card-header">
                Other Tests
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ Route('student.cet.nat') }}">NAT Application</a>
                    <span class="badge bg-primary rounded-pill">Available</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ Route('student.cet.eat') }}">EAT Application</a>
                    <span class="badge bg-primary rounded-pill">Available</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('test-application.Gsat') }}">GSAT Application</a>
                    <span class="badge bg-primary rounded-pill">Unavailable</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('test-application.Lsat') }}">LSAT Application</a>
                    <span class="badge bg-primary rounded-pill">Unavailable</span>
                </li>
            </ul>
        </div>
    </div>
</div>
