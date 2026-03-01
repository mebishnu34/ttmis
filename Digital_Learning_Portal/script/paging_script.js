var entries = document.querySelectorAll(".paging_frame");
var nextButton = document.querySelectorAll(".pagenext");
var backButton = document.querySelectorAll(".pageback");

nextButton.forEach(function(button, index) {
    button.addEventListener("click" , function() {
        entries[index].style.display ="none";
        entries[index + 1].style.display = "block";
    });
});


backButton.forEach(function(button, index) {
    button.addEventListener("click" , function() {
        entries[index + 1].style.display="none";
        entries[index].style.display="block";
    });
});