<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Include database connection file
include '../include/connection.php'; // Adjust the path as per your file structure

// Fetch the admin's current profile data from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM admindetails WHERE username = '$username'";
$result = mysqli_query($connection, $sql);

// Check if the query was successful
if ($result) {
    $adminData = mysqli_fetch_assoc($result);
} else {
    $errorMessage = "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);

// Handle form submission to update admin profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update admin profile data in the database
    $updateSql = "UPDATE admindetails SET firstName = '$firstName', lastName = '$lastName', email = '$email', password = '$hashedPassword' WHERE username = '$username'";
    $updateResult = mysqli_query($conn, $updateSql);

    if ($updateResult) {
        // Redirect back to admin profile page after successful update
        header("Location: admin_profile.php");
        exit;
    } else {
        $errorMessage = "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Profile</title>
    <link href="../css/header+footer.css" rel="stylesheet" type="text/css">
    <link href="../css/edit_admin_profile.css" rel="stylesheet" type="text/css">

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
        <a href="../php/admin_profile.php">Admin Profile</a>
        <form action="home.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</div>
       
    </header>

    <main>
        <h1>Edit Admin Profile</h1>
        <?php if (isset($errorMessage)) : ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="firstName">First Name:</label><br>
            <input type="text" id="firstName" name="firstName" value="<?php echo $adminData['firstName']; ?>"><br><br>

            <label for="lastName">Last Name:</label><br>
            <input type="text" id="lastName" name="lastName" value="<?php echo $adminData['lastName']; ?>"><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $adminData['email']; ?>"><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value=""><br><br>

            <input type="submit" value="Submit">
        </form>
    </main>

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
