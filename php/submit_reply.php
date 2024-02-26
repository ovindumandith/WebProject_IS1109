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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get ticket details from POST parameters
    $ticket_replyID = $_POST['ticket_ID'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $category = $_POST['category'];
    $priority = $_POST['priority'];
    $reply = $_POST['reply'];

    // Prepare an SQL statement for inserting the reply into the database
    $stmt = $conn->prepare("INSERT INTO reply_ticket (ticket_replyID, subject, message, category, priority, reply) VALUES (?, ?, ?, ?, ?, ?)");

    // Check if the prepare was successful
    if ($stmt === false) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    // Bind the parameters to the SQL query
    $stmt->bind_param("isssss", $ticket_replyID, $subject, $message, $category, $priority, $reply);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "Reply submitted successfully.";
        // Redirect to admin_home.html
        header("Location: ../html/admin_home.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
