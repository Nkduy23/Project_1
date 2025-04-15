<div class="admin-tables">
  <div id="successMessage" class="success-message" style="display: none;">
    <span class="checkmark">✔</span>
    <p class="success-message__text"></p>
  </div>

  <div id="errorMessage" class="error-message" style="display: none;">
    <span class="checkmark">✘</span>
    <p class="error-message__text"></p>
  </div>

  <h1 class="admin-tables__title">Danh sách đơn hàng</h1>
  <table class="admin-tables__table" id="orderTable">
    <thead>
      <tr>
        <th>Mã đơn hàng</th>
        <th>Mã tài khoản</th>
        <th>Ngày đặt hàng</th>
        <th>Địa chỉ nhận hàng</th>
        <th>Thành phố</th>
        <th>Tổng tiền</th>
        <th>Phương thức thanh toán</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    <tbody>
      <?php foreach ($orders as $order) : ?>
        <tr class="order-row" data-order-id="<?= $order['MaDonHang'] ?>">
          <td class="order__id"><?= $order['MaDonHang'] ?></td>
          <td class="order__user-id"><?= $order['MaTaiKhoan'] ?></td>
          <td class="order__created-at"><?= $order['NgayDat'] ?></td>
          <td class="order__address"><?= $order['DiaChiNhanHang'] ?></td>
          <td class="order__city"><?= $order['ThanhPho'] ?></td>
          <td class="order__total"><?= $order['TongTien'] ?></td>
          <td class="order__payment">
            <?php
            $paymentMethodText = [
              0 => 'Thanh toán khi giao hàng (COD)',
              1 => 'Chuyển khoản ngân hàng',
              2 => 'Ví MoMo'
            ];
            echo $paymentMethodText[$order['PhuongThucThanhToan']] ?? 'Không xác định';
            ?>
          </td>
          <td class="order__status">
            <?php
            $statusText = [
              0 => 'Chờ xử lý',
              1 => 'Đang xử lý',
              3 => 'Đang giao hàng',
              4 => 'Giao hàng thành công'
            ];
            echo $statusText[$order['TrangThai']] ?? 'Không xác định';
            ?>
          </td>
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

<!-- Sửa đơn hàng -->
<div class="modal" id="editOrderModal">
  <div class="modal__overlay"></div>
  <div class="modal__body">
    <div class="modal__content">
      <div class="modal__header">
        <h2 class="modal__title">Sửa đơn hàng</h2>
      </div>
      <form action="" method="POST" id="editOrderForm">
        <input type="hidden" id="editOrderId" name="MaDonHang">
        <div class="modal__form">
          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Mã tài khoản</label>
            <input type="text" id="editOrderUserId" name="MaTaiKhoan" class="modal__form-input" required>
          </div>

          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Ngày đặt hàng</label>
            <input type="text" id="editOrderDate" name="NgayDat" class="modal__form-input" required>
          </div>

          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Địa chỉ nhận hàng</label>
            <input type="text" id="editOrderAddress" name="DiaChiNhanHang" class="modal__form-input" required>
          </div>

          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Thành phố</label>
            <input type="text" id="editOrderCity" name="ThanhPho" class="modal__form-input" required>
          </div>

          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Tổng tiền</label>
            <input type="text" id="editOrderTotal" name="TongTien" class="modal__form-input" required>
          </div>

          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Phương thức thanh toán</label>
            <!-- <input type="text" id="editOrderPayment" name="PhuongThucThanhToan" class="modal__form-input" required> -->
            <select name="PhuongThucThanhToan" id="editOrderPayment">
              <option value="0">Thanh toán khi nhận hàng (COD)</option>
              <option value="1">Chuyển khoản ngân hàng</option>
              <option value="2">Ví MoMo</option>
            </select>
          </div>

          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Trạng thái</label>
            <!-- <input type="text" id="editOrderStatus" name="TrangThai" class="modal__form-input" required> -->
            <select name="TrangThai" id="editOrderStatus">
              <option value="0">Chờ xử lý</option>
              <option value="1">Đang xử lý</option>>
              <option value="3">Đang giao hàng</option>
              <option value="4">Giao hàng thành công</option>
            </select>
          </div>
        </div>

        <div class="modal__footer">
          <button type="submit" class="modal__btn modal__btn--save">Sửa</button>
          <button type="button" class="modal__btn modal__btn--close " id="closeEditModalBtn">Hủy</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function showSuccessMessage(message) {
    const messageBox = document.getElementById('successMessage');
    messageBox.querySelector('.success-message__text').textContent = message;
    messageBox.style.display = 'flex';
    setTimeout(() => {
      messageBox.style.display = 'none';
    }, 2500);
  }

  function showErrorMessage(message) {
    const messageBox = document.getElementById('errorMessage');
    messageBox.querySelector('.error-message__text').textContent = message;
    messageBox.style.display = 'flex';
    setTimeout(() => {
      messageBox.style.display = 'none';
    }, 2500);
  }
