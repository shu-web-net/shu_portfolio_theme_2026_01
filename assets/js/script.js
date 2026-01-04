// Hamburger Menu Logic
const hamburger = document.querySelector(".hamburger");
const mobileNav = document.querySelector(".mobile-nav");
const mobileLinks = document.querySelectorAll(".mobile-link");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  mobileNav.classList.toggle("active");

  if (mobileNav.classList.contains("active")) {
    document.body.style.overflow = "hidden";
  } else {
    document.body.style.overflow = "";
  }
});

// Close mobile menu on link click
mobileLinks.forEach((link) => {
  link.addEventListener("click", () => {
    hamburger.classList.remove("active");
    mobileNav.classList.remove("active");
    document.body.style.overflow = "";
  });
});

// Intersection Observer for Animations
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.1 }
);

document.querySelectorAll(".fade-in-up").forEach((el) => observer.observe(el));
