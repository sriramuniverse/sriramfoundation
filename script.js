// Current year in footer
document.getElementById("year").textContent = new Date().getFullYear();

// Back-to-top button
const backTop = document.getElementById("backTop");
window.addEventListener("scroll", () => {
  backTop.style.display = window.scrollY > 350 ? "grid" : "none";
});
backTop.addEventListener("click", () => window.scrollTo({top:0,behavior:"smooth"}));

// Reveal sections as they enter the viewport
const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("visible");
      revealObserver.unobserve(entry.target);
    }
  });
}, {threshold: 0.12});
document.querySelectorAll(".reveal").forEach(el => revealObserver.observe(el));

// Close mobile navigation after selecting a link
document.querySelectorAll(".navbar .nav-link").forEach(link => {
  link.addEventListener("click", () => {
    const menu = document.getElementById("navMenu");
    if (menu.classList.contains("show")) {
      bootstrap.Collapse.getOrCreateInstance(menu).hide();
    }
  });
});

// Client-side validation helper
const form = document.getElementById("volunteerForm");
if (form) {
  form.addEventListener("submit", event => {
    const consent = document.getElementById("consent");
    if (!consent.checked) {
      event.preventDefault();
      consent.focus();
      consent.reportValidity();
    }
  });
}
