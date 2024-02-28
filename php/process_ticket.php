<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "web_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve ticket details from form submission
$subject = $_POST['subject'];
$message = $_POST['message'];
$category = $_POST['category'];
$priority = $_POST['priority'];

// Insert ticket details into the database
$query = "INSERT INTO ticket (subject, message, category, priority) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("ssss", $subject, $message, $category, $priority);
    $stmt->execute();
    $stmt->close();
    
    // Redirect back to the home page
    header("Location: ../php/home.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
