<?php
session_start();

// Check if the username session variable is set
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Get the username from the session
} else {
    // Handle the case where the username is not set (e.g., redirect to login page)
    header("Location: login.php");
    exit; // Stop further execution
}

// Include database connection
require_once('../include/connection.php');

// Prepare and execute SQL statement to retrieve user details
$stmt = $connection->prepare("SELECT email FROM userdetails WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if($row) {
    $email = $row['email']; // Get the email from the database
} else {
    // Handle the case where the email is not found in the database
    // You can redirect to an error page or handle it according to your application's logic
    echo "Error: Email not found for username: $username";
    exit; // Stop further execution
}

// Close the statement
$stmt->close();
$connection->close();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once('../include/connection.php');

    // Prepare and bind the SQL statement
    $stmt = $connection->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $feedback);

    // Set parameters and execute
    $name = $username; // Use username as name
    $feedback = $_POST['feedback'];

    // Execute the statement
    if ($stmt->execute()) {
        // Feedback submitted successfully
        echo "Thank you for your feedback!";
    } else {
        // Error occurred while submitting feedback
        echo "Error: " . $connection->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $connection->close();
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apexx | Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/feedback.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1d03506f8.js" crossorigin="anonymous"></script>
    <style>
  .feedback-form-container {
        max-width: 600px; /* Increase the max-width */
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-align: center;
    }

.feedback-form-container h2 {
  margin-bottom: 20px;
  font-size: 24px;
}

.form-group {
  margin-bottom: 20px;
  text-align: left;
}

.form-group label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

.form-group textarea {
  height: 100px;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button[type="submit"]:hover {
  background-color: #007bff;
}

    </style>
</head>

<body>

        <!-- Navigation bar Start-->
        <nav>
            <div class="navbar-outerbox">
                <div class="logo-box">
                    <a href="home.php"><img src="../resources/logos/appex-text-logo.png" alt="logo"></a>
                </div>
                <div class="menu-and-userimage-box">
                    <ul class="navbar-menu-names">
                        <li><a href="../php/home.php">Home</a></li>
                        <li><a href="../php/knowledgebase.php">Knowledgebase</a></li>
                        <li><a href="../php/user-ticket.php">Tickets</a></li>
                        <li><a href="../php/user-feedbackt.php">Feedback</a></li>
                        <li><a href="#">AboutUS</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <div class="userimage">
                        <img src="../resources/images/userimage.png" alt="">
                        <div class="dropdown-content">
                            <div class="username"><?php echo ucfirst($username); ?></div>
                            <form action="home.php" method="post">
                                <button type="submit" name="profile" id="profile-button">Profile</button>
                                <button type="submit" name="logout" id="logout-button">Logout</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
<br><br>

<div class="feedback-form-container">
  <h2>Feedback Form</h2>
  <form id="feedback-form" action="submit_feedback.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $username; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="feedback">Feedback:</label>
      <textarea id="feedback" name="feedback" rows="5" required></textarea>
    </div>
    <button type="submit">Submit Feedback</button>
  </form>
</div>




        <footer>
        <div class="footer-top">    <!--//Footer top.........-->

            <div class="footer-top-left">
                <p>
                    <a href="about.html">About</a>
                    <a href="contact-us.html">Contact Us</a>
                    <a href="privacy-policy.html">Privacy Policy</a>
                    <a href="faq.html">FAQs</a>
                    <a href="knowledgebase.html">Knowledgebase</a>
                    <a href="team.html">Team</a>
                </p>
            </div>
            <!-- .................. -->
            <div class="footer-top-right">
                <img src="../resources/logos/Untitled-14-whitepng.png" alt="" id="footer-logo">
                <div class="logo-text">
                    <span class="logo-text-head">Apexx Solutions</span>
                    <span class="logo-text-sub">Make it smarter</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">     <!--//Footer bottom.........-->
            
            <div class="footer-bottom-left">
                <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                <a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a> 
            </div>
            <!-- ................... -->
            <div class="footer-bottom-right">
                <p>© 2024 Apexx Solutions (pvt)Ltd , located in Sri Lanka. All rights reserved. </p>
            </div>

        </div> 
    </footer>