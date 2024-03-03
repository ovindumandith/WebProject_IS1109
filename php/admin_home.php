<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap"
    />

    <link href="../css/header+footer.css" rel="stylesheet" type="text/css" />
    <link href="../css/admin_home.css" rel="stylesheet" type="text/css" />
    <title>Apexx Solutions Admin Panel</title>
</head>
<body>
    <header>
      <!-- Company Logo and Title -->
      <div class="logo-container">
        <img src="../resources/logo.png" alt="Company Logo" />
        <div class="title-container">
          <h1>Apexx Solutions Admin Panel</h1>
        </div>
      </div>

      <!-- Profile Icon -->
<div class="profile-icon-container">
    <img src="../resources/user.png" alt="Profile Icon" />
    <div class="profile-options">
        <a href="../php/admin_profile.php">Admin Profile</a>
        <form action="home.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</div>

    </header>

    <!-- Navigation Bar -->
    <nav>
      <a href="#">Home</a>
      <div class="dropdown">
        <a href="../php/view_ticket.php">Tickets</a>
      </div>
      <div class="dropdown">
        <a href="../php/view_user.php">Users</a>
        <div class="dropdown-content"></div>
      </div>
      <a href="../html/article.html">Knowledge Base</a>

      <a href="../php/view_feedback.php">Feedback</a>
    </nav>
    <br />

    <div class="search-bar">
      <input type="text" placeholder="Search..." />
      <button type="submit">Search</button>
    </div>

    <div class="admin-dashboard">
      <h2>Admin Dashboard</h2>

      <table>
        <thead>
          <tr>
            <th>Category</th>
            <th>Count</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tickets Submitted</td>
            <td id="tickets-submitted">Loading...</td>
          </tr>
          <tr>
            <td>Tickets Replied</td>
            <td id="tickets-replied">Loading...</td>
          </tr>
          <tr>
            <td>Total Collection Of Articles</td>
            <td id="total-articles">Loading...</td>
          </tr>
          <tr>
            <td>Registered Users</td>
            <td id="registered-users">Loading...</td>
          </tr>
        </tbody>
      </table>
    </div>

    <footer>
      <p>© 2024 Apexx Solutions. All rights reserved.</p>
      <div class="social-media-icons">
        <div class="icon-container">
          <a href="https://www.facebook.com/yourpage"
            ><img src="../resources/facebook.png" alt="Facebook"
          /></a>

          <a href="https://www.instagram.com/yourpage"
            ><img src="../resources/instagram.png" alt="Instagram"
          /></a>
          <a href="https://www.linkedin.com/yourpage"
            ><img src="../resources/linkedin.png" alt="LinkedIn"
          /></a>
        </div>
      </div>
    </footer>
  </body>
</html>
