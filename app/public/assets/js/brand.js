document.addEventListener("DOMContentLoaded", function () {
  const brandContainers = document.querySelectorAll(".brand__container");

  brandContainers.forEach((container) => {
    const brandWrapper = container.querySelector(".brand__wrapper");
    const brandGroups = container.querySelectorAll(".brand__group");
    const nextBtn = container.querySelector(".brand__arrow--right");
    const prevBtn = container.querySelector(".brand__arrow--left");

    let currentIndex = 0;
    const totalGroups = brandGroups.length;

    function updateSlider() {
      const translateXValue = -currentIndex * 50 + "%";
      brandWrapper.style.transform = `translateX(${translateXValue})`;
    }

    function nextPage() {
      if (currentIndex < totalGroups - 1) {
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
        currentIndex = totalGroups - 1;
      }
      updateSlider();
    }

    nextBtn.addEventListener("click", nextPage);
    prevBtn.addEventListener("click", prevPage);

    // Xử lý swipe trên mobile
    let touchStartX = 0;
    let touchEndX = 0;

    brandWrapper.addEventListener("touchstart", (event) => {
      touchStartX = event.changedTouches[0].screenX;
    });

    brandWrapper.addEventListener("touchend", (event) => {
      touchEndX = event.changedTouches[0].screenX;
      if (touchEndX < touchStartX) nextPage();
      if (touchEndX > touchStartX) prevPage();
    });

    // Reset khi resize
    window.addEventListener("resize", () => {
      if (window.innerWidth > 768) {
        brandWrapper.style.transform = "translateX(0)";
        currentIndex = 0;
      } else {
        updateSlider();
      }
    });
  });
});
