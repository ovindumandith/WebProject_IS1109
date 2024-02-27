<?php
    session_start();
    require_once('../include/connection.php'); 
?>

<?php 

    if(isset($_POST['login'])){
        
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        // $login_check = false;

        $query_user = "SELECT * FROM userdetails WHERE username='{$Username}'";
        $query_admin = "SELECT * FROM admindetails WHERE username='{$Username}'";

        $result_set_user = mysqli_query($connection, $query_user);
        $result_set_admin = mysqli_query($connection, $query_admin);

        if($record_user =  mysqli_fetch_assoc($result_set_user)){
            if($record_user['password'] == $Password) {

                $_SESSION['username'] = $record_user['username'];
                $_SESSION['role'] = 'user';
                header("Location: home.php");
                exit;
            }   
        }else if($record_admin =  mysqli_fetch_assoc($result_set_admin)){
            if($record_admin['password'] == $Password) {

                $_SESSION['username'] = $record_admin['username'];
                $_SESSION['role'] = 'admin';
                header("Location: dashboard.php");
                exit;
            }
        }

        echo " alert('Your login failed! Username or password is incorrect'); ";    
    } 
?>

<?php mysqli_close($connection); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apexx | Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="body-image-box"></div>
    
    <div class="outerbox">
        <div class="leftbox">
            <img src="../resources/gif/lol-face.gif" alt="">

            <h1>Welcome back!</h1>
            <h3>Log Into your Account</h3>

            <form action="login.php" method="post">
                <input type="text" placeholder="Username" name="username" id="username">
                <input type="password" placeholder="Password" name="password" id="password">

                <a href="#" id="forgot-password">Forgot your password?</a>

                <div class="log-register-box">
                    <button type="submit" name="login" id="login">Login</button>
                    <h4>Don't you have an account? <a href="register.php" id="register-link">Register</a></h4> 
                </div>  
            </form>
        </div>

        <div class="rightbox"> </div>
    </div>
</body>
</html>