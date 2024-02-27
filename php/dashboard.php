<?php
session_start();// Start the session
require_once('../include/connection.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}
// Access username and email from session
$username = $_SESSION['username'];
?>

<?php

$query = "SELECT * FROM userdetails";
$result = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>

    <nav>
        <div class="navbar-outerbox">
            <div class="logo-box">
                <a href="home.php"><img src="../resources/logos/appex-text-logo.png" alt="logo"></a>
            </div>
            <div class="menu-and-userimage-box">
                <ul class="navbar-menu-names">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Knowledgebase</a></li>
                    <li><a href="#">Tickets</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
                <div class="userimage">
                    <img src="../resources/images/userimage.png" alt="">
                    <div class="dropdown-content">
                        <div class="username">
                            <?php echo ucfirst($username); ?>
                        </div>
                        <a href="#">Profile</a>
                        <a href="#">Settings</a>
                        <a href="../include/process-logout-2.php"><input type="button" value="Logout" name="logout"></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="side-menubar-and-main">

        <!-- ... (your existing code) ... -->

        <div class="side-menubar">

            <div class="side-menubar-section">
                <h3 class="side-menubar-heading">Tickets</h3>
                <a href="dashboard.php"><span class="side-menubar-items">View Tickets</span></a>
                <a href="dashboard-update-user.php"><span class="side-menubar-items">Reply Tickets</span></a>
                <a href="dashboard-delete-user.php"><span class="side-menubar-items">Delete Tickets</span></a>
            </div>

            <div class="side-menubar-section">
                <h3 class="side-menubar-heading">Users</h3>
                <a href="dashboard.php"><span class="side-menubar-items">View Users</span></a>
                <a href="dashboard-update-user.php"><span class="side-menubar-items">Edit Users</span></a>
                <a href="dashboard-delete-user.php"><span class="side-menubar-items">Delete Users</span></a>
            </div>
            

            
            
            
        </div>

        <!-- ... (your existing code) ... -->

        <main>
            <h2>User Details</h2>

            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Replace the following rows with data from your database -->
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>";
                        echo "<td>" . $row['userID'] . "</td>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";

                    }
                    ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </main>
    </div>



    <!-- <script src="dashboard.js"></script> -->
</body>

</html>