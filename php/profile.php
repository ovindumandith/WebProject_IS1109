<?php
// Start the session and include necessary files
session_start();
include '../include/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Retrieve user details from the database
$username = $_SESSION['username'];
$query = "SELECT * FROM userdetails WHERE username = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch user details
if ($row = mysqli_fetch_assoc($result)) {
    $userID = $row['userID'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $password = $row['password'];
    // You can fetch more details if needed
} else {
    $errorMessage = "User details not found.";
}

// Close the database connection
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile Page</title>
    <link rel="stylesheet" href="../css/profile-user.css" type="text/css">

    <link rel="stylesheet" href="../css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1d03506f8.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            display: block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .button-container {
            text-align: center;
        }
        .button-container form {
            display: inline-block;
            margin: 10px;
        }
    </style>
    
</head>

<body><header>
    <nav>
            <div class="navbar-outerbox">
                <div class="logo-box">
                    <a href="home.php"><img src="../resources/logos/appex-text-logo.png" alt="logo"></a>
                </div>
                <div class="menu-and-userimage-box">
                    <ul class="navbar-menu-names">
                        <li><a href="../php/home.php">Home</a></li>
                        <li><a href="../php/knowledgebase.php">Knowledgebase</a></li>
                        <li><a href="../php/user-ticket.php">Tickets</a></li>
                        <li><a href="#">AboutUS</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                    <div class="userimage">
                        <img src="../resources/images/userimage.png" alt="">
                        <div class="dropdown-content">
                            <div class="username"><?php echo ucfirst($username); ?></div>
                            <form action="home.php" method="post">
                                <button type="submit" name="profile" id="profile-button">Profile</button>
                                <button type="submit" name="logout" id="logout-button">Logout</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav></header><br>
           <h1>User Profile</h1>
    <?php if (isset($errorMessage)) {
        echo "<p>$errorMessage</p>";
    } else { ?>
        <table border="1">
            <tr>
                <th>User ID</th>
                <td><?php echo $userID; ?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $lastName; ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo $username; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
        <th>Password</th>
        <td id="password">************</td> <!-- Initial placeholder for password -->
    </tr>
            <!-- Add more rows for additional user details -->
        </table>
        <div class="button-container">
            <form action="update-userprofile.php" method="post">
                <button type="submit">Update Profile</button>
            </form>
            <form action="#" method="post">
                <button type="submit" name="showPassword">Show Password</button>
            </form>
        </div>
    <?php } ?>
    
    <!-- ********************* ------------Footer Section Ends here--------- *********************** -->



    <script src="../js/home.js"></script>
    <script src="../js/show-password.js"></script>
</body>

</html>
