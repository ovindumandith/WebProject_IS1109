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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apexx | Ticket Submission</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/user-ticket.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1d03506f8.js" crossorigin="anonymous"></script>
    <style>/* New button container */
.button-container {
  text-align: center;
  margin-top: 20px;
}

/* New button styles */
.button-container button {
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.button-container button:hover {
  background-color: #0056b3;
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
                        <li><a href="../php/user-feedback.php">Feedback</a></li>
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
        </nav><br>
       
        <!-- Modify the HTML section to include a form -->
    <div class="container1">
        <div class="main-section">
            <h2 class="form-title">Create New Ticket</h2>
            <form action="process_ticket.php" method="POST" class="ticket-form">
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required class="form-input">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required class="form-input"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" required class="form-select">
                        <option value="General">General</option>
                        <option value="Technical">Technical</option>
                        <option value="Billing">Billing</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <select id="priority" name="priority" required class="form-select">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
        <div class="button-container">
            <form action="view_userpasttickets.php" method="POST">
                <button type="submit" name="view_tickets" class="view-button">View Past Tickets</button>
            </form>
        </div>
    </div>





<!-- PHP code to handle form submission -->



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
    <!-- ********************* ------------Footer Section Ends here--------- *********************** -->



    <script src="../js/home.js"></script>
</body>

</html>