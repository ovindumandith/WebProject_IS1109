<?php
// delete_feedback.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
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

    // Get the ID of the feedback to delete
    $id = $_POST["id"];

    // SQL to delete feedback
    $sql = "DELETE FROM feedback WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the page after deletion
        header("Location: ../php/view_feedback.php");
        exit();
    } else {
        echo "Error deleting feedback: " . $conn->error;
    }

    $conn->close();
}
?>
