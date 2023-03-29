// NAVBAR

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
// HAMBURGER

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

// POPUP 1 

let one = document.querySelector(".one");
let popup_container1 = document.querySelector(".popup-container1");
let cross1 = document.querySelector(".e1");
one.addEventListener("click", function() {
    popup_container1.classList.toggle("active")
})
cross1.addEventListener("click", function() {
  popup_container1.classList.toggle("active")
});



let two = document.querySelector(".two");
let popup_container2 = document.querySelector(".popup-container2");
let cross2 = document.querySelector(".e2");
two.addEventListener("click", function() {
    popup_container2.classList.toggle("active")
})
cross2.addEventListener("click", function() {
  popup_container2.classList.toggle("active")
});


let three = document.querySelector(".three");
let popup_container3 = document.querySelector(".popup-container3");
let cross3 = document.querySelector(".e3");
three.addEventListener("click", function() {
    popup_container3.classList.toggle("active")
})
cross3.addEventListener("click", function() {
  popup_container3.classList.toggle("active")
});


let four = document.querySelector(".four");
let popup_container4 = document.querySelector(".popup-container4");
let cross4 = document.querySelector(".e4");
four.addEventListener("click", function() {
    popup_container4.classList.toggle("active")
})
cross4.addEventListener("click", function() {
  popup_container4.classList.toggle("active")
});


let five = document.querySelector(".five");
let popup_container5 = document.querySelector(".popup-container5");
let cross5 = document.querySelector(".e5");
five.addEventListener("click", function() {
    popup_container5.classList.toggle("active")
})
cross5.addEventListener("click", function() {
  popup_container5.classList.toggle("active")
});


let six = document.querySelector(".six");
let popup_container6 = document.querySelector(".popup-container6");
let cross6 = document.querySelector(".e6");
six.addEventListener("click", function() {
    popup_container6.classList.toggle("active")
})
cross6.addEventListener("click", function() {
  popup_container6.classList.toggle("active")
});


let seven = document.querySelector(".seven");
let popup_container7 = document.querySelector(".popup-container7");
let cross7 = document.querySelector(".e7");
seven.addEventListener("click", function() {
    popup_container7.classList.toggle("active")
})
cross7.addEventListener("click", function() {
  popup_container7.classList.toggle("active")
});


