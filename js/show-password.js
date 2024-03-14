document.getElementById("showPassword").addEventListener("click", function () {
  var passwordField = document.getElementById("password");
  var actualPassword = "<?php echo $password; ?>"; // Get the actual password from PHP

  if (passwordField.textContent === "************") {
    passwordField.textContent = actualPassword; // Show the actual password
    this.textContent = "Hide Password";
  } else {
    passwordField.textContent = "************"; // Hide the actual password
    this.textContent = "Show Password";
  }
});
