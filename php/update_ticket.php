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

    // SQL query to select the ticket with the given ID
    $sql = "SELECT * FROM ticket WHERE ticket_ID = $ticketID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subject = $row['subject'];
        $message = $row['message'];
        $category = $row['category'];
        $priority = $row['priority'];
    } else {
        echo "Ticket not found.";
        exit;
    }

    // Close connection
    $conn->close();
} else {
    echo "Ticket ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ticket</title>
    <style>
        /* CSS styles */
    </style>
</head>
<body>

<h2>Update Ticket</h2>

<form action="update_ticket_process.php" method="POST">
    <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">
    <label for="subject">Subject:</label><br>
    <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>"><br><br>
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50"><?php echo $message; ?></textarea><br><br>
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" value="<?php echo $category; ?>"><br><br>
    <label for="priority">Priority:</label><br>
    <input type="text" id="priority" name="priority" value="<?php echo $priority; ?>"><br><br>
    <input type="submit" value="Update">
</form>

</body>
</html>
