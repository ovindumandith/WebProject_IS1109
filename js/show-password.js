document
  .getElementById("togglePasswordBtn")
  .addEventListener("click", function () {
    var password = document.getElementById("password");
    var passwordSection = document.getElementById("passwordSection");
    if (password.innerText === "********") {
      password.innerText = "<?php echo $user['password']; ?>";
      this.innerText = "Hide Password";
    } else {
      password.innerText = "********";
      this.innerText = "Show Password";
    }
  });
