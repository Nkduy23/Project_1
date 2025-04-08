document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".product__item").forEach((item) => {
    const img = item.querySelector(".product__img");
    const defaultSrc = img.getAttribute("src");
    const hoverSrc = img.getAttribute("data-hover");

    item.addEventListener("mouseenter", () => {
      img.setAttribute("src", hoverSrc);
    });
    item.addEventListener("mouseleave", () => {
      img.setAttribute("src", defaultSrc);
    });
  });
});
