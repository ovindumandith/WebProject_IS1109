<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap"
    />

    <link href="../css/header+footer.css" rel="stylesheet" type="text/css" />
    <link href="../css/admin_home.css" rel="stylesheet" type="text/css" />
    <title>Apexx Solutions Admin Panel</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawTicketsSubmittedChart();
            drawTicketsRepliedChart();
            drawTotalArticlesChart();
            drawRegisteredUsersChart();
        }

        function drawTicketsSubmittedChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Count'],
                ['Tickets Submitted', <?php echo $ticketsSubmittedCount; ?>]
            ]);

            var options = {
                title: 'Tickets Submitted'
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-tickets-submitted'));
            chart.draw(data, options);
        }

        function drawTicketsRepliedChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Count'],
                ['Tickets Replied', <?php echo $ticketsRepliedCount; ?>]
            ]);

            var options = {
                title: 'Tickets Replied'
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-tickets-replied'));
            chart.draw(data, options);
        }

        function drawTotalArticlesChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Count'],
                ['Total Articles', <?php echo $totalArticlesCount; ?>]
            ]);

            var options = {
                title: 'Total Articles'
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-total-articles'));
            chart.draw(data, options);
        }

        function drawRegisteredUsersChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Count'],
                ['Registered Users', <?php echo $registeredUsersCount; ?>]
            ]);

            var options = {
                title: 'Registered Users'
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart-registered-users'));
            chart.draw(data, options);
        }
    </script>
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

    <!-- Navigation Bar -->
    <nav>
      <a href="#">Home</a>
      <div class="dropdown">
        <a href="../php/view_ticket.php">Tickets</a>
      </div>
      <div class="dropdown">
        <a href="../php/view_user.php">Users</a>
        <div class="dropdown-content"></div>
      </div>
      <a href="../html/article.html">Knowledge Base</a>

      <a href="../php/view_feedback.php">Feedback</a>
    </nav>
    <br />

    <div class="search-bar">
      <input type="text" placeholder="Search..." />
      <button type="submit">Search</button>
    </div>

    <div class="admin-dashboard">
      <h2>Admin Dashboard</h2>
        <div id="chart-tickets-submitted"></div>
        <div id="chart-tickets-replied"></div>
        <div id="chart-total-articles"></div>
        <div id="chart-registered-users"></div>

      <table>
        <thead>
          <tr>
            <th>Category</th>
            <th>Count</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tickets Submitted</td>
            <td id="tickets-submitted"></td>
          </tr>
          <tr>
            <td>Tickets Replied</td>
            <td id="tickets-replied"></td>
          </tr>
          <tr>
            <td>Total Collection Of Articles</td>
            <td id="total-articles">Loading...</td>
          </tr>
          <tr>
            <td>Registered Users</td>
            <td id="registered-users">Loading...</td>
          </tr>
        </tbody>
      </table>
    </div>


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
        <script>
      // Make an AJAX request to fetch ticket count
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          // Update the content of the <td> element with the received count
          document.getElementById("tickets-submitted").innerHTML =
            this.responseText;
        }
      };
      xhr.open("GET", "../php/get_total_tickets.php", true);
      xhr.send();
    </script>
    <script>
    var xhr_replied = new XMLHttpRequest();
    xhr_replied.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                document.getElementById("tickets-replied").innerHTML = this.responseText;
            } else {
                console.error("Error fetching replied ticket count: " + this.statusText);
            }
        }
    };
    xhr_replied.open("GET", "../php/ticket_reply_count.php", true);
    xhr_replied.send();
</script>
<script>
    var xhr_articles = new XMLHttpRequest();
    xhr_articles.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                document.getElementById("total-articles").innerHTML = this.responseText;
            } else {
                console.error("Error fetching total articles count: " + this.statusText);
            }
        }
    };
    xhr_articles.open("GET", "../php/article_count.php", true);
    xhr_articles.send();
</script>
<script>
    var xhr_registered_users = new XMLHttpRequest();
    xhr_registered_users.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                document.getElementById("registered-users").innerHTML = this.responseText;
            } else {
                console.error("Error fetching registered users count: " + this.statusText);
            }
        }
    };
    xhr_registered_users.open("GET", "../php/user_count.php", true);
    xhr_registered_users.send();
</script>



  </body>
</html>
