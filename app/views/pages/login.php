<div class="auth-container">
    <h2>Đăng Nhập</h2>
    <?php if (!empty($_SESSION['errors'])): ?>
        <div class="error-messages">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="/user/login" method="POST">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Đăng Nhập</button>
        <a href="/register">Chưa có tài khoản? Đăng ký</a>
    </form>
</div>

<?php unset($_SESSION['errors'], $_SESSION['old']); ?>

<?php if (isset($_SESSION['register_success'])): ?>
    <div id="successMessage" class="success-message">
        <span class="checkmark">✔</span>
        <p><?= $_SESSION['register_success'] ?></p>
    </div>

    <script>
        setTimeout(() => {
            let message = document.getElementById('successMessage');
            if (message) {
                message.classList.add('fade-out');
                setTimeout(() => message.style.display = 'none', 500); // Ẩn hẳn sau khi mờ dần
            }
        }, 1000);
    </script>
    <?php unset($_SESSION['register_success']); // Xóa session ngay lập tức 
    ?>
<?php endif;
?>