<div class="admin-tables">
  <div id="successMessage" class="success-message" style="display: none;">
    <span class="checkmark">✔</span>
    <p class="success-message__text"></p>
  </div>

  <div id="errorMessage" class="error-message" style="display: none;">
    <span class="checkmark">✘</span>
    <p class="error-message__text"></p>
  </div>

  <h1 class="admin-tables__title">Danh sách dịch vụ</h1>
  <table class="admin-tables__table" id="orderTable">
    <thead>
      <tr>
        <th>Mã dịch vụ</th>
        <th>Tên dịch vụ</th>
        <th>Mô tả</th>
        <th>Gia</th>
        <th>Ngày đăng ký</th>
        <th>Mã tài khoản</th>
        <th>Thao tác</th>
      </tr>
    <tbody>
      <?php foreach ($services as $service) : ?>
            <td><?= $service['MaDichVu']?></td>
            <td><?= $service['TenDichVu']?></td>
            <td><?= $service['MoTa']?></td>
            <td><?= $service['Gia']?></td>
            <td><?= $service['NgayDangKy']?></td>
            <td><?= $service['MaTaiKhoan']?></td>
          <td>
            <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-order-id="<?= $order['MaDonHang'] ?>">Sửa</a>
            <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-order-id="<?= $order['MaDonHang'] ?>">Xoá</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </thead>
  </table>
</div>