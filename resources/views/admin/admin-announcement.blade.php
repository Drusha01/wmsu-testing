<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin announcement - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Modal.css') }}">
</head>
<body>
    
<div class="container">
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <aside class="admin-sidebar">
            <div class="logo-company">
                <img src="{{ asset('images/logo/logo.png') }}" alt="WMSU TEC Logo" class="logo">
                <h1 class="company-name">WMSU <span>Testing and Evaluation Center</span></h1>
            </div>
            <nav>
            <ul>
                    <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin-management') }}">Admin Management</a></li>
                    <li><a href="{{ route('user-management') }}">User Management</a></li>
                    <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                    <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                    <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                    <li><a href="{{ url('admin-chatsupport') }}">chat support</a></li>
                    <li><a href="{{ route('setting')}}">Settings</a></li>
                </ul>
            </nav>
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <li class="sign-out"><a href="{{ route('login') }}">Sign Out</a></li>
        </aside>

        <section class="admin-content">
            <h2 class="section-heading">Announcement</h2>
            
                <!-- Filter Bar -->
            <div class="announcement-filter">
            <label for="status-filter">Search:</label><input type="text" id="announcement-search" placeholder="Search...">
            <label for="status-filter">Status:</label>
            <select id="status-filter">
                <option value="all">All</option>
                <option value="active">Active</option>
                <option value="disabled">Disabled</option>
            </select>

            <div class="add-announcement-button">
                <button id="openModalButton">Add Announcement</button>
            </div>

             
            </div>

            <div class="announcement-table">
    <table>
        <thead>
            <tr>
                <th>Announcement Title</th>
                <th>Type (Text/Image)</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status (Active/Disabled)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- You can add announcement rows here -->
            <tr>
                <td>Announcement 1</td>
                <td>Text</td>
                <td>2023-09-18</td>
                <td>2023-09-25</td>
                <td>Active</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            <tr>
                <td>Announcement 2</td>
                <td>Image</td>
                <td>2023-09-20</td>
                <td>2023-09-27</td>
                <td>Disabled</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>

    </section>

<style>
    
</style>

        <!-- Add Announcement Modal -->
        <div id="addAnnouncementModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2>Add Announcement</h2>
                <form id="announcementForm">
                    <label for="announcementTitle">Title of the announcement:</label>
                    <input type="text" id="announcementTitle" name="announcementTitle" required><br><br>

                    <label for="announcementType">Type of announcement (Text/Image):</label>
                    <select id="announcementType" name="announcementType" required>
                        <option value="text">Text</option>
                        <option value="image">Image</option>
                    </select><br><br>

                    <label for="announcementContent">Enter content of announcement:</label>
                    <textarea id="announcementContent" name="announcementContent" required></textarea><br><br>

                    <label for="announcementImage">Upload Image (if applicable):</label>
                    <input type="file" id="announcementImage" name="announcementImage"><br><br>

                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate" name="startDate" required><br><br>

                    <label for="endDate">End Date:</label>
                    <input type="date" id="endDate" name="endDate" required><br><br>

                    <label for="announcementStatus">Set Status (Active/Disabled):</label>
                    <select id="announcementStatus" name="announcementStatus" required>
                        <option value="active">Active</option>
                        <option value="disabled">Disabled</option>
                    </select><br><br>

                    <button type="submit">Add Announcement</button>
                </form>
            </div>
        </div>

        <!-- Your JavaScript code for the modal and form handling here -->
        <script>
            // Get the modal element
            var modal = document.getElementById('addAnnouncementModal');

            // Get the button that opens the modal
            var addButton = document.querySelector('.add-announcement-button button');

            // Get the <span> element that closes the modal
            var closeModal = document.getElementById('closeModal');

            // When the user clicks the "Add Announcement" button, open the modal
            addButton.onclick = function () {
                modal.style.display = 'block';
            }

            // When the user clicks the <span> (x) or outside the modal, close it
            closeModal.onclick = function () {
                modal.style.display = 'none';
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            // Add event listener for form submission
            var announcementForm = document.getElementById('announcementForm');

            announcementForm.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent the form from submitting normally

                // Get form data and do something with it (e.g., send it to the server via AJAX)
                var formData = new FormData(announcementForm);

                // Replace this with your own logic to handle form data
                // Example: Send data to the server using fetch API
                fetch('/your-server-endpoint', {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response from the server here
                        // You can close the modal or display a success message, etc.
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        </script>
    </div>

</div>
</body>
</html>
