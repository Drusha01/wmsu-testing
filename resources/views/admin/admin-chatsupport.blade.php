<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/Admin.css') }}">
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
                    <li><a href="{{ route('manage-content') }}">Manage Content</a></li>
                    <li><a href="{{ route('user-management') }}">User Management</a></li>
                    <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                    <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                    <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                    <li><a href="{{ url('admin-chatsupport') }}">Chat Support</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <li class="sign-out"><a href="{{ route('login') }}">Sign Out</a></li>
        </aside>

        <section class="admin-content">
            <h2 class="section-heading">Chat Support</h2>
            
            <!-- Chat Container -->
            <div id="admin-chat-container">
                <!-- Greeting message with an icon -->
                <div id="greeting-message">
                    <i class="fas fa-comment"></i>
                    <p>Hello! I am your chat support.</p>
                    <p>How can I assist you today?</p>
                </div>

                <!-- Chat messages will be displayed here -->
                <div id="chat-messages"></div>
                
                <!-- Input field for typing messages -->
                <input type="text" id="message-input" placeholder="Type your message">
                
                <!-- Button to send messages with an icon -->
                <button id="send-button">
                    <i class="fas fa-paper-plane"></i> Send
                </button>
            </div>
            <!-- End of Chat Container -->
        </section>
        <!-- End of Chat Support Section -->
    </div>

</body>
</html>
