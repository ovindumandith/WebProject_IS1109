<?php
    session_start();

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the landing page after logout
    header("Location: ../php/index.php");
    exit;
?>
