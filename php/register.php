<?php require_once('../include/connection.php'); ?>

<?php
    if(isset($_POST['signup'])){

        $Firstname = $_POST['firstname'];
        $Lastname = $_POST['lastname'];
        $Username = $_POST['username'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];
    
        $query = "INSERT INTO userdetails (firstName,lastName,username,email,password) VALUES ('{$Firstname}','{$Lastname}','{$Username}','{$Email}','{$Password}')";
    
        $result = mysqli_query($connection,$query);
    
        if ($result){
            // echo "alert('Your account created succesfully'); ;
            header("Location: login.php");
        }
        else{
            echo "alert('Account creation failed!'); ";
        }       
    }
?>

<?php mysqli_close($connection); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apexx | Register</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="body-image-box"></div>

    <div class="outerbox">
        <div class="leftbox"> </div>

        <div class="rightbox">
            <div class="logo">
                <img src="../resources/logos/Untitled-12-blue.png" alt="" id="logo-image">
                <span id="logo-text">Apexx solutions</span>
            </div>

            <h1>Welcome to Family!</h1>
            <h3>Enter your details to join with us</h3>

            <form action="register.php" method="post">
                <!-- <input type="text" placeholder="Full Name" name="fullname" id="fullname"> -->
                <input type="text" placeholder="First Name" name="firstname" id="firstname" required>
                <input type="text" placeholder="Last Name" name="lastname" id="lastname" required>
                <input type="text" placeholder="Username" name="username" id="username" required>
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Password" name="password" id="password" required>

                <div class="register-log-box">
                    <button type="submit" name="signup" id="signup">Sign Up</button>
                    <h4>Already have an account? <a href="login.php" id="login-link">Log In</a></h4> 
                </div>  
            </form>
        </div>
    </div>
</body>
</html>