<div class="container mt-4">
        <div class="row">
            <!-- Left Column (Chat) -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Chat Support</h2>
                    </div>
                    <div class="card-body">
                        <!-- Student's message -->
                        <div class="alert alert-primary">
                            <strong>Student:</strong> Hi, I have a question about the upcoming exam.
                        </div>

                        <!-- Admin's message -->
                        <div class="alert alert-light text-right">
                            <strong>Admin:</strong> Sure, what's your question?
                        </div>

                        <!-- Add more messages as needed -->
                        <!-- Example student message -->
                        <div class="alert alert-primary">
                            <strong>Student:</strong> When is the exam date?
                        </div>

                        <!-- Example admin response -->
                        <div class="alert alert-light text-right">
                            <strong>Admin:</strong> The exam is scheduled for October 25th.
                        </div>

                        <!-- Message Input -->
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Type your message...">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column (Picture) -->
            <div class="col-md-4">
                <img src="{{asset('images/logo/tecoffice.jpg')}}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>