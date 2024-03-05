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

// SQL query to count rows in the userdetails table
$sql = "SELECT COUNT(*) AS registered_users_count FROM userdetails";

$result = $conn->query($sql);

if ($result) {
    // Fetch count
    $row = $result->fetch_assoc();
    $registered_users_count = $row["registered_users_count"];

    // Output count
    echo $registered_users_count;
} else {
    echo "0";
    echo "Error: " . $conn->error;
}

$conn->close();
?>
