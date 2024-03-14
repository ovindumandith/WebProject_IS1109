
<?php
// Include any necessary files and start session if not already started
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Include database connection file
include '../include/connection.php'; // Adjust the path as per your file structure

// Retrieve admin profile data from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM admindetails WHERE username = '$username'";
$result = mysqli_query($connection, $sql);

// Check if the query was successful
if ($result) {
    $adminData = mysqli_fetch_assoc($result);
} else {
    // Handle the case where the query fails
    $errorMessage = "Error: " . mysqli_error($connection);
    // You can display this error message or handle it in another way
}

// Close the database connection
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap"
    />

    <link href="../css/header+footer.css" rel="stylesheet" type="text/css" />
    <link href="../css/admin_profile.css" rel="stylesheet" type="text/css">
    <script src="script.js" defer></script>
    <title>Admin Profile</title>
  </head>

  <body>
    <header>
      <!-- Company Logo and Title -->
      <div class="logo-container">
        <img src="../resources/logo.png" alt="Company Logo" />
        <div class="title-container">
          <h1 style="color:white">Apexx Solutions Admin Panel</h1>
        </div>
      </div>

      <!-- Profile Icon -->
<div class="profile-icon-container">
    <img src="../resources/user.png" alt="Profile Icon" />
    <div class="profile-options">
        <a href="../php/admin_profile.php">Admin Profile</a>
<form action="../php/admin_logout.php" method="post">
    <button type="submit" name="logout">Logout</button>
</form>
    </div>
</div>
    </header>

    <!-- Navigation Bar -->
    <nav>
      <a href="#">Home</a>
      <div class="dropdown">
        <a href="#">Tickets ▾</a>
        <div class="dropdown-content">
      </div>
      <a href="article.html">Knowledge Base</a>
      <a href="#">Contact</a>
      <a href="../php/view_feedback.php">Feedback</a>
    </nav>


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