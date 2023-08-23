/* sub button down and up */
        // JavaScript code to toggle visibility of sublinks and subbuttonlinks
        document.addEventListener('DOMContentLoaded', function() {
            var sublinks = document.querySelectorAll('.sublink');

            // Add click event listener to each sublink
            sublinks.forEach(function(sublink) {
                sublink.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent click event from propagating to parent elements

                    // Toggle the class "show-subbuttonlinks" on the clicked sublink
                    this.classList.toggle('show-subbuttonlinks');
                });
            });

            var mainLinks = document.querySelectorAll('.main-link');


            // Add click event listener to each main link
            mainLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    // Toggle the class "show-sublinks" on the clicked main link
                    this.classList.toggle('show-sublinks');

                    // Find the sublink under the clicked main link and toggle its visibility
                    var sublink = this.querySelector('.sublink');
                    if (sublink) {
                        sublink.classList.toggle('show-sublinks');
                    }
                });
            });
        });

/* darkmode, logout and side nav close open button */
const body = document.querySelector("body"),
modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");


let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}
let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}
modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});
sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
function menuToggle(){
    const toggleMenu = document.querySelector('.logout');
    toggleMenu.classList.toggle('active')
}

// SIDE NAV ARROW ANIMATION
var arrow = document.querySelector('.rotate');

// Add a click event listener
arrow.addEventListener("click", function() {
  // Toggle the 'rotated' class on click
  arrow.classList.toggle("rotated");
});

