document.addEventListener("DOMContentLoaded", () => {
  // Nav Desktop
  const menu = document.querySelector(".bar");
  const nav = document.querySelector(".wrapper");

  if (menu && nav) {
    menu.addEventListener("click", () => {
      nav.classList.toggle("active");

      // Đổi icon khi mở/đóng menu
      if (nav.classList.contains("active")) {
        menu.classList.replace("fa-bars", "fa-xmark");
      } else {
        menu.classList.replace("fa-xmark", "fa-bars");
      }
    });
  }

  document.addEventListener("click", (event) => {
    if (!nav.contains(event.target) && !menu.contains(event.target)) {
      nav.classList.remove("active");
      menu.classList.replace("fa-xmark", "fa-bars");
    }
  });

  const dropdowns = document.querySelectorAll(".nav-mobile .nav__dropdown");

  if (dropdowns.length > 0) {
    dropdowns.forEach((dropdown) => {
      dropdown.addEventListener("click", () => {
        const navItem = dropdown.closest(".nav-mobile__list")?.querySelector(".nav__item");
        const icon = dropdown.querySelector("i");

        if (navItem) {
          navItem.classList.toggle("active");

          // Đổi icon khi mở/đóng menu
          if (navItem.classList.contains("active")) {
            icon.classList.replace("fa-chevron-right", "fa-angle-down");
          } else {
            icon.classList.replace("fa-angle-down", "fa-chevron-right");
          }
        }
      });
    });
  }
});
