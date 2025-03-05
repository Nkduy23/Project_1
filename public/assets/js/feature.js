document.addEventListener("DOMContentLoaded", function () {
  const featureList = document.querySelector(".feature__list");
  const featureItems = document.querySelectorAll(".feature__item");
  const itemsPerPage = 6;
  let currentPage = 0;

  function showItems(page) {
    featureItems.forEach((item, index) => {
      if (index >= page * itemsPerPage && index < (page + 1) * itemsPerPage) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  }

  // Hàm hiển thị tất cả các ảnh (dùng cho màn hình lớn hơn 768px)
  function showAllItems() {
    featureItems.forEach((item) => {
      item.style.display = "block";
    });
  }

  function nextPage() {
    if (currentPage < Math.ceil(featureItems.length / itemsPerPage) - 1) {
      currentPage++;
      showItems(currentPage);
    } else {
      currentPage = 0;
      showItems(currentPage);
    }
  }

  function prevPage() {
    if (currentPage > 0) {
      currentPage--;
      showItems(currentPage);
    } else {
      currentPage = Math.ceil(featureItems.length / itemsPerPage) - 1;
      showItems(currentPage);
    }
  }

  const nextButton = document.querySelector(".feature__arrow--right");
  const prevButton = document.querySelector(".feature__arrow--left");

  nextButton.addEventListener("click", nextPage);
  prevButton.addEventListener("click", prevPage);

  let touchStartX = 0;
  let touchEndX = 0;

  featureList.addEventListener("touchstart", function (event) {
    touchStartX = event.changedTouches[0].screenX;
  });

  featureList.addEventListener("touchend", function (event) {
    touchEndX = event.changedTouches[0].screenX;
    handleSwipe();
  });

  function handleSwipe() {
    if (touchEndX < touchStartX) {
      nextPage();
    }
    if (touchEndX > touchStartX) {
      prevPage();
    }
  }

  window.addEventListener("resize", function () {
    if (window.innerWidth > 768) {
      showAllItems();
    } else {
      showItems(currentPage);
    }
  });

  // Khởi tạo hiển thị ban đầu
  if (window.innerWidth <= 768) {
    showItems(currentPage);
  } else {
    showAllItems();
  }
});
