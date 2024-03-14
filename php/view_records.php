<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    session_start(); // Start the session

    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); // Redirect to login page if not logged in
        exit;
    }

    // Access username from session
    $username = $_SESSION['username'];

    // Include your database connection file
    include_once "connection.php"; // Replace "db_connection.php" with the actual filename

    // Query to fetch records associated with the logged-in user
    $sql = "SELECT * FROM user_records WHERE username = '$username'"; // Assuming 'user_records' is the table name

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if records are found
    if (mysqli_num_rows($result) > 0) {
        // Display records in a table
        echo "<h2>Your Records</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Subject</th><th>Message</th><th>Category</th><th>Priority</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['priority'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    // Close database connection
    mysqli_close($conn);
    ?>
</body>

</html>
