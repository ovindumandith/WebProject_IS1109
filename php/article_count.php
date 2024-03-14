<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count rows in the articles table
$sql = "SELECT COUNT(*) AS total_articles_count FROM articles";

$result = $conn->query($sql);

if ($result) {
    // Fetch count
    $row = $result->fetch_assoc();
    $total_articles_count = $row["total_articles_count"];

    // Output count
    echo $total_articles_count;
} else {
    echo "0";
    echo "Error: " . $conn->error;
}

$conn->close();
?>
