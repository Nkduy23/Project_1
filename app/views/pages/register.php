<div class="auth-container">
        <h2>Đăng Ký</h2>
        <form action="/user/register" method="POST">
            <label for="name">Họ và Tên</label>
            <input type="text" id="name" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Xác nhận mật khẩu</label>
            <input type="password" id="confirm_password" name="confirmPassword" required>

            <button type="submit">Đăng Ký</button>
            <a href="/login">Đã có tài khoản? Đăng nhập</a>
        </form>
    </div>