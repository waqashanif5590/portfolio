const navbar = document.querySelector(".nav_container");
const hamburger = document.getElementById("hamburger");
hamburger.addEventListener("click", () => {
  if (navbar.style.display != "flex") {
    navbar.style.display = "flex";
    hamburger.classList.remove("hamburger");
    hamburger.classList.add("cross");
  } else {
    navbar.style.display = "none";
    hamburger.classList.remove("cross");
    hamburger.classList.add("hamburger");
  }
});
AOS.init({
  duration: 1000, // Animation duration (in ms)
  once: true, // Whether animation should happen only once
});

const Fullnavbar = document.getElementById('navbar');

setInterval(() => {
  Fullnavbar.classList.add('blink');

  // Remove the class after animation duration so it can be re-added next time
  setTimeout(() => {
    Fullnavbar.classList.remove('blink');
  }, 600); // match animation duration
}, 5000); // every 5 seconds
