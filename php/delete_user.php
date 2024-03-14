<?php
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

// Check if user ID is provided and valid
if(isset($_POST['user_id']) && is_numeric($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // SQL to delete user from userdetails table
    $sql = "DELETE FROM userdetails WHERE userID = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view_user.php after deletion
        header("Location: view_user.php");
        exit();
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "Invalid user ID";
}

// Close database connection
$conn->close();
?>
