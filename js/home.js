var sections = document.querySelectorAll(".section");

sections.forEach(function(topic) {
    var selector = topic.querySelector(".header");
    var plusIcon = selector.querySelector("i");

    selector.addEventListener("click", function() {
        var incontent = topic.querySelector(".content");
        var last = document.querySelector(".show");

        if (last != null) {
            last.classList.remove("show");
            last.previousElementSibling.querySelector("i").style.transform = "rotate(0deg)";
        }

        if (incontent != last) {
            incontent.classList.add("show");
            plusIcon.style.transform = "rotate(-180deg)";
        } else {
            plusIcon.style.transform = "rotate(0deg)";
        }
    });
});