<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}

// Include your database connection file
include_once "../include/connection.php";

// Retrieve ticket details from the form
$subject = $_POST['subject'];
$message = $_POST['message'];
$category = $_POST['category'];
$priority = $_POST['priority'];

// Retrieve username from session
$username = $_SESSION['username'];

// Prepare SQL statement to insert ticket details into the database
$sql = "INSERT INTO ticket (subject, message, category, priority, username) VALUES ('$subject', '$message', '$category', '$priority', '$username')";

// Execute the SQL statement
if (mysqli_query($connection, $sql)) {
    // Display alert box
    echo "<script>alert('Ticket created successfully');</script>";
    // Log to console for debugging
    echo "<script>console.log('Alert displayed');</script>";
    // Redirect user to user-ticket.php
    header("Location: ../php/user-ticket.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>
