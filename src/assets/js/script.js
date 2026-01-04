// Hamburger Menu Logic
const hamburger = document.querySelector(".hamburger");
const mobileNav = document.querySelector(".nav-mobile");
const mobileLinks = document.querySelectorAll(".nav-mobile__link");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("hamburger--active");
  mobileNav.classList.toggle("nav-mobile--active");

  if (mobileNav.classList.contains("nav-mobile--active")) {
    document.body.style.overflow = "hidden";
  } else {
    document.body.style.overflow = "";
  }
});

mobileLinks.forEach((link) => {
  link.addEventListener("click", () => {
    hamburger.classList.remove("hamburger--active");
    mobileNav.classList.remove("nav-mobile--active");
    document.body.style.overflow = "";
  });
});

// Intersection Observer for Animations
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible");
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.1 }
);

document
  .querySelectorAll(".u-fade-in-up")
  .forEach((el) => observer.observe(el));
