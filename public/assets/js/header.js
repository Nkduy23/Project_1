document.addEventListener("DOMContentLoaded", () => {
    setInterval(() => {
        let text = document.querySelector(".header__top p");
        text.innerHTML = text.innerHTML == "Bộ Sưu Tập Đồng Hồ Mới Về" ? "Đăng Ký Nhận Thông Báo Tin Mới" : "Gặp Chuyên Gia Tư Vấn";
    }, 3000);
})