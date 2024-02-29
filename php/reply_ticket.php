<?php
// Database connection parameters
$servername = "localhost";
$username1 = "root";
$password = "";
$dbname = "web_test";

// Create connection
$conn = new mysqli($servername, $username1, $password, $dbname);

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
$username = $_GET['username'];

// Get reply from form submission
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reply = $_POST['reply'];

    // Insert ticket details and reply into reply_ticket table
    $sql = "INSERT INTO reply_ticket (ticket_ID, subject, message, category, priority, username, reply)
            VALUES ('$ticket_ID', '$subject', '$message', '$category', '$priority', '$username', '$reply')";

    if ($conn->query($sql) === TRUE) {
        echo "Reply submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}*/

// Close the database connection
$conn->close();
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
      <a href="../html/admin_home.html">Home</a>
      <div class="dropdown">
        <a href="../php/view_ticket.php">Tickets</a>
      </div>
      <div class="dropdown">
        <a href="../php/view_user.php">Users</a>
        <div class="dropdown-content">

        </div>
      </div>
      <a href="../html/article.html">Knowledge Base</a>

     <a href="../php/view_feedback.php">Feedback</a>
    </nav>
    <h2>Reply to Ticket</h2>

    <form method="post" action="../php/submit_reply.php">
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
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly><br>

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
