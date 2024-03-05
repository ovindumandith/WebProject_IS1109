<?php
// Start the session and include necessary files
session_start();
include '../include/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password']; // Remember to hash the password before storing in the database for security reasons

    // Update user information in the database
    $query = "UPDATE userdetails SET email = ?, firstName = ?, lastName = ?, password = ? WHERE userID = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $email, $firstName, $lastName, $password, $userID);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // User details updated successfully
        echo "<script>alert('User details updated successfully.');</script>";
        echo "<script>window.location.href = 'profile.php';</script>";
        exit;
    } else {
        // Failed to update user details
        $error_message = "Failed to update user details.";
    }
}

// Close the database connection
mysqli_close($connection);
?>
