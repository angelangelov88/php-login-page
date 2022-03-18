// This is the code for the hamburger menu on small screens. The dropdown appears on click on the hamburger (invoking the OpenCloseNav function). Once shown I add the blocker div to complete the page and allow the user to click anywhere but the dropdown (including the X) to close it. 

const headerSmall = document.getElementById('header-small');
const menuLine = document.getElementsByClassName('menu-lines')[0];
const menuX = document.getElementsByClassName('menu-x')[0];
const menuTitle = document.getElementsByClassName('menu-title')[0];
const blocker = document.getElementsByClassName('blocker')[0];
const body = document.body;

function openCloseNav() {
  if (headerSmall.style.display === "block") {
    headerSmall.style.display = "none";
    menuLine.style.display = "block";
    menuX.style.display = 'none';
    menuTitle.style.display = 'block';
    blocker.style.display = 'none'
    body.style.overflow = 'auto';
} else {
    headerSmall.style.display = "block";
    menuLine.style.display = "none";
    menuX.style.display = 'block';
    menuTitle.style.display = 'none';
    blocker.style.display = 'block'
    body.style.overflow = 'hidden';
  }
}

//Function to make the small screen navbar disappear if the user changes to bigger screen even if it has been opened on the small one (for example if the user changes between portrait and landscape modes). It also checks if the hamburger has the lines or X and makes sure it is correctly displayed after resizing of the screen

var x = window.matchMedia("(max-width: 991px)")
removeNav(x)
x.addListener(removeNav)

function removeNav(x) {
  if (x.matches) {
    headerSmall.style.display = "none";
    menuLine.style.display = "block";
    menuX.style.display = 'none';
    menuTitle.style.display = 'block';
} else {
    headerSmall.style.display = "none";
    blocker.style.display = "none";
    body.style.overflow = 'auto';
}
}

//This is the function I used to make the navbar sticky. It allows the user to see the navbar even if not on top of the page. I have styled it differently so it looks nice.
window.onscroll = function() {myFunction()};

var header = document.querySelector("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
} else {
    header.classList.remove("sticky");
}
}