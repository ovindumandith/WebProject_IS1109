<?php
session_start();

// Check if the username session variable is set
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // Get the username from the session
} else {
    // Handle the case where the username is not set (e.g., redirect to login page)
    header("Location: login.php");
    exit; // Stop further execution
}

// Include database connection
require_once('../include/connection.php');

// Prepare and execute SQL statement to retrieve user details
$stmt = $connection->prepare("SELECT email FROM userdetails WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if($row) {
    $email = $row['email']; // Get the email from the database
} else {
    // Handle the case where the email is not found in the database
    // You can redirect to an error page or handle it according to your application's logic
    echo "Error: Email not found for username: $username";
    exit; // Stop further execution
}

// Close the statement
$stmt->close();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the SQL statement to insert feedback
    $stmt = $connection->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $feedback);

    // Set parameters and execute
    $name = $username; // Use username as name
    $feedback = $_POST['feedback'];

    // Execute the statement
    if ($stmt->execute()) {
        // Feedback submitted successfully
        echo '<script>alert("Thank you for your feedback!");';
        echo 'window.location.href = "../php/user-feedback.php";</script>';
    } else {
        // Error occurred while submitting feedback
        echo "Error: " . $connection->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$connection->close();
?>
