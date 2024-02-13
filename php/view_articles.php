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

// SQL query to select all records from articles table
$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inserted Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 30px;
            color: #333;
        }
        .action-column {
            width: 120px;
        }
        .action-button {
            padding: 8px 12px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .action-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Inserted Records</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Article ID</th><th>Heading</th><th>Description</th><th class='action-column'>Update</th><th class='action-column'>Delete</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["articleID"]."</td>";
        echo "<td>".$row["heading"]."</td>";
        echo "<td>".$row["description"]."</td>";
        echo "<td class='action-column'><form action='../php/update_article.php' method='GET'><input type='hidden' name='id' value='".$row["articleID"]."'><button type='submit' class='action-button'>Update</button></form></td>";
        echo "<td class='action-column'><form action='../php/delete_article.php' method='GET'><input type='hidden' name='id' value='".$row["articleID"]."'><button type='submit' class='action-button'>Delete</button></form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

</body>
</html>
