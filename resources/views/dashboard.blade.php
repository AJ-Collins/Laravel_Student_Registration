<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* General Reset & Variables */
    :root {
      --primary-color: #1a237e;
      --secondary-color: #0d47a1;
      --success-color: #2e7d32;
      --warning-color: #ed6c02;
      --danger-color: #d32f2f;
      --background-color: #f0f7ff;
      --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      --transition-speed: 0.3s;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Root Styling */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--background-color);
      color: #333;
      line-height: 1.6;
    }

    .container {
      max-width: 1400px;
      margin: auto;
      padding: 0 20px;
    }

    /* Navigation Bar */
    nav {
      background: #fff;
      box-shadow: var(--card-shadow);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .nav-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .logo h1 {
      font-size: 1.75rem;
      color: var(--primary-color);
      font-weight: 600;
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .notification-bell {
      position: relative;
      cursor: pointer;
    }

    .notification-count {
      position: absolute;
      top: -8px;
      right: -8px;
      background: var(--danger-color);
      color: white;
      border-radius: 50%;
      width: 18px;
      height: 18px;
      font-size: 0.75rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .profile-info {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      background: #f5f5f5;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      cursor: pointer;
      text-decoration: none;
      transition: background-color var(--transition-speed);
    }

    .profile-info:hover {
      background: #e0e0e0;
    }

    /* Dashboard Grid */
    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.5rem;
      margin: 2rem 0;
    }

    /* Stat Cards */
    .stat-card {
      background: #fff;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: var(--card-shadow);
      transition: all var(--transition-speed);
      position: relative;
      overflow: hidden;
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: currentColor;
      opacity: 0.5;
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
    }

    .stat-card .icon {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .stat-card p {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 0.5rem;
    }

    .stat-card h2 {
      font-size: 2rem;
      font-weight: 600;
    }

    /* Info Cards */
    .info-section {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .info-card {
      background: #fff;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: var(--card-shadow);
    }

    .info-card h3 {
      font-size: 1.25rem;
      color: var(--primary-color);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .info-card p {
      margin: 0.75rem 0;
      font-size: 0.95rem;
      color: #555;
    }

    .info-card a {
      color: var(--secondary-color);
      text-decoration: none;
      display: block;
      margin: 0.5rem 0;
      transition: color var(--transition-speed);
    }

    .info-card a:hover {
      color: var(--primary-color);
      text-decoration: underline;
    }

    /* Alert */
    .alert {
      background: #fff;
      border-radius: 12px;
      padding: 1rem 1.5rem;
      margin: 2rem 0;
      border-left: 4px solid var(--danger-color);
      display: flex;
      align-items: center;
      gap: 1rem;
      box-shadow: var(--card-shadow);
    }

    .alert i {
      color: var(--danger-color);
      font-size: 1.5rem;
    }
   /* Notification Panel Styles */
.notification-panel {
    display: none; /* Initially hidden */
    position: absolute;
    top: 50px;
    right: 10px;
    width: 320px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    z-index: 1002;
    font-family: Arial, sans-serif;
}

/* Header Section */
.notification-header {
    display: flex;
    justify-content: space-between;
    padding: 12px 16px;
    background-color: #f5f5f5;
    border-bottom: 1px solid #ddd;
}

.notification-header h4 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

.notification-header button {
    background: none;
    border: none;
    color: var(--primary-color);
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: color 0.3s;
}

.notification-header button:hover {
    color: #007acc; /* Hover effect */
}

/* Notification List */
.notification-list {
    list-style: none;
    margin: 0;
    padding: 0;
    max-height: 320px;
    overflow-y: auto;
}

/* Notification Item */
.notification-item {
    padding: 12px 16px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.3s;
    cursor: pointer;
}

/* Hover effect on item */
.notification-item:hover {
    background-color: #f9f9f9;
}

/* Styling for unread notifications */
.notification-item[data-read="false"] {
    background-color: #eaf2ff; /* Different color for unread */
}

.notification-item[data-read="true"] {
    background-color: #fff; /* Default color for read */
}

/* Notification Message */
.notification-message {
    color: #333;
    font-size: 14px;
    flex: 1;
    margin-right: 10px;
}

/* Notification Timestamp */
.notification-time {
    color: #888;
    font-size: 12px;
    white-space: nowrap;
    align-self: flex-end;
}

/* Scrollbar Styling for Notification List */
.notification-list::-webkit-scrollbar {
    width: 8px;
}

.notification-list::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 4px;
}

.notification-list::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0, 0, 0, 0.2);
}

    /* Responsive Design */
    @media (max-width: 1200px) {
      .dashboard-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .info-section {
        grid-template-columns: 1fr;
      }
      
      .dashboard-grid {
        grid-template-columns: 1fr;
      }

      .nav-container {
        flex-direction: column;
        gap: 1rem;
      }
    }

    /* Animations */
    @keyframes slideIn {
      from {
        transform: translateY(20px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .dashboard-grid, .info-section, .alert {
      animation: slideIn 0.5s ease-out;
    }
  </style>
</head>
<body>
  <nav>
    <div class="container nav-container">
      <div class="logo">
        <i class="fas fa-graduation-cap fa-2x" style="color: var(--primary-color);"></i>
        <h1>School Dashboard</h1>
      </div>
      <div class="nav-actions">
        <div class="notification-bell" onclick="toggleNotifications()">
          <i class="fas fa-bell fa-lg" style="color: var(--primary-color);"></i>
          <span class="notification-count">9</span>
        </div>
        <!-- Notification Dropdown Panel -->
        <div class="notification-panel" id="notificationPanel">
          <div class="notification-header">
          <h4>Notifications</h4>
          <button onclick="markAllRead()">Mark All as Read</button>
        </div>
        <ul class="notification-list" id="notificationList">
          <li class="notification-item" data-read="false" onclick="markAsRead(this)">
            <span class="notification-message">New assignment added in your course.</span>
            <span class="notification-time">5 min ago</span>
          </li>
          <li class="notification-item" data-read="false" onclick="markAsRead(this)">
            <span class="notification-message">You have a new message.</span>
            <span class="notification-time">20 min ago</span>
          </li>
          <li class="notification-item" data-read="false" onclick="markAsRead(this)">
            <span class="notification-message">Reminder: Meeting tomorrow at 10 AM.</span>
            <span class="notification-time">1 hr ago</span>
          </li>
        </ul>
      </div>
        <a href="{{ route('profile.show', ['id' => auth()->user()->id]) }}" class="profile-info">
          <i class="fas fa-user-circle fa-lg" style="color: var(--primary-color);"></i>
          <span>{{ auth()->user()->name }}</span>
        </a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <!-- Stats Grid -->
    <div class="dashboard-grid">
      <div class="stat-card" style="color: var(--primary-color);">
        <i class="fas fa-user-edit icon"></i>
        <p>Course Applications</p>
        <h2></h2>
      </div>
      <div class="stat-card" style="color: var(--success-color);">
        <i class="fas fa-wallet icon"></i>
        <p> Fees Status</p>
        <h2>0%</h2>
      </div>
      <div class="stat-card" style="color: var(--secondary-color);">
        <i class="fas fa-chalkboard-teacher icon"></i>
        <p>My Class</p>
        <h2>50</h2>
      </div>
      <div class="stat-card" style="color: var(--warning-color);">
        <i class="fas fa-award icon"></i>
        <p>Average Grade</p>
        <h2>B</h2>
      </div>
    </div>

    <!-- Info Section -->
    <div class="info-section">
      <div class="info-card">
        <h3><i class="fas fa-calendar-alt"></i> Upcoming Events</h3>
        <p><i class="fas fa-circle fa-xs"></i> <strong>Faculty Meeting</strong> - Tomorrow 10:00 AM</p>
        <p><i class="fas fa-circle fa-xs"></i> <strong>Science Fair</strong> - Next Week</p>
        <p><i class="fas fa-circle fa-xs"></i> <strong>Final semister exam</strong> - In 2 weeks</p>
      </div>
      <div class="info-card">
        <h3><i class="fas fa-history"></i> Recent Activities</h3>
        <p><i class="fas fa-circle fa-xs"></i> New 2024 student enrolled</p>
        <p><i class="fas fa-circle fa-xs"></i> Grade updates for Mathematics for Science</p>
        <p><i class="fas fa-circle fa-xs"></i> New announcement posted</p>
      </div>
      <div class="info-card">
        <h3><i class="fas fa-link"></i> Quick Links</h3>
        <a href="#"><i class="fas fa-chevron-right fa-xs"></i> View All Courses</a>
        <a href="#"><i class="fas fa-chevron-right fa-xs"></i> Studies Management Guide</a>
        <a href="#"><i class="fas fa-chevron-right fa-xs"></i> Generate Reports</a>
      </div>
    </div>

    <!-- Alert -->
    <div class="alert">
      <i class="fas fa-exclamation-circle"></i>
      <span>There are 25 pending student applications that need your review.</span>
    </div>
  </div>

</body>
<script>
  const notificationCountElement = document.querySelector('.notification-count');
  let notificationCount = parseInt(notificationCountElement.textContent, 10);

  function toggleNotifications() {
    const panel = document.getElementById("notificationPanel");
    const isDisplayed = panel.style.display === "block"; 
    panel.style.display = isDisplayed ? "none" : "block";

    if (!isDisplayed) {
        document.addEventListener('click', handleClickOutside);
    } else {
        document.removeEventListener('click', handleClickOutside);
    }
  }

  function handleClickOutside(event) {
    const panel = document.getElementById("notificationPanel");
    const notificationBell = document.querySelector('.notification-bell');

    if (!panel.contains(event.target) && !notificationBell.contains(event.target)) {
        panel.style.display = "none"; 
        document.removeEventListener('click', handleClickOutside);
    }
  }

  // Mark individual notification as read
  function markAsRead(notification) {
    // Check if the notification is already read
    if (notification.getAttribute("data-read") === "false") {
        notification.setAttribute("data-read", "true");
        notification.style.backgroundColor = "#fff"; // Change color to read color
        updateNotificationCount(-1);
    }
  }
  // Update Notification Count
  function updateNotificationCount(change) {
    notificationCount += change;
    const countElement = document.querySelector('.notification-count');
    
    // Update count display
    if (notificationCount > 0) {
        countElement.textContent = notificationCount;
        countElement.style.display = 'inline-block';
    } else {
        countElement.style.display = 'none';
    }
  }
  // Mark all notifications as read
  function markAllRead() {
    const notifications = document.querySelectorAll('.notification-item[data-read="false"]');
    
    notifications.forEach(notification => {
        notification.setAttribute("data-read", "true");
        notification.style.backgroundColor = "#fff";
    });
    
    // Set count to zero and update the display
    notificationCount = 0;
    updateNotificationCount(0);
}
</script>
</html>