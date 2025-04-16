<div class="auth-container">
    <h2>Đổi Mật Khẩu</h2>
    <form action="/change-password" method="POST">
        <label for="current-password">Mật khẩu hiện tại</label>
        <input type="password" id="current-password" name="current_password" required>

        <label for="new-password">Mật khẩu mới</label>
        <input type="password" id="new-password" name="new_password" required>

        <label for="confirm-password">Xác nhận mật khẩu mới</label>
        <input type="password" id="confirm-password" name="confirm_password" required>

        <button type="submit">Xác nhận thay đổi</button>

        <div class="auth-footer">
            <a href="/profile">Quay lại hồ sơ</a>
        </div>
    </form>
</div>