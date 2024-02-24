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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/header+footer.css" rel="stylesheet" type="text/css">
    <title>View Tickets</title>
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 8px;
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
            text-align: center;
        }
        .action-column {
            width: 160px;
            text-align: center;
        }
        .action-button {
            padding: 6px 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-right: 5px;
        }
        .action-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <!-- Company Logo and Title -->
        <div class="logo-container">
            <img src="../resources/logo.png" alt="Company Logo" />
            <div class="title-container">
                <h1>ABC Support Desk</h1>
            </div>
        </div>

        <!-- Profile Icon -->
        <div class="profile-icon-container">
            <a href="#"><img src="../resources/user.png" alt="Profile Icon" /></a>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <a href="#">Home</a>
        <div class="dropdown">
            <a href="#">Tickets ▾</a>
            <div class="dropdown-content">
                <a href="#">Submit a Ticket</a>
                <a href="#">View past Tickets</a>
            </div>
        </div>
        <a href="article.html">Knowledge Base</a>
        <a href="#">Contact</a>
        <a href="#">Feedback</a>
    </nav>

    <h2>View Tickets</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Ticket ID</th><th>Subject</th><th>Message</th><th>Category</th><th>Priority</th><th class='action-column'>Actions</th></tr>";
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["ticket_ID"]."</td>";
            echo "<td>".$row["subject"]."</td>";
            echo "<td>".$row["message"]."</td>";
            echo "<td>".$row["category"]."</td>";
            echo "<td>".$row["priority"]."</td>";
            echo "<td class='action-column'>";
            echo "<a href='../php/reply_ticket.php?id=".$row["ticket_ID"]."' class='action-button'>Reply</a>";
            echo "<a href='../php/delete_ticket.php?id=".$row["ticket_ID"]."' class='action-button' style='background-color: #dc3545;'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>

    <footer>
        <p>© 2024 ABC Support Desk. All rights reserved.</p>
        <div class="social-media-icons">
            <div class="icon-container">
                <a href="https://www.facebook.com/yourpage"><img src="../resources/facebook.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/yourpage"><img src="../resources/instagram.png" alt="Instagram"></a>
                <a href="https://www.linkedin.com/yourpage"><img src="../resources/linkedin.png" alt="LinkedIn"></a>
            </div>
        </div>
    </footer>
</body>
</html>
