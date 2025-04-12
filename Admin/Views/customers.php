<div class="admin-tables">
    <h1 class="admin-tables__title">Danh sách khách hàng</h1>
    <table class="admin-tables__table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Họ và tên</th>
                <th>Trạng thái</th>
                <th>Vai Trò</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $customer['MaTaiKhoan'] ?></td>
                    <td>
                        <?php if ($customer['HinhAnh']): ?>
                            <img class="admin-tables__image" src="<?= $GLOBALS['baseUrl'] ?>img/user/<?= htmlspecialchars($customer['HinhAnh']) ?>" alt="Ảnh KH">
                        <?php else: ?>
                            <span>Không có ảnh</span>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($customer['TenDangNhap']) ?></td>
                    <td><?= htmlspecialchars($customer['Email']) ?></td>
                    <td><?= $customer['HoVaTen'] ?? 'Chưa cập nhật' ?></td>
                    <td>
                        <?php if ($customer['TrangThai']): ?>
                            <span class="admin-tables__status admin-tables__status--active">Hiển thị</span>
                        <?php else: ?>
                            <span class="admin-tables__status admin-tables__status--inactive">Ẩn</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $customer['VaiTro'] ?></td>
                    <td><?= $customer['NgayTao'] ?></td>
                    <td>
                        <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-customer-id="<?= $customer['MaTaiKhoan'] ?>">Sửa</a>
                        <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-customer-id="<?= $customer['MaTaiKhoan'] ?>">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>