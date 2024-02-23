<?php
// Assuming you have already connected to your database

// Function to update password
function updatePassword($connection, $admin_id, $new_password) {
    // Sanitize inputs to prevent SQL injection
    $admin_id = mysqli_real_escape_string($connection, $admin_id);
    $new_password = mysqli_real_escape_string($connection, $new_password);

    // Update the password in the database
    $query = "UPDATE your_table_name SET password = '$new_password' WHERE admin_id = '$admin_id'";
    $result = mysqli_query($connection, $query);

    return $result;
}

// Check if a user ID is provided via GET parameter
if(isset($_GET['admin_id'])) {
    // Sanitize the input to prevent SQL injection
    $admin_id = $_GET['admin_id'];

    // Fetch user details from the database
    $query = "SELECT * FROM your_table_name WHERE admin_id = $admin_id";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if($result && mysqli_num_rows($result) > 0) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        // Do not display password for security reasons

        // Display user details in HTML format
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Details</title>
            <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap"
    />

    <link href="../css/header+footer.css" rel="stylesheet" type="text/css" />
    <script src="script.js" defer></script>
    <title>Your Page Title</title>

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

            
            <div class="container">
                <h1>User Details</h1>
                <div class="user-details">
                    <p><label>First Name:</label> <?php echo $first_name; ?></p>
                    <p><label>Last Name:</label> <?php echo $last_name; ?></p>
                    <p><label>Email:</label> <?php echo $email; ?></p>
                </div>
                <!-- Form to change password -->
                <form method="post">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" required>
                    <button type="submit" name="change_password">Change Password</button>
                </form>
            </div>
                <footer>
      <p>© 2024 ABC Support Desk. All rights reserved.</p>
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
<?php
        // Handle password change request
        if(isset($_POST['change_password'])) {
            // Retrieve new password from form
            $new_password = $_POST['new_password'];

            // Update the password in the database
            $update_result = updatePassword($connection, $admin_id, $new_password);

            if($update_result) {
                echo "<p>Password updated successfully!</p>";
            } else {
                echo "<p>Error updating password.</p>";
            }
        }
    } else {
        echo "User not found";
    }
} else {
    echo "No user ID provided";
}
?>
