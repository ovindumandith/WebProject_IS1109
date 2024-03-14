<?php
    session_start();

    $_SESSION = array();// Unset all session variables
    session_destroy();// Destroy the session

    header("Location: ./index.php");// Redirect to the landing page after logout
    exit;
?>
