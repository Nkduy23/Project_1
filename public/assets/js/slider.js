document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector(".slider");
  const sliderItems = document.querySelectorAll(".slider__item");

  if (slider && sliderItems.length > 0) {
    window.addEventListener("resize", () => {
      if (window.innerWidth < 700) {
        sliderItems.forEach((item) => {
          const img = item.querySelector(".slider__img");
          img.setAttribute("src", img.getAttribute("data-small"));
        });
      } else {
        sliderItems.forEach((item) => {
          const img = item.querySelector(".slider__img");
          img.setAttribute("src", img.getAttribute("data-large"));
        });
      }
    });
  }
});
