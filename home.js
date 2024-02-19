var userimage = document.querySelector(".userimage")
console.log(userimage);

// var check = false;

// userimage.forEach( function(topic)  {
    //getting clicked section
    userimage.addEventListener("click", function() {
        // console.log(selector);
        // var incontent = topic.querySelector(".content");
        // console.log(incontent);

        var showed = document.querySelector(".show");
        var hidden = document.querySelector(".hidden");
        // console.log(last);

        if( showed ){
            showed.classList.remove("show");
            showed.classList.add("hidden");
            // console.log(last);
        }
        if( hidden ){
            hidden.classList.remove("hidden");
            hidden.classList.add("show");
            // console.log(last);
        }
        
    });