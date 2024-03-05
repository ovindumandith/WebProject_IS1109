document.addEventListener("DOMContentLoaded", function () {
  const articleTitles = document.querySelectorAll(".article-title");
  articleTitles.forEach((title) => {
    title.addEventListener("mouseenter", function () {
      const description = this.getAttribute("data-description");
      this.innerHTML = description;
    });
    title.addEventListener("mouseleave", function () {
      const heading = this.textContent;
      this.innerHTML = heading;
    });
  });
});
