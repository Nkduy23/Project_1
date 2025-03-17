document.addEventListener("DOMContentLoaded", () => {
    const textContent = document.querySelector(".header__top p");
    const messages = [
        "Bộ Sưu Tập Đồng Hồ Mới Về",
        "Đăng Ký Nhận Thông Báo Tin Mới",
        "Gặp Chuyên Gia Tư Vấn"
    ]

    let index = 0;
    
    function changeText() {
        if (textContent) {
            index = (index + 1) % messages.length;
            console.log(index);
            
            textContent.textContent = messages[index];
        }
    }
    setInterval(changeText, 3000);
});