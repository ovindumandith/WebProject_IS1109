function searchArticles() {
  var searchTerm = document.getElementById("myInput").value.toLowerCase();

  // Send an asynchronous request to the server to fetch filtered articles
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Parse the JSON response
        var filteredArticles = JSON.parse(xhr.responseText);
        // Render the filtered articles
        renderArticles(filteredArticles);
      } else {
        console.error("Error fetching articles:", xhr.status);
      }
    }
  };
  xhr.open("POST", "search.php", true); // Adjust the URL to your search endpoint
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.send(JSON.stringify({ searchTerm: searchTerm }));
}

function renderArticles(articles) {
  var articlesList = document.getElementById("articlesList");
  articlesList.innerHTML = ""; // Clear previous articles

  articles.forEach(function (article) {
    var articleElement = document.createElement("div");
    articleElement.innerHTML =
      "<h3>" + article.heading + "</h3><p>" + article.description + "</p>";
    articlesList.appendChild(articleElement);
  });
}
