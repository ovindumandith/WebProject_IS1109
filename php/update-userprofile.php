<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Include database connection file
require_once('../include/connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    // Update user information in the database
    $query = "UPDATE userdetails SET email = '{$email}', firstName = '{$firstName}', lastName = '{$lastName}' WHERE userID = '{$userID}'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // User details updated successfully
        header("Location: {$_SERVER['PHP_SELF']}?success=true");
        exit;
    } else {
        // Failed to update user details
        $error_message = "Failed to update user details.";
    }
}

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
    <title>Update details</title>
    <link rel="stylesheet" href="../css/update-userprofile.css">

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
         <h2 style="text-align: center;">Update Profile</h2>


    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
        
    <?php endif; ?>

  <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" disabled><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
        <label for="firstName">First Name:</label><br>
        <input type="text" id="firstName" name="firstName" value="<?php echo $user['firstName']; ?>"><br><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" id="lastName" name="lastName" value="<?php echo $user['lastName']; ?>"><br><br>
        <input type="submit" value="Update Profile">
    </form>
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


