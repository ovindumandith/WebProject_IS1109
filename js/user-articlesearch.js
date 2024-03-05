document.getElementById("myInput").addEventListener("input", function () {
  var input = this.value.toUpperCase();
  var articleTitles = document.querySelectorAll(".article-title");
  var articlesContainer = document.querySelector(".articles-container");

  // Create a new container for the filtered articles
  var newContainer = document.createElement("div");
  newContainer.className = "articles-container";

  articleTitles.forEach(function (title) {
    var heading = title.textContent || title.innerText;
    if (heading.toUpperCase().indexOf(input) > -1) {
      // If the keyword is present, clone the article and append it to the new container
      var article = title.parentElement.cloneNode(true);
      newContainer.appendChild(article);
    }
  });

  // Replace the old articles container with the new one
  articlesContainer.parentNode.replaceChild(newContainer, articlesContainer);
});
