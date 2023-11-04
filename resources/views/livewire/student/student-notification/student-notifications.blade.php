<div>
<div class="container">
    <ul class="nav nav-tabs" id="notificationTabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#allNotifications">
                <i class="fas fa-bell"></i> All Notifications
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#unreadNotifications">
                <i class="fas fa-bell"></i> Unread
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings">
                <i class="fas fa-cog"></i> Notification Settings
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <!-- Tab 1: All Notifications -->
        <div class="tab-pane fade show active" id="allNotifications">
            <table class="table table-striped">
                <thead style="background-color: #990000; color: white; position: sticky; top: 0;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Message</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Notification Title 1</td>
                        <td>Notification message goes here.</td>
                        <td>2 hours ago</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Notification Title 2</td>
                        <td>Another notification message for demonstration.</td>
                        <td>1 day ago</td>
                    </tr>
                    <!-- Add more notification items here -->
                </tbody>
            </table>
        </div>

        <!-- Tab 2: Unread Notifications -->
        <div class="tab-pane fade" id="unreadNotifications">
            <h2>Unread Notifications</h2>
            <p>Welcome to the Unread Notifications tab. Here, you can view all your unread notifications.</p>
            <table class="table table-striped">
                <thead style="background-color: #990000; color: white; position: sticky; top: 0;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Message</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Unread Notification Title 1</td>
                        <td>Unread notification message goes here. This notification has not been marked as read.</td>
                        <td>1 day ago</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Unread Notification Title 2</td>
                        <td>Another unread notification message for demonstration.</td>
                        <td>2 days ago</td>
                    </tr>
                    <!-- Add more unread notification items here -->
                </tbody>
            </table>
        </div>

        <!-- Tab 3: Notification Settings -->
        <div class="tab-pane fade" id="settings">
            <h2><i class="fas fa-cog"></i> Notification Settings</h2>
            <p>Welcome to the Notification Settings tab. Here, you can customize your notification preferences.</p>
            <form>
                <div class="form-group">
                    <label for="emailNotifications"><i class="fas fa-envelope"></i> Email Notifications</label>
                    <select class="form-control" id="emailNotifications">
                        <option value="enabled">Enabled</option>
                        <option value="disabled">Disabled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="notificationFrequency"><i class="fas fa-clock"></i> Notification Frequency</label>
                    <select class="form-control" id="notificationFrequency">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Settings</button>
            </form>
        </div>
    </div>
</div>

</div>

