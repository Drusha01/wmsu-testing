<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard - WMSU TEC</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
                    <li><a href="{{ route('exam-management') }}">Exam Management</a></li>
                    <li><a href="{{ route('room-management') }}">Room Management</a></li>
                    <li><a href="{{ route('manage-appointment') }}">Manage Appointment</a></li>
                    <li><a href="{{ route('manage-application') }}">Manage Applicant</a></li>
                    <li><a href="{{ route('room-assignment') }}">Room Assignment</a></li>
                    <li><a href="{{ route('admin-announcement') }}">Announcement</a></li>
                    <li><a href="{{ url('admin-chatsupport') }}">chat support</a></li>
                    <li><a href="{{ route('setting')}}">Settings</a></li>
                </ul>
            </nav>
            <label for="menu-toggle" class="menu-icon">&#9776;</label>
            <li class="sign-out"><a href="{{ route('login') }}">Sign Out</a></li>
        </aside>

        <section class="admin-content">
    <h2 class="section-heading">Chat Support</h2>
    <div class="chat-container">
        <div class="chat-table">
            <div class="chat-column recent-message">
                <h3>Recent Messages</h3>
                <div class="message" >
                    <div class="message-sender">User 1:</div>
                    <div class="message-content">Hello, I need assistance with...</div>
                </div>
                <div class="message">
                    <div class="message-sender">User 2:</div>
                    <div class="message-content">Can you help me with...</div>
                </div>
                <!-- Add more recent messages as needed -->
            </div>
            <div class="vertical-line"></div>
            <div class="chat-column active-conversation">
                <div class="active-conversation-header">
                    <h3>Active Conversation</h3>
                    <button class="end-conversation-button">End Conversation</button>
                </div>
                <div class="active-message" >
                    <div class="message-sender">User 1:</div>
                    <div class="message-content">Hello, I need assistance with...</div>
                </div>
                <!-- Add more active conversation messages as needed -->
                <div class="reply-container">
                    <textarea class="reply-textarea" placeholder="Type your reply"></textarea>
                    <button class="send-button">Send</button>
                </div>
            </div>
        </div>
    </div>
</section>




</body>
</html>
