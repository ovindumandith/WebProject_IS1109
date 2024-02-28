<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Include database connection file
require_once('../include/connection.php');

// Retrieve user information from the database
$username = $_SESSION['username'];
$query = "SELECT * FROM userdetails WHERE username = '{$username}'";
$result = mysqli_query($connection, $query);

// Check if the query was successful and if user exists
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Handle case where user data is not found
    $error_message = "User data not found.";
}

// Close database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile Page</title>
    <link rel="stylesheet" href="../css/profile-user.css">

    <link rel="stylesheet" href="../css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1d03506f8.js" crossorigin="anonymous"></script>
    
</head>

<body><header>
    <nav>
            <div class="navbar-outerbox">
                <div class="logo-box">
                    <a href="home.php"><img src="../resources/logos/appex-text-logo.png" alt="logo"></a>
                </div>
                <div class="menu-and-userimage-box">
                    <ul class="navbar-menu-names">
                        <li><a href="home-new.html">Home</a></li>
                        <li><a href="knowledgebase.html">Knowledgebase</a></li>
                        <li><a href="tickets.html">Tickets</a></li>
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
        </nav></header><br>
<div class="profile-container">
    <h1>Welcome, <?php echo ucfirst($user['username']); ?>!</h1>
    <div class="profile-details">
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>FirstName:</strong> <?php echo $user['firstName']; ?></p>
        <p><strong>LastName:</strong> <?php echo $user['lastName']; ?></p>
        <div id="passwordSection">
            <p><strong>Password:</strong> <span id="password"><?php echo '********'; ?></span></p><br><br><br>
            <button id="togglePasswordBtn">Show Password</button>
        </div>
        <!-- Add more profile information fields as needed -->

        <!-- Button for updating profile details -->
        <form action="update-userprofile.php" method="post">

        <button id="updateProfileBtn">Update Profile</button></form>
    </div>
</div>

<script src="../js/show-password.js"></script>
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