</script>

<script>
  const editOrderModal = document.getElementById('editOrderModal');
  const closeEditModalBtn = document.getElementById('closeEditModalBtn');

  closeEditModalBtn.addEventListener('click', () => {
    editOrderModal.classList.remove('modal--active');
  });

  editOrderModal.querySelector('.modal__overlay').addEventListener('click', () => {
    editOrderModal.classList.remove('modal--active');
  });

  document.querySelectorAll('.js-edit-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {

      editOrderModal.classList.add('modal--active');

      e.preventDefault();

      const orderId = btn.getAttribute('data-order-id');

      selectedOrderId = orderId;

      const editOrder = document.getElementById('editOrderModal');

      try {
        const response = await fetch(`/api.php?module=order&action=get&id=${orderId}`);

        if (!response.ok) {
          throw new Error('Failed to fetch order');
        }

        const result = await response.json();
        const data = result.data;

        if (!result.success) {
          console.warn("Lỗi nghiệp vụ:", result.message);
          showErrorMessage(result.message);
          return;
        }

        editOrder.querySelector('[name = "MaTaiKhoan"]').value = data.MaTaiKhoan;
        editOrder.querySelector('[name = "NgayDat"]').value = data.NgayDat;
        editOrder.querySelector('[name = "DiaChiNhanHang"]').value = data.DiaChiNhanHang;
        editOrder.querySelector('[name = "ThanhPho"]').value = data.ThanhPho;
        editOrder.querySelector('[name = "TongTien"]').value = data.TongTien;
        editOrder.querySelector('[name = "PhuongThucThanhToan"]').value = data.PhuongThucThanhToan;
        editOrder.querySelector('[name = "TrangThai"]').value = data.TrangThai;

      } catch (error) {
        console.log(error);
        showErrorMessage(error.message);
      }
    })
  });

  document.getElementById('editOrderForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = e.target;

    const formData = new FormData(form);

    formData.append('MaDonHang', selectedOrderId);

    try {
      const response = await fetch('/api.php?module=order&action=update', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (!result.success) {
        console.warn("Lỗi nghiệp vụ:", result.message);
        showErrorMessage(result.message);
        return;
      }

      const data = result.data;

      const row = document.querySelector(`tr[data-order-id="${selectedOrderId}"]`);

      if (row) {
        row.querySelector('.order__user-id').textContent = data.MaTaiKhoan;
        row.querySelector('.order__created-at').textContent = data.NgayDat;
        row.querySelector('.order__address').textContent = data.DiaChiNhanHang;
        row.querySelector('.order__city').textContent = data.ThanhPho;
        row.querySelector('.order__total').textContent = data.TongTien;
        row.querySelector('.order__payment').textContent = {
          0: 'Thanh toán khi giao hàng (COD)',
          1: 'Chuyển khoản ngân hàng',
          2: 'Ví MoMo'
        } [data.PhuongThucThanhToan] || 'Không xác định';

      }

      row.querySelector('.order__status').textContent = {
        0: 'Chờ xử lý',
        1: 'Đang xử lý',
        3: 'Đang giao hàng',
        4: 'Giao hàng thành công'
      } [data.TrangThai] || 'Không xác định';

      editOrderModal.classList.remove('modal--active');

      showSuccessMessage(result.message);

    } catch (error) {
      console.log(error);
      showErrorMessage(error.message);
    }
  });
</script>
<script>
  document.querySelector('#orderTable').addEventListener('click', async (e) => {
    const deleteBtn = e.target.closest('.js-delete-btn');

    if (!deleteBtn) return;

    e.preventDefault();

    const orderId = deleteBtn.getAttribute('data-order-id');

    if (confirm("Bạn có chắc muốn xóa tài khoản này không?")) {
      try {
        const response = await fetch(`/api.php?module=order&action=delete&id=${orderId}`, {
          method: 'DELETE'
        });

        const result = await response.json();

        if (result.success) {
          // Xoá dòng <tr> tương ứng khỏi DOM mà không cần reload
          const row = deleteBtn.closest('tr');
          row.remove();
          alert("Đã xoá đơn hàng!");
        } else {
          alert(result.message);
        }
      } catch (err) {
        console.error("Lỗi khi xoá:", err);
        alert("Đã xảy ra lỗi khi xóa");
      }
    }
  });
</script>