<div>
    <main id="main" class="main">
        <div class="container">
            <ul class="nav nav-tabs" id="notificationTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#allNotifications">
                        <i class="fas fa-bell"></i> All Notifications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#unreadNotifications">
                        <i class="fas fa-envelope-open"></i> Unread
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#notificationSettings">
                        <i class="fas fa-cog"></i> Notification Settings
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Tab 1: All Notifications -->
                <div class="tab-pane fade show active" id="allNotifications">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Message</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody id="notification-content">
                            <tr>
                                <th scope="row">1</th>
                                <td>Avail</td>
                                <td>Sali, Khay Abdilla has availed gym-use.</td>
                                <td>2023-09-18 14:25:57</td>
                            </tr>
                            <!-- Add more notification items here -->
                        </tbody>
                    </table>
                </div>
                <!-- Tab 2: Unread Notifications -->
                <div class="tab-pane fade" id="unreadNotifications">
                    <h2>Unread Notifications</h2>
                    <p>Welcome to the Unread Notifications tab. Here, you can view all your unread notifications.</p>
                    <!-- Add more unread notification items here -->
                </div>
                <!-- Tab 3: Notification Settings -->
                <div class="tab-pane fade" id="notificationSettings">
                    <h2><i class="fas fa-cog"></i> Notification Settings</h2>
                    <p>Welcome to the Notification Settings tab. Here, you can customize your notification preferences.</p>
                    <form>
                        <div class="form-group">
                            <label for="emailNotifications">
                                <i class="fas fa-envelope"></i> Email Notifications
                            </label>
                            <select class="form-control" id="emailNotifications">
                                <option value="enabled">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="notificationFrequency">
                                <i class="fas fa-clock"></i> Notification Frequency
                            </label>
                            <select class="form-control" id="notificationFrequency">
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Settings
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
</div>
