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

// SQL query to count rows in the reply_ticket table
$sql = "SELECT COUNT(*) AS replied_count FROM reply_ticket";

$result = $conn->query($sql);

if ($result) {
    // Fetch count
    $row = $result->fetch_assoc();
    $replied_count = $row["replied_count"];

    // Output count
    echo $replied_count;
} else {
    echo "0";
    echo "Error: " . $conn->error;
}

$conn->close();
?>
