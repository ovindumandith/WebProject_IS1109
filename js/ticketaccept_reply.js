function acceptReply(button) {
  button.innerHTML = "<i class='fas fa-check'></i> Successful";
  button.style.backgroundColor = "#28a745";
  button.disabled = true;
  setTimeout(function () {
    button.innerHTML = "Accepted";
    button.style.backgroundColor = "";
    button.disabled = false;
  }, 2000); // Reset button after 2 seconds
  alert("Reply accepted successfully");
}
