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

// SQL query to select all records from ticket table
$sql = "SELECT * FROM ticket";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tickets</title>
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

<h2>View Tickets</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Ticket ID</th><th>Subject</th><th>Message</th><th>Category</th><th>Priority</th><th class='action-column'>Update</th><th class='action-column'>Delete</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["ticket_ID"]."</td>";
        echo "<td>".$row["subject"]."</td>";
        echo "<td>".$row["message"]."</td>";
        echo "<td>".$row["category"]."</td>";
        echo "<td>".$row["priority"]."</td>";
        echo "<td class='action-column'><form action='../php/update_ticket.php' method='GET'><input type='hidden' name='id' value='".$row["ticket_ID"]."'><button type='submit' class='action-button'>Update</button></form></td>";
        echo "<td class='action-column'><form action='../php/delete_ticket.php' method='GET'><input type='hidden' name='id' value='".$row["ticket_ID"]."'><button type='submit' class='action-button'>Delete</button></form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

</body>
</html>
