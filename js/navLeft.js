document.addEventListener("DOMContentLoaded", function(event) {
    navbar = document.getElementById("navleft");
    for (var i = 0; i < navbar.children.length; i++) {
        navbar.children[i].addEventListener("mouseenter", function(event) {
            event.target.children[3].style.opacity = "1";
        })
        navbar.children[i].addEventListener("mouseleave", function(event) {
            event.target.children[3].style.opacity = "0";
        })
    }
})