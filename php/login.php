<?php
session_start();
require_once('../include/connection.php');

if(isset($_POST['login'])){
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    // Prepare user query
    $query_user = "SELECT * FROM userdetails WHERE username=? LIMIT 1";
    $stmt_user = mysqli_prepare($connection, $query_user);
    mysqli_stmt_bind_param($stmt_user, "s", $Username);
    mysqli_stmt_execute($stmt_user);
    $result_user = mysqli_stmt_get_result($stmt_user);

    // Prepare admin query
    $query_admin = "SELECT * FROM admindetails WHERE username=? LIMIT 1";
    $stmt_admin = mysqli_prepare($connection, $query_admin);
    mysqli_stmt_bind_param($stmt_admin, "s", $Username);
    mysqli_stmt_execute($stmt_admin);
    $result_admin = mysqli_stmt_get_result($stmt_admin);

    // Check user authentication
    if($record_user = mysqli_fetch_assoc($result_user)){
        if($record_user['password'] == $Password) {
            $_SESSION['username'] = $record_user['username'];
            $_SESSION['role'] = 'user';
            header("Location:../php/home.php");
            exit;
        }   
    }

    // Check admin authentication
    if($record_admin = mysqli_fetch_assoc($result_admin)){
        if($record_admin['password'] == $Password) {
            $_SESSION['username'] = $record_admin['username'];
            $_SESSION['role'] = 'admin';
            header("Location:../php/admin_home.php");
            exit;
        }
    }

    // Display error message if login fails
    $error_message = "Your login failed! Username or password is incorrect";
} 
mysqli_close($connection);
?>

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
                <?php if(isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
        </div>

        <div class="rightbox"> </div>
    </div>
</body>
</html>