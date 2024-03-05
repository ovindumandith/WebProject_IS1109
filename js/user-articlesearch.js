document.getElementById("myInput").addEventListener("keyup", function () {
  let input, filter, articles, article, heading, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  articles = document.querySelectorAll(".article"); // Assuming each article has a class "article"

  articles.forEach(function (article) {
    heading = article.querySelector(".heading"); // Assuming the heading of each article has a class "heading"
    txtValue = heading.textContent || heading.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      article.style.display = ""; // Show the article if the heading matches the filter
    } else {
      article.style.display = "none"; // Hide the article if the heading does not match the filter
    }
  });
});
