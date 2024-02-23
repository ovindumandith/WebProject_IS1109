<?php
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

    // SQL query to select the article with the given ID
    $sql = "SELECT * FROM articles WHERE articleID = $articleID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $heading = $row['heading'];
        $description = $row['description'];
    } else {
        echo "Article not found.";
        exit;
    }

    // Close connection
    $conn->close();
} else {
    echo "Article ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Article</title>


        <style>
        h2 {
  color: #333;
  text-align: center;
}
form {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 500px;
  margin: 0 auto;
}
label {
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
}
input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-sizing: border-box;
}
input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}
input[type="submit"]:hover {
  background-color: #0056b3;
}

    </style>
</head>
<body>

<h2>Update Article</h2>

<form action="update_article_process.php" method="POST">
    <input type="hidden" name="articleID" value="<?php echo $articleID; ?>">
    <label for="heading">Heading:</label><br>
    <input type="text" id="heading" name="heading" value="<?php echo $heading; ?>"><br><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="50"><?php echo $description; ?></textarea><br><br>
    <input type="submit" value="Update">
</form>

</body>
</html>