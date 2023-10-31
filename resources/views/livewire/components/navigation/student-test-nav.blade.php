<div class="col-lg-6">
    <div class="test-section">
        <h2>Choose Your Test</h2>
        <p>Select the test you would like to take from the options below:</p>

        <!-- CET Tests Dropdown with a Clear Label -->
        <div class="card mb-3">
            <div class="card-header" style="background-color: #990000; color: white; font-weight: bold;">
                CET Form Applications
            </div>
            <div class="dropdown px-2 py-2">
                <button class="btn btn-secondary dropdown-toggle mt-2" type="button" id="cetDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose a CET Form
                </button>
                <ul class="dropdown-menu" aria-labelledby="cetDropdownButton">
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="undergrad()">
                            CET SHS Graduating form
                            <button type="button" class="btn btn-primary rounded">Available</button>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="grad()">
                            CET SHS Graduate form
                            <button type="button" class="btn btn-primary rounded">Available</button>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="shiftee_tranferee()">
                            CET Shiftee/Transferee
                            <button type="button" class="btn btn-primary rounded">Available</button>
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
                    <button type="button" class="btn btn-primary mx-5">Available</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ Route('student.cet.eat') }}">EAT Application</a>
                    <button type="button" class="btn btn-primary rounded">Available</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('test-application.Gsat') }}">GSAT Application</a>
                    <button type="button" class="btn btn-primary rounded">Unavailable</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('test-application.Lsat') }}">LSAT Application</a>
                    <button type="button" class="btn btn-primary rounded">Unavailable</button>
                </li>
            </ul>
        </div>
    </div>
</div>
