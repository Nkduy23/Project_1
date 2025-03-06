document.addEventListener("DOMContentLoaded", function () {
    const brandList = document.querySelector(".brand__list");
    const brandItems = document.querySelectorAll(".brand__item");
    const itemsPerGroup = 6;
    let currentIndex = 0;
  
    function updateSlider() {
      const translateXValue = -currentIndex * 100 + "%";
      brandList.style.transform = `translateX(${translateXValue})`;
    }
  
    function nextPage() {
      if (currentIndex < Math.ceil(brandItems.length / itemsPerGroup) - 1) {
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
        currentIndex = Math.ceil(brandItems.length / itemsPerGroup) - 1;
      }
      updateSlider();
    }
  
    document.querySelector(".brand__arrow--right").addEventListener("click", nextPage);
    document.querySelector(".brand__arrow--left").addEventListener("click", prevPage);
  
    let touchStartX = 0;
    let touchEndX = 0;
  
    brandList.addEventListener("touchstart", function (event) {
      touchStartX = event.changedTouches[0].screenX;
    });
  
    brandList.addEventListener("touchend", function (event) {
      touchEndX = event.changedTouches[0].screenX;
      if (touchEndX < touchStartX) nextPage();
      if (touchEndX > touchStartX) prevPage();
    });
  
    window.addEventListener("resize", function () {
      if (window.innerWidth > 768) {
        brandList.style.transform = "translateX(0)";
      } else {
        updateSlider();
      }
    });
  });
  