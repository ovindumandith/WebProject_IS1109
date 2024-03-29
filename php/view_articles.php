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
    <link href="../css/header+footer.css" rel="stylesheet" type="text/css">
    <link href="../css/search-bar.css" rel="stylesheet" type="text/css">
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
        width: 80px;
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
    }
    .action-button:hover {
        background-color: #0056b3;
    }
            .delete-button {
            background-color: #dc3545; 
            color: #fff; 
        }

        .update-button {
            background-color: #007bff; 
            color: #fff; 
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
    <img src="../resources/user.png" alt="Profile Icon" />
    <div class="profile-options">
        <a href="admin_profile.php">Admin Profile</a>
<form action="../php/admin_logout.php" method="post">
    <button type="submit" name="logout">Logout</button>
</form>
    </div>
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

<h2>Inserted Records</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table id='myTable'>";
    echo "<tr><th>Article ID</th><th>Heading</th><th>Description</th><th class='action-column'>Update</th><th class='action-column'>Delete</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["articleID"]."</td>";
        echo "<td>".$row["heading"]."</td>";
        echo "<td>".$row["description"]."</td>";
        echo "<td class='action-column'><form action='../php/update_article.php' method='GET'><input type='hidden' name='id' value='".$row["articleID"]."'><button type='submit' class='action-button update-button'>Update</button></form></td>";
        echo "<td class='action-column'><form action='../php/delete_article.php' method='GET' onsubmit='return confirmDelete()'><input type='hidden' name='id' value='".$row["articleID"]."'><button type='submit' class='action-button delete-button'>Delete</button></form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<script src="../js/ticket-search.js"></script>

<footer>
      <p>© 2024 Apexx Solutions. All rights reserved.</p>
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
