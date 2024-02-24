<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ticket details from URL parameters
$ticket_ID = $_GET['id'];
$subject = $_GET['subject'];
$message = $_GET['message'];
$category = $_GET['category'];
$priority = $_GET['priority'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/header+footer.css" rel="stylesheet" type="text/css">
    <link href="../css/reply_ticket.css" rel="stylesheet" type="text/css">
    <title>Reply to Ticket</title>
</head>
<body>
    <header>
      <!-- Company Logo and Title -->
      <div class="logo-container">
        <img src="../resources/logo.png" alt="Company Logo" />
        <div class="title-container">
          <h1>ABC Support Desk</h1>
        </div>
      </div>

      <!-- Profile Icon -->
      <div class="profile-icon-container">
        <a href="#"><img src="../resources/user.png" alt="Profile Icon" /></a>
      </div>
    </header>

    <!-- Navigation Bar -->
    <nav>
      <a href="#">Home</a>
      <div class="dropdown">
        <a href="#">Tickets ▾</a>
        <div class="dropdown-content">
          <a href="#">Submit a Ticket</a>
          <a href="#">View past Tickets</a>
        </div>
      </div>
      <a href="article.html">Knowledge Base</a>
      <a href="#">Contact</a>
      <a href="#">Feedback</a>
    </nav>
    <h2>Reply to Ticket</h2>

    <form method="post" action="submit_reply.php">
        <label for="ticket_ID">Ticket ID:</label>
        <input type="text" id="ticket_ID" name="ticket_ID" value="<?php echo $ticket_ID; ?>" readonly><br>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>" readonly><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" readonly><?php echo $message; ?></textarea><br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo $category; ?>" readonly><br>

        <label for="priority">Priority:</label>
        <input type="text" id="priority" name="priority" value="<?php echo $priority; ?>" readonly><br>

        <label for="reply">Your Reply:</label>
        <textarea id="reply" name="reply" required></textarea><br>

        <input type="submit" value="Submit Reply">
    </form><br>
    <footer>
      <p>© 2024 ABC Support Desk. All rights reserved.</p>
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

