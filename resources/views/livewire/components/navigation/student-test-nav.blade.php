<div class="col-lg-6">
    <div class="test-section">
        <h2>Online Application</h2>
        <p>Select the examination you would like to take from the options below:</p>

        <!-- CET Tests Dropdown with a Clear Label -->
        <div class="card mb-3">
            <div class="card-header" style="background-color: #990000; color: white; font-weight: bold;">
                College Entrance Test Form Applications
            </div>
            <div class="dropdown px-2 py-2">
                <button class="btn btn-secondary dropdown-toggle mt-2" type="button" id="cetDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Choose a CET Form
                </button>
                <ul class="dropdown-menu" aria-labelledby="cetDropdownButton">
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center " href="#"  wire:click="undergrad()">
                            CET SHS Graduating form
                            <button type="button" class="btn btn-primary  mx-2">Available</button>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="grad()">
                            CET SHS Graduate form
                            <button type="button" class="btn btn-primary  mx-2">Available</button>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" wire:click="shiftee_tranferee()">
                            CET Shiftee/Transferee
                            <button type="button" class="btn btn-primary  mx-2">Available</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Other Tests Group -->
        <div class="card">
            <div class="card-header">
                Other Examination Form
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <a href="{{ Route('student.cet.nat') }}" class="text-decoration-none text-body font-weight-bold">Nursing Aptitude Test Form</a>
                    <button type="button" class="btn btn-primary ">Available</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ Route('student.cet.eat') }}" class="text-decoration-none text-secondary text-body font-weight-bold">Engineering Aptitude Test Form</a>
                    <button type="button" class="btn btn-primary rounded">Available</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ Route('student.cet.gsat') }}" class="text-decoration-none text-secondary text-body font-weight-bold">Graduate school Aptitude Test Form</a>
                    <button type="button" class="btn btn-primary rounded">Available</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('student.cet.lsat') }}" class="text-decoration-none text-secondary text-body font-weight-bold">Law school Aptitude Test Form</a>
                    <button type="button" class="btn btn-primary rounded">Available</button>
                </li>
            </ul>
        </div>
    </div>
</div>
