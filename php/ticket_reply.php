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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ticket ID and reply from the form
    $ticket_id = $_POST["id"];
    $reply = $_POST["reply"];
    
    // Insert the reply into a new table
    $sql = "INSERT INTO ticket_replies (ticket_id, reply) VALUES ('$ticket_id', '$reply')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Reply added successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
+