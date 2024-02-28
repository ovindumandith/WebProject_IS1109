<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Include database connection
require_once('../include/connection.php'); // Change this to your database connection file

// Fetch all articles from the database
$query = "SELECT heading, description FROM articles";
$result = mysqli_query($connection, $query);

$articles = []; // Initialize an empty array to store articles

if ($result) {
    // Fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row; // Add each article to the array
    }
}

// Search functionality
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];

    // Perform search query
    $searchQuery = "SELECT heading, description FROM articles WHERE heading LIKE '%$searchTerm%'";
    $searchResult = mysqli_query($connection, $searchQuery);

    if ($searchResult) {
        $articles = []; // Reset articles array
        // Fetch associative array
        while ($row = mysqli_fetch_assoc($searchResult)) {
            $articles[] = $row; // Add each article to the array
        }
    }
}

$username = $_SESSION['username']; // Access username from session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apexx | Home</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/knowledgebase.css">
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
        </nav><br>

    <!-- Search bar -->
<div class="search-container">
    <input type="text" id="myInput" placeholder="Search..." />
    <button type="button" onclick="searchArticles()">Search</button>
</div>

    <!-- Articles -->
 <!-- Articles -->
    <div class="articles-container">
        <div class="articles">
            <?php if (!empty($articles)) : ?>
                <ul>
                    <?php foreach ($articles as $article) : ?>
                        <li>
                            <h3><?php echo $article['heading']; ?></h3>
                            <p><?php echo $article['description']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No articles found.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Main content -->
    <!-- Your existing HTML content -->

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
    <script src="../js/user-articlesearch.js"></script>
</body>

</html>