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

// Check if ticket ID is provided
if(isset($_GET['id'])) {
    $ticketID = $_GET['id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query with a prepared statement to delete the ticket with the given ID
    $sql = "DELETE FROM ticket WHERE ticket_ID = ?";
    
    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ticketID);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Close statement and connection
        $stmt->close();
        $conn->close();
        echo "<script>
                alert('Record deleted successfully');
                window.location.href = 'view_ticket.php';
              </script>";
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Ticket ID not provided.";
}
?>
