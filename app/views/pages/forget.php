<div class="auth-container">
    <h2>Quên Mật Khẩu</h2>
    <form action="/user/forget" method="POST">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="username">Tên Đăng nhập</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Gửi Yêu Cầu</button>
        <div class="auth-footer">
            <a href="/login">Quay lại đăng nhập</a>
            <a href="/register">Chưa có tài khoản? Đăng ký</a>
        </div>
    </form>
</div>
