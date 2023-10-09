<div>
    <div class="container-fluid">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="{{request()->is('student/profile*') ? 'active' : 'presentation'}}">
                <a href="{{ route('student.profile') }}" role="tab">Profile</a>
            </li>
            <li role="presentation" class="{{request()->is('student/requirements*') ? 'active' : 'presentation'}}">
                <a href="{{ route('student.requirements') }}" role="tab">Requirements</a>
            </li>
            <li role="presentation" class="{{request()->is('student/application*') ? 'active' : 'presentation'}}">
                <a href="{{ route('student.application') }}" role="tab">Application</a>
            </li>
            <li role="presentation" class="{{request()->is('student/status*') ? 'active' : 'presentation'}}">
                <a href="{{ route('student.status') }}" role="tab">Status</a>
            </li>
            <li role="presentation" class="{{request()->is('student/results*') ? 'active' : 'presentation'}}">
                <a href="{{ route('student.results') }}" role="tab">Results</a>
            </li>
            <li role="presentation" class="{{request()->is('student/schedule*') ? 'active' : 'presentation'}}">
                <a href="{{ route('student.schedule') }}" role="tab">Schedule</a>
            </li>
            <li role="presentation" class="{{request()->is('student/notifications*') ? 'active' : 'presentation'}}">
                <a href="{{ route('student.notifications') }}" role="tab">Notifications</a>
            </li>
            
        </ul>

        <!-- Content for the selected tab -->



            <!-- Appointment Tab Content -->
            <div role="tabpanel" class="tab-pane" id="appointment">
                <!-- Content for the Appointment Tab -->
                <!-- Add your appointment content here -->
            </div>
        </div>
    </div>
</div>
