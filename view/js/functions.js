var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
  
  var currentScrollpos = window.pageYOffset;
  
  if(prevScrollpos > currentScrollpos) {
  
    document.getElementById("nav").style.top = "0";
  
  } else {

    document.getElementById("nav").style.top = "-100px";

  }
  
  prevScrollpos = currentScrollpos;
}

const hamburger = document.querySelector(".hamburger");
const navList = document.querySelector(".nav-list");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navList.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
  hamburger.classList.remove("active");
  hamburger.classList.remove("active");
  
}));