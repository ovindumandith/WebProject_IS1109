<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "web_test"; 

// Check if ticket ID is provided
if(isset($_GET['id'])) {
    $ticketID = $_GET['id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the ticket with the given ID
    $sql = "DELETE FROM ticket WHERE ticket_ID = $ticketID";

    // Execute the delete query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Ticket ID not provided.";
}
?>
