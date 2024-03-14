<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_test";

// Check if form is submitted
if(isset($_POST['update'])) {
    // Retrieve form data
    $articleID = $_POST['articleID'];
    $heading = $_POST['heading'];
    $description = $_POST['description'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to update the article
    $sql = "UPDATE articles SET heading = ?, description = ? WHERE articleID = ?";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    // Bind parameters
    $stmt->bind_param("ssi", $heading, $description, $articleID);

    // Execute statement
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        echo "Error updating record: " . $stmt->error;
    } else {
        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Display alert box and redirect
        echo "<script>alert('Article updated successfully');</script>";
        header("Location: ../php/view_articles.php");
        exit;
    }
} else {
    echo "Form not submitted.";
}
?>
