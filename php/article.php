<?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "web_test"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $articleID = $conn->real_escape_string($_POST['articleID']);
    $heading = $conn->real_escape_string($_POST['heading']);
    $description = $conn->real_escape_string($_POST['description']);

    // SQL query to insert data into articles table
    $sql = "INSERT INTO articles (articleID, heading, description) VALUES ('$articleID', '$heading', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Close connection
        $conn->close();

        // Success message
        echo "<script>alert('Article inserted successfully');</script>";

        // Redirect to article.html after a delay
        echo "<script>setTimeout(function(){ window.location.href = '../html/article.html'; }, 1000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Close connection
$conn->close();
?>
