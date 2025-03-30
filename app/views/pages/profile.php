<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login');
    exit;
}
$user = $_SESSION['user'];
?>

<div class="profile-container">
    <h2>Hồ sơ của tôi</h2>
    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>

    <form class="profile-form" action="/update-profile" method="POST">
        <label>Tên:</label>
        <input type="text" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>

        <label>Email:</label>
        <input type="text" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>

        <label>Số điện thoại:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">

        <label>Giới tính:</label>
        <select name="gender">
            <option value="">Chọn giới tính</option>
            <option value="Nam" <?php echo (isset($user['gender']) && $user['gender'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo (isset($user['gender']) && $user['gender'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
            <option value="Khác" <?php echo (isset($user['gender']) && $user['gender'] == 'Khác') ? 'selected' : ''; ?>>Khác</option>
        </select>

        <label>Ngày sinh:</label>
        <input type="date" name="dob" value="<?php echo htmlspecialchars($user['dob'] ?? ''); ?>">

        <h3>Địa chỉ nhận hàng</h3>

        <label>Tỉnh/Thành phố:</label>
        <input type="text" name="province" value="<?php echo htmlspecialchars($user['province'] ?? ''); ?>">

        <label>Quận/Huyện:</label>
        <input type="text" name="district" value="<?php echo htmlspecialchars($user['district'] ?? ''); ?>">

        <label>Phường/Xã:</label>
        <input type="text" name="ward" value="<?php echo htmlspecialchars($user['ward'] ?? ''); ?>">

        <label>Địa chỉ cụ thể:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($user['address'] ?? ''); ?>">

        <button type="submit">Cập nhật</button>
    </form>

    <a href="/logout">Đăng xuất</a>
</div>