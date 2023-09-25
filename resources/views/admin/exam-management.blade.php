<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin exam management - WMSU TEC</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/boxicons/2.0.7/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!--  Main CSS File -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!--   js File -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/addexam.js') }}"></script>
</head>

<body class="admin-dashboard">

    <!-- ======= Header ======= -->
    @include('admin-components.admin-header');
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('admin-components.admin-sidebar');
    <!-- End Sidebar -->

    <!-- ======= Main Content ======= -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Exam management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Exam Management</li>
                </ol>
            </nav>
        </div><!-- End Right side columns -->
        <!-- Insert Section -->
        <section class="admin-content">
    <h2 class="section-heading">Exam Management</h2>
              <!-- Exam Management Table -->
<div class="exam-management-filter">
    <label for="exam-search">Search:</label>
    <input type="text" id="exam-search" placeholder="Search...">
    <label for="exam-status-filter">Status:</label>
    <select id="exam-status-filter">
        <option value="all">All</option>
        <option value="active">Active</option>
        <option value="disabled">Disabled</option>
    </select>

    <div class="add-exam-button">
        <button id="addExamButton">Add Exam</button>
        
        <!-- Add New Exam Modal -->
        <div id="add-exam-modal" class="modal">
            <div class="modal-content">
                <span class="close-button" id="close-add-exam-modal">&times;</span>
                <form id="add-exam-form">
                <label for="exam-name">Exam Name:</label>
                <input type="text" id="exam-name" name="exam-name" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="3" required></textarea>

                <label for="start-date">Start Date:</label>
                <input type="date" id="start-date" name="start-date" required>

                <label for="end-date">End Date:</label>
                <input type="date" id="end-date" name="end-date" required>

                <label for="registration-link">Registration Link:</label>
                <input type="url" id="registration-link" name="registration-link" required>

                <label for="eligibility">Eligibility:</label>
                <textarea id="eligibility" name="eligibility" rows="3" required></textarea>

                <button type="submit">Add Exam</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Exam Management Table -->
<div class="exam-management-table">
<table>
    <thead>
        <tr>
            <th>Exam Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Registration Link</th>
            <th>Status (Active/Disabled)</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Example exam rows -->
        <tr>
            <td>CET</td>
            <td>Description for CET</td>
            <td>2023-10-01</td>
            <td>2023-10-15</td>
            <td><a href="https://example.com/cet-registration">Register</a></td>
            <td>Active</td>
            <td>
                <button>Edit</button>
                <button>Delete</button>
            </td>
        </tr>
        <tr>
            <td>NAT</td>
            <td>Description for NAT</td>
            <td>2023-11-01</td>
            <td>2023-11-15</td>
            <td><a href="https://example.com/nat-registration">Register</a></td>
            <td>Disabled</td>
            <td>
                <button>Edit</button>
                <button>Delete</button>
            </td>
        </tr>
        <!-- Add more exam rows as needed -->
    </tbody>
</table>
</div>
        </div>
    </section>
        <!-- End Inserted Section -->

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Add the following JavaScript code at the end of your HTML file, before the closing </body> tag -->
<script>
  // Get references to the add exam button and the modal
  const addExamButton = document.getElementById("addExamButton");
  const addExamModal = document.getElementById("add-exam-modal");

  // Get a reference to the close button inside the modal
  const closeButton = document.getElementById("close-add-exam-modal");

  // Function to open the modal
  function openAddExamModal() {
    addExamModal.style.display = "block";
  }

  // Function to close the modal
  function closeAddExamModal() {
    addExamModal.style.display = "none";
  }

  // Event listener for the "Add Exam" button
  addExamButton.addEventListener("click", openAddExamModal);

  // Event listener for the close button inside the modal
  closeButton.addEventListener("click", closeAddExamModal);

  // Event listener to close the modal when the user clicks outside of it
  window.addEventListener("click", function (event) {
    if (event.target == addExamModal) {
      closeAddExamModal();
    }
  });

  // Event listener to prevent the modal from closing when clicking inside it
  addExamModal.addEventListener("click", function (event) {
    event.stopPropagation();
  });
</script>

</body>

</html>
