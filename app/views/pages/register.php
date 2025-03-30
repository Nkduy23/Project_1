<div class="auth-container">
    <h2>Đăng Ký</h2>
    <?php if (!empty($_SESSION['errors'])): ?>
        <div class="error-messages">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <form action="/user/register" method="POST">
        <label for="username">Họ và Tên</label>
        <input type="text" id="username" name="username" value="<?= $_SESSION['old']['username'] ?? '' ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>" required>

        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Xác nhận mật khẩu</label>
        <input type="password" id="confirm_password" name="confirmPassword" required>

        <button type="submit">Đăng Ký</button>
        <a href="/login">Đã có tài khoản? Đăng nhập</a>
    </form>
</div>

<?php
// Xóa session lỗi & dữ liệu cũ sau khi hiển thị
unset($_SESSION['errors'], $_SESSION['old']);
?>
