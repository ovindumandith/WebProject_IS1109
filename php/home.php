<?php
session_start(); // Start the session

if (!isset($_SESSION['username'])) { // Check if user is logged in
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
} else if ($_SESSION['role'] !== 'user') { // Check if user role is not customer
    header("Location: login.php"); // Redirect to login page if user role is not customer
    exit;
} else {
    if (isset($_POST["profile"])) {
        header("Location: profile.php");
        exit;
    } else if (isset($_POST["logout"])) {
        require_once('../include/process-logout.php');
        exit;
    }
}

$username = $_SESSION['username']; // Access username from session
// $email = $_SESSION['email'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apexx | Home</title>
    <link rel="stylesheet" href="../css/home.css">
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
                        <li><a href="../php/user-feedback.php">Feedback</a></li>
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
        <!-- Navigation bar Ends here********-->

        <!-- Hero-section starts -->
        <div class="hero">
            <img src="../resources/images/background-images/hero-background-3-nomorecolors.png" alt="">
            <div class="hero-align-box">
                <div class="hero-content">
                    <h1>How can we help you?</h1>
                    <p>Search here to get answers to your questions</p>
                    <div class="search-sec">
                        <input type="search" placeholder="Search the Doc" id="search-bar" />
                        <i class="bx bx-search icon-search"></i>
                        <input type="submit" value="Search" id="search-button" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero-section Ends here********* -->
    

    <!-- ********************* ------------overlap section - (9 grid boxes)--------- *********************** -->
    <div class="overlap-section">
        <div class="name-boxes">
            <!-- ---------------------------------------row 1----------------------------------------------- -->
            <button class="nameboxing-1">
                <i class="bx bx-data"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Knowledgebase</div>
                </div>
            </button>
            <button class="nameboxing-2">
                <i class="bx bx-envelope"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Community Forums</div>
                </div>
            </button>
            <button class="nameboxing-3">
                <i class="fa-regular fa-folder"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Documentation</div>
                </div>
            </button>
            <!-- ---------------------------------------row 2----------------------------------------------- -->
            <button class="nameboxing-4">
                <i class="bx bx-cog"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Working with Docs</div>
                </div>
            </button>
            <button class="nameboxing-5">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Getting Started</div>
                </div>
            </button>
            <button class="nameboxing-6">
                <i class="bx bx-file"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Account Management</div>
                </div>
            </button>
            <!-- ---------------------------------------row 3----------------------------------------------- -->
            <button class="nameboxing-7">
                <i class="bx bx-cloud-lightning"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Productivity</div>
                </div>
            </button>
            <button class="nameboxing-8">
                <i class="bx bx-file-find"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Docs in Help Scout</div>
                </div>
            </button>
            <button class="nameboxing-9">
                <i class="bx bx-chat"></i>
                <div class="single-namebox-text">
                    <div class="namebox-text-main">Formatting Content</div>
                </div>
            </button>
        </div>
    </div>
    <!-- ********************* ------------overlap section End--------- *********************** -->


    <!-- ------------------------Faq accordion---------------------------- -->
    <div class="accordion">
        <div class="accordion-topic">Frequently Asked Questions</div>
        <div class="section" id="section1">
            <div class="header" id="header1">
                <span class="faq-header-text">Question 1</span><span><i class="fa-solid fa-circle-chevron-down"></i></span>
            </div>
            <div class="content" id="content1">
                <p>Here is the content of Question 1</p>
            </div>
        </div>

        <div class="section" id="section2">
            <div class="header" id="header2">
                <span class="faq-header-text">Question 2</span><span><i class="fa-solid fa-circle-chevron-down"></i></span>
            </div>
            <div class="content" id="content2">
                <p>Here is the content of Question 2</p>
            </div>
        </div>

        <div class="section" id="section3">
            <div class="header" id="header3">
                <span class="faq-header-text">Question 3</span><span><i class="fa-solid fa-circle-chevron-down"></i></span>
            </div>
            <div class="content" id="content3">
                <p>Here is the content of Question 3</p>
            </div>
        </div>

        <div class="section" id="section1">
            <div class="header" id="header1">
                <span class="faq-header-text">Question 4</span><span><i class="fa-solid fa-circle-chevron-down"></i></span>
            </div>
            <div class="content" id="content1">
                <p>Here is the content of Question 4</p>
            </div>
        </div>

        <div class="section" id="section2">
            <div class="header" id="header2">
                <span class="faq-header-text">Question 5</span><span><i class="fa-solid fa-circle-chevron-down"></i></span>
            </div>
            <div class="content" id="content2">
                <p>Here is the content of Question 5</p>
            </div>
        </div>
      
    </div>


    <!-- ------------------------Faq accordion ends---------------------------- -->


    <!-- ******************--------------section 3-----------------**************** -->

    <div class="section3-background">
        <div class="section-3">
            <div class="sec3-heading">
                <div class="sec3-heading-topic">Recommended Topics</div>
                <div class="sec3-heading-para">
                    Loaded with awesome features like Documentation, Knowledgebase,
                    <br />Forum & more!
                </div>
            </div>
            <div class="sec3-boxes">
                <div class="sec3-boxes-single box1">
                    <div class="sec3-boxes-icon">
                        <img id="sec-3-icon1" src="../resources/icons/section-3-icons/download_image_1707757618825-removebg.png" alt="">
                    </div>
                    <div class="sec3-boxes-title">Getting Started</div>
                    <div class="sec3-boxes-points">
                        <span>-</span> <a href="#">Welcome to Ghost</a><br />
                        <span>-</span> <a href="#">Writing posts with Ghost</a><br />
                        <span>-</span> <a href="#">Publishing options</a><br />
                        <span>-</span> <a href="#">Managing admin settings</a><br />
                        <span>-</span> <a href="#">Organising your content</a>
                    </div>
                </div>
                <div class="sec3-boxes-single box2">
                    <div class="sec3-boxes-icon">
                        <img id="sec-3-icon2" src="../resources/icons/section-3-icons/download_image_1707758713783-removebg-preview.png" alt="">
                    </div>
                    <div class="sec3-boxes-title">Advanced Usage</div>
                    <div class="sec3-boxes-points">
                        <span>-</span> <a href="#">Getting started</a><br />
                        <span>-</span> <a href="#">Become a Pro</a><br />
                        <span>-</span> <a href="#">Admin & Billing</a><br />
                        <span>-</span> <a href="#">Mobile App</a><br />
                        <span>-</span> <a href="#">Guides</a>
                    </div>
                </div>
                <div class="sec3-boxes-single box3">
                    <div class="sec3-boxes-icon">
                        <img id="sec-3-icon3" src="../resources/icons/section-3-icons/download_image_1707758851093-removebg-preview.png" alt="">
                    </div>
                    <div class="sec3-boxes-title">Knowledge Base</div>
                    <div class="sec3-boxes-points">
                        <span>-</span> <a href="#">Organising content in Ghost</a><br />
                        <span>-</span> <a href="#">Using the editor</a><br />
                        <span>-</span> <a href="#">General publication settings</a><br />
                        <span>-</span> <a href="#">Publishing Options</a><br />
                        <span>-</span> <a href="#">Knowledge Base</a>
                    </div>
                </div>
                <div class="sec3-boxes-single box4">
                    <div class="sec3-boxes-icon">
                        <img id="sec-3-icon4" src="../resources/icons/section-3-icons/download_image_1707758936907-removebg-preview.png" alt="">
                    </div>
                    <div class="sec3-boxes-title">User Settings</div>
                    <div class="sec3-boxes-points">
                        <span>-</span> <a href="#"></a>How do I reset my password<br />
                        <span>-</span> <a href="#">Managing your team</a><br />
                        <span>-</span> <a href="#">Can I add my social accounts</a><br />
                        <span>-</span> <a href="#">Imports and exports</a><br />
                        <span>-</span> <a href="#">Design Settings</a>
                    </div>
                </div>
            </div>
            <div class="sec3-lower-para">
                <a href="#">Want to know more or have a Question?</a>
            </div>
        </div>    
    </div>
    
    <!-- ******************--------------section3 End-----------------**************** -->


     <!-- ******************--------------section6-----------------**************** -->
     <div class="section-6">

        <div class="section-6-box">
            <div class="sec6-title">
                Great Customer <br />Relationships start here
            </div>
            <div class="sec6-searchbar-section">
                <div class="sec6-searchbar-section-upper">
                    <input id="sec6-search-input" type="email" placeholder="Your work email" />
                    <div class="sec6-button">
                        <input id="sec6-button-input" type="submit" value="Get Started" />
                    </div>
                </div>

                <div class="sec6-searchbar-tags">
                    <div class="sec6-searchbar-tag-single">
                        <span><i class="fa-solid fa-check"></i></span>Messenger
                    </div>
                    <div class="sec6-searchbar-tag-single">
                        <span><i class="fa-solid fa-check"></i></span>Product Tours
                    </div>
                    <div class="sec6-searchbar-tag-single">
                        <span><i class="fa-solid fa-check"></i></span>Inbox and more
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ******************--------------section6 End-----------------**************** -->



    <!-- ******************--------------section5-----------------**************** -->
    <div class="section-5">
        <div class="section5-box">
            <div class="sec5-heading">
                <div class="sec5-heading-topic">Our Team</div>
                <div class="sec5-heading-para">
                    Our team is just an email away ready to answer your questions
                </div>
            </div>
            <div class="sec5-circles">
                <div class="sec5-circles-single">
                    <div class="sec5-circles-image">
                        <a href="https://www.linkedin.com/in/kavinda-dewmith-1747b8268"><img src="../resources/images/group-member-photos/Untitled-2.png" /></a>
                    </div>
                    <div class="sec5-circles-name">Kavinda Dewmith</div>
                    <div class="sec5-circles-position">Senior developer</div>
                </div>
                <div class="sec5-circles-single">
                    <div class="sec5-circles-image">
                        <a href="https://www.linkedin.com/"><img src="../resources/images/group-member-photos/Untitled-1.png" /></a>
                    </div>
                    <div class="sec5-circles-name">Ovindu Deshan</div>
                    <div class="sec5-circles-position">Senior developer</div>
                </div>
                <div class="sec5-circles-single">
                    <div class="sec5-circles-image">
                        <a href="https://www.linkedin.com/"><img src="../resources/images/group-member-photos/Untitled-5.png" /></a>
                    </div>
                    <div class="sec5-circles-name">Sachini Dilhara</div>
                    <div class="sec5-circles-position">Senior developer</div>
                </div>
                <div class="sec5-circles-single">
                    <div class="sec5-circles-image">
                        <a href="https://www.linkedin.com/"><img src="../resources/images/group-member-photos/Untitled-3.png" /></a>
                    </div>
                    <div class="sec5-circles-name">Ajay Prabash</div>
                    <div class="sec5-circles-position">Senior developer</div>
                </div>
                <div class="sec5-circles-single">
                    <div class="sec5-circles-image">
                        <a href="https://www.linkedin.com/"><img src="../resources/images/group-member-photos/Untitled-4.png" /></a>
                    </div>
                    <div class="sec5-circles-name">Hamdi Hamza</div>
                    <div class="sec5-circles-position">Senior developer</div>
                </div>
            </div>
        </div>
    </div><br>
    <!-- ******************--------------section5 End-----------------**************** -->


   





    <!-- ********************* ------------footer section start--------- *********************** -->
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