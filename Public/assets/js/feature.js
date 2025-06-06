document.addEventListener("DOMContentLoaded", function () {
  const featureList = document.querySelector(".feature__list");
  const featureItems = document.querySelectorAll(".feature__item");
  const itemsPerGroup = 6;
  let currentIndex = 0;

  function updateSlider() {
    const translateXValue = -currentIndex * 100 + "%";
    featureList.style.transform = `translateX(${translateXValue})`;
  }

  function nextPage() {
    if (currentIndex < Math.ceil(featureItems.length / itemsPerGroup) - 1) {
      currentIndex++;
    } else {
      currentIndex = 0;
    }
    updateSlider();
  }

  function prevPage() {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = Math.ceil(featureItems.length / itemsPerGroup) - 1;
    }
    updateSlider();
  }

  document.querySelector(".feature__arrow--right").addEventListener("click", nextPage);
  document.querySelector(".feature__arrow--left").addEventListener("click", prevPage);

  let touchStartX = 0;
  let touchEndX = 0;

  featureList.addEventListener("touchstart", function (event) {
    touchStartX = event.changedTouches[0].screenX;
  });

  featureList.addEventListener("touchend", function (event) {
    touchEndX = event.changedTouches[0].screenX;
    if (touchEndX < touchStartX) nextPage();
    if (touchEndX > touchStartX) prevPage();
  });

  window.addEventListener("resize", function () {
    if (window.innerWidth > 768) {
      featureList.style.transform = "translateX(0)";
    } else {
      updateSlider();
    }
  });
});
