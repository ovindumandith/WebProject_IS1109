<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS ticket_count FROM ticket";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    echo $row["ticket_count"];
} else {
    echo "0";
    echo "Error: " . $conn->error;
}

$conn->close();
?>
