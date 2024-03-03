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

// Check if article ID is provided
if(isset($_GET['id'])) {
    $articleID = $_GET['id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a delete statement
    $sql = "DELETE FROM articles WHERE articleID = ?";

    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $articleID);

        // Display confirmation dialog
        echo "<script>
                var confirmed = confirm('Are you sure you want to delete this article?');
                if(confirmed) {
                    // Attempt to execute the prepared statement
                    if(" . $stmt->execute() . ") {
                        alert('Article deleted successfully');
                        window.location.href = '../php/view_articles.php';
                    } else {
                        alert('Error deleting article');
                    }
                } else {
                    window.location.href = '../php/view_articles.php';
                }
              </script>";
        // Close statement
        $stmt->close();
    }
    // Close connection
    $conn->close();
} else {
    echo "Article ID not provided.";
}
?>
