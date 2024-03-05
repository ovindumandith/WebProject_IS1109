<?php
    if(isset($_POST["signup"])){
        header("Location: register.php");
    }
    else if(isset($_POST["login"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apexx Solutions</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="outerbox">
        <div class="landing-navbar">
            <div class="logo">
                <img src="../resources/logos/Untitled-11-ligtblue.png" alt="">
            </div>
            <div class="menu-box">
                <ul class="landing-navbar-menu-names">
                    <li><a href="#">AboutUS</a></li>
                    <li><a href="#">Downloads</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                    
            </div>    
        </div>

        <div class="middle-content">
            <div class="company-name">
                <h1>Apexx solutions</h1>
                <h3>Make it smarter</h3>
            </div>
            
            <p>
  <span class="dropcap">W</span>elcome to our technical support system company, where reliability meets expertise. We specialize in providing seamless solutions for all your tech-related queries, ensuring your systems run smoothly around the clock. Trust us to be your dedicated partner in navigating the digital landscape with ease.
</p>

                <form action="index.php" method="post">
                    <button id="signup-button" type="submit" name="signup"><span>+</span>Join Us</button>
                    <button id="login-button" type="submit" name="login">Login</button>
                </form>         
        </div>    
    </div>
    
    
</body>
</html>