<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) // Check if user is logged in
{
    header("Location: login.php");// Redirect to login page if not logged in
    exit;
}
else {
    if (isset($_POST["profile"])) {
        header("Location: profile.php");
    }
    else if (isset($_POST["logout"])) {
        require_once('../include/process-logout.php');
    }
}



$username = $_SESSION['username'];// Access username from session
// $email = $_SESSION['email'];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apexx | Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/feedback.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1d03506f8.js" crossorigin="anonymous"></script>
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
                        <li><a href="about.html">AboutUS</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
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
<br><br><br><br><br><br><br><br>

<div class="container">
      <div class="wrapper">
        <p class="text">Rate your experience !</p>
        <p class="smalltxt">
          We highly value your feedback! kindly take a moment to rate your
          experience.
        </p>
        <div class="emoji">
          <div>😩</div>
          <div>😐</div>
          <div>🙂</div>
          <div>😃</div>
          <div>😍</div>
        </div>
      </div>
      <textarea
        class="textarea"
        cols="30"
        rows="5"
        placeholder="Tell us about your experience!"
      ></textarea>

      <a href="#" class="btn" onclick="openPopup()">Send</a>
    </div>
    <div class="popup" id="popup">
      <img src="../resources/tick.jpg" />
      <h2>Thank You !</h2>
      <p>Your feedback has been successfully submitted.</p>
      <button type="button" onclick="closePopup()">OK</button>
    </div>
<script src="../js/feedback.js"></script>


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