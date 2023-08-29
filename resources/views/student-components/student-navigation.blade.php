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
                    <a class="nav-link" href="{{ route('student.profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.application') }}">Application</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.registration') }}">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.results') }}">Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.schedule') }}">Schedule</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>