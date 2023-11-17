<div>
    <x-loading-indicator/>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tech support</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tech support</li>
                </ol>
            </nav>
        </div><!-- End Right side columns -->
        <!-- Insert Section -->
        <section class="admin-content">
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

        <!-- End Inserted Section -->

    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
