<?php
// File: view_feedback.php

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

// SQL to fetch feedback data
$sql = "SELECT * FROM feedback"; // replace 'feedback_table' with your actual table name
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/header+footer.css" rel="stylesheet" type="text/css">
    <link href="../css/search-bar.css" rel="stylesheet" type="text/css">
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
        #mySelect{
            
    font-size: 16px;
    line-height: 1;
    border: 0;
    border-radius: 5px;
    height: 50px;
    padding: 10px;
    background: #f1f1f1;
    color: #333;

        }
    </style>
</head>
<body>
    <header>
        <!-- Company Logo and Title -->
        <div class="logo-container">
            <img src="../resources/logo.png" alt="Company Logo" />
            <div class="title-container">
                <h1>Apexx Solutions Admin Panel</h1>
            </div>
        </div>

        <!-- Profile Icon -->
        <div class="profile-icon-container">
            <a href="#"><img src="../resources/user.png" alt="Profile Icon" /></a>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav>
      <a href="../html/admin_home.html">Home</a>
      <div class="dropdown">
        <a href="../php/view_ticket.php">Tickets</a>
      </div>
      <div class="dropdown">
        <a href="../php/view_user.php">Users</a>
        <div class="dropdown-content">

        </div>
      </div>
      <a href="../html/article.html">Knowledge Base</a>

      <a href="../php/view_feedback.php">Feedback</a>
    </nav>
        <div class="search-bar">
      <input type="text" id="myInput" placeholder="Search..." />
      <button type="submit">Search</button>
    </div>
    
    <h2>View Feedback</h2>
<?php
if ($result->num_rows > 0) {
  echo "<table id='myTable'>";
  echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Feedback</th></tr>";
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["id"]."</td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["email"]."</td>";
    echo "<td>".$row["feedback"]."</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
<script src="../js/feedback-search.js"></script>

 <footer>
      <p>© 2024 Apexx Solutionsk. All rights reserved.</p>
      <div class="social-media-icons">
        <div class="icon-container">
          <a href="https://www.facebook.com/yourpage"
            ><img src="../resources/facebook.png" alt="Facebook"
          /></a>

          <a href="https://www.instagram.com/yourpage"
            ><img src="../resources/instagram.png" alt="Instagram"
          /></a>
          <a href="https://www.linkedin.com/yourpage"
            ><img src="../resources/linkedin.png" alt="LinkedIn"
          /></a>
        </div>
      </div>
    </footer>
      </body>
</html>