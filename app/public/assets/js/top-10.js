document.addEventListener("DOMContentLoaded", () => {
  const top10List = document.querySelector(".top10__list");
  const top10Items = document.querySelectorAll(".top10__item");

  if (top10List && top10Items.length > 0) {
    window.addEventListener("resize", () => {
      if (window.innerWidth < 550) {
        top10Items.forEach((item) => {
          const img = item.querySelector(".top10__img");
          img.setAttribute("src", img.getAttribute("data-small"));
        });
      } else {
        top10Items.forEach((item) => {
          const img = item.querySelector(".top10__img");
          img.setAttribute("src", img.getAttribute("data-large"));
        });
      }
    });
  }
});
