<div>
    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Manage Appointment</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Appointment</li>
                </ol>
            </nav>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="adminTabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#appointment-pending-tab">Appointment Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#appointment-accepted-tab">Appointment Accepted</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#appointment-completed-tab">Appointment Completed</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Appointment Pending Tab -->
            <div class="tab-pane fade show active" id="appointment-pending-tab">
            <div class="examfilter-container">
                    <label class="filter-label" for="exam-filter">Filter by Date:</label>
                    <select class="filter-select" id="exam-filter">
                        <option value="">All</option>
                        <option value="College Entrance Exam">Today</option>
                        <option value="Nursing aptitude test">Yesterday</option>
                        <option value="Engineering Aptitude test">TBD</option>
                        <!-- Add more options as needed -->
                    </select>
                    <button class="accept-btn">Accept </button>
                    <button class="decline-btn">Delete </button>
                </div>
                <table class="appointment-table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Client Showed</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table content for appointment pending -->
                    </tbody>
                </table>
            </div>

            <!-- Appointment Accepted Tab -->
            <div class="tab-pane fade" id="appointment-accepted-tab">
            <div class="examfilter-container">
                    <label class="filter-label" for="exam-filter">Filter by Type of Exam:</label>
                    <select class="filter-select" id="exam-filter">
                        <option value="">All</option>
                        <option value="College Entrance Exam">Cet</option>
                        <option value="Nursing aptitude test">Nat</option>
                        <option value="Engineering Aptitude test">Eat</option>
                        <!-- Add more options as needed -->
                    </select>
                    <button class="accept-btn">Done</button>
                    <button class="decline-btn">Delete</button>
                </div>
                <table class="appointment-table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Client Showed</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table content for appointment accepted -->
                    </tbody>
                </table>
            </div>

            <!-- Appointment Completed Tab -->
            <div class="tab-pane fade" id="appointment-completed-tab">
            <div class="examfilter-container">
                    <label class="filter-label" for="exam-filter">Filter by Type of Exam:</label>
                    <select class="filter-select" id="exam-filter">
                        <option value="">All</option>
                        <option value="College Entrance Exam">Cet</option>
                        <option value="Nursing aptitude test">Nat</option>
                        <option value="Engineering Aptitude test">Eat</option>
                        <!-- Add more options as needed -->
                    </select>
                    <button class="decline-btn">Delete </button>
                </div>
                <table class="appointment-table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                            <th>Client Showed</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table content for appointment completed -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>s
</div>