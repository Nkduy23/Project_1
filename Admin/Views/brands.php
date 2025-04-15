<div class="admin-tables">
    <div id="successMessage" class="success-message" style="display: none;">
        <span class="checkmark">✔</span>
        <p class="success-message__text"></p>
    </div>
    <div id="errorMessage" class="error-message" style="display: none;">
        <span class="checkmark">✘</span>
        <p class="error-message__text"></p>
    </div>
    <button id="openCreateModalBtn" class="btn btn--primary">Tạo danh mục thương thiệu</button>
    <h1 class="admin-tables__title">Danh sách danh mục thương hiệu</h1>
    <table class="admin-tables__table" id="customerTable">
        <thead>
            <tr>
                <th>Mã danh mục thương hiệu</th>
                <th>Tên danh mục thương hiệu</th>
                <!-- <th>Hình ảnh</th> -->
                <th>Mô tả thương hiệu</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($brands as $brand) : ?>
                <tr>
                    <td class="customer__id"><?= $brand['MaDanhMucThuongHieu'] ?></td>
                    <td class="customer__name"><?= $brand['TenDanhMucThuongHieu'] ?></td>
                    <td class="customer__description"><?= $brand['MoTaThuongHieu'] ?></td>
                    <td class="customer__status"><?= $brand['TrangThai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                    <td>
                        <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-customer-id="<?= $customer['MaTaiKhoan'] ?>">Sửa</a>
                        <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-customer-id="<?= $customer['MaTaiKhoan'] ?>">Xoá</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>