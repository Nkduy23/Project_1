<div class="admin-tables">
  <div id="successMessage" class="success-message" style="display: none;">
    <span class="checkmark">✔</span>
    <p class="success-message__text"></p>
  </div>
  <div id="errorMessage" class="error-message" style="display: none;">
    <span class="checkmark">✘</span>
    <p class="error-message__text"></p>
  </div>
  <button id="openCreateModalBtn" class="btn btn--primary">Tạo tài khoản</button>
  <h1 class="admin-tables__title">Danh sách tài khoản</h1>
  <table class="admin-tables__table" id="customerTable">
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
        <tr class="customer-row" data-customer-id="<?= $customer['MaTaiKhoan'] ?>">
          <td class="customer__id"><?= $customer['MaTaiKhoan'] ?></td>
          <td class="customer__image">
            <?php if ($customer['HinhAnh']): ?>
              <img class="admin-tables__image" src="<?= $GLOBALS['baseUrl'] ?>img/<?= htmlspecialchars($customer['HinhAnh']) ?>" alt="Ảnh KH">
            <?php else: ?>
              <span>Không có ảnh</span>
            <?php endif; ?>
          </td>
          <td class="customer__username"><?= htmlspecialchars($customer['TenDangNhap']) ?></td>
          <td class="customer__email"><?= htmlspecialchars($customer['Email']) ?></td>
          <td class="customer__fullname"><?= $customer['HoVaTen'] ?? 'Chưa cập nhật' ?></td>
          <td class="customer__status">
            <?php if ($customer['TrangThai']): ?>
              <span class="admin-tables__status admin-tables__status--active">
                <i class="fa-solid fa-eye"></i>
              </span>
            <?php else: ?>
              <span class="admin-tables__status admin-tables__status--inactive">
                <i class="fa-solid fa-eye-slash"></i>
              </span>
            <?php endif; ?>
          </td>
          <td class="customer__role">
            <?php if ($customer['VaiTro']): ?>
              <span class="admin-tables__status admin-tables__status--admin">
                Quản lý
              </span>
            <?php else: ?>
              <span class="admin-tables__status admin-tables__status--user">
                Không
              </span>
            <?php endif; ?>
          </td>
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

<!-- Thêm tài khoản -->
<div class="modal" id="addCustomerModal">
  <div class="modal__overlay"></div>
  <div class="modal__body">
    <div class="modal__content">
      <div class="modal__header">
        <h2 class="modal__title">Thêm tài khoản</h2>
      </div>

      <form class="modal__form" id="createCustomerForm">
        <div class="modal__form-group">
          <label for="customerImage">Ảnh tài khoản</label>
          <input type="file" id="customerImage" name="HinhAnh">
        </div>

        <div class="modal__form-group">
          <label for="customerName">Tên tài khoản</label>
          <input type="text" id="customerName" name="TenDangNhap" required>
        </div>

        <div class="modal__form-group">
          <label for="customerEmail">Email</label>
          <input type="email" id="customerEmail" name="Email" required>
        </div>

        <div class="modal__form-group">
          <label for="customerPassword">Mật Khẩu</label>
          <input type="password" id="customerPassword" name="MatKhau">
        </div>

        <div class="modal__form-group">
          <label for="customerFullName">Họ Tên</label>
          <input type="text" id="customerFullName" name="HoVaTen">
        </div>

        <div class="modal__form-group">
          <label for="customerAddress">Địa Chỉ</label>
          <input type="text" id="customerAddress" name="DiaChi">
        </div>

        <div class="modal__form-group">
          <label for="customerPhone">Số Điện Thoại</label>
          <input type="number" id="customerPhone" name="SoDienThoai">
        </div>

        <div class="modal__form-group">
          <label for="customerStatus">Trạng thái</label>
          <select id="customerStatus" name="TrangThai">
            <option value="1 ">Hiển thị</option>
            <option value="0">Ẩn</option>
          </select>
        </div>

        <div class="modal__form-group">
          <label for="customerRole">Vai trò</label>
          <select id="customerRole" name="VaiTro">
            <option value="0">Không</option>
            <option value="1">Quản lý</option>
          </select>
        </div>

        <div class="modal__actions">
          <button type="submit" class="modal__btn modal__btn--save">Lưu</button>
          <button type="button" class="modal__btn modal__btn--close js-modal-close" id="closeCreateModalBtn">Huỷ</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Sửa tài khoản -->
<div class="modal" id="editCustomerModal">
  <div class="modal__overlay"></div>
  <div class="modal__body">
    <div class="modal__content">
      <div class="modal__header">
        <h2 class="modal__title">Sửa tài khoản</h2>
      </div>

      <form class="modal__form" id="editCustomerForm">
        <input type="hidden" id="editCustomerId" name="MaSanPham">
        <input type="hidden" id="oldImageInput" name="OldImage">

        <div class="modal__form-group">
          <label for="productImage">Ảnh hiện tại</label>
          <img id="EditCurrentImagePreview" src="" alt="Ảnh hiện tại" style="width: 100px; display: block; margin-bottom: 8px;">
        </div>

        <div class="modal__form-group">
          <label for="productImage">Chọn ảnh mới</label>
          <input type="file" id="editCustomerImage" name="HinhAnh">
        </div>

        <div class="modal__form-group">
          <label for="editCustomerName">Tên Đăng Nhập</label>
          <input type="text" id="editCustomerName" name="TenDangNhap" required>
        </div>

        <div class="modal__form-group">
          <label for="editCustomerEmail">Email</label>
          <input type="email" id="editCustomerEmail" name="Email" required>
        </div>

        <div class="modal__form-group">
          <label for="editCustomerFullName">Họ Tên</label>
          <input type="text" id="editCustomerFullName" name="HoVaTen">
        </div>

        <div class="modal__form-group">
          <label for="editCustomerStatus">Trạng thái</label>
          <select id="editCustomerStatus" name="TrangThai">
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
          </select>
        </div>

        <div class="modal__form-group">
          <label for="editCustomerRole">Vai trò</label>
          <select id="editCustomerRole" name="VaiTro">
            <option value="0">Không</option>
            <option value="1">Quản lý</option>
          </select>
        </div>

        <div class="modal__actions">
          <button type="submit" class="modal__btn modal__btn--save">Lưu</button>
          <button type="button" class="modal__btn modal__btn--close" id="closeEditModalBtn">Huỷ</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function showSuccessMessage(message) {
    console.log(message);

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
  const createModal = document.getElementById('addCustomerModal');
  const openCreateModelBtn = document.getElementById('openCreateModalBtn');
  const closeCreateModalBtn = document.getElementById('closeCreateModalBtn');
  const customerTable = document.getElementById('customerTable');

  openCreateModelBtn.addEventListener('click', () => {
    createModal.classList.add('modal--active');
  });

  closeCreateModalBtn.addEventListener('click', () => {
    createModal.classList.remove('modal--active');
  });

  createModal.querySelector('.modal__overlay').addEventListener('click', () => {
    createModal.classList.remove('modal--active');
  });

  document.getElementById('createCustomerForm').addEventListener('submit', async (e) => {
    e.preventDefault(); //Ngăn chặn trình duyệt gửi form đi

    const form = e.target;

    const formData = new FormData(form); // Là đối tượng giúp dễ dàng lấy dữ liệu từ form

    try {
      const response = await fetch('/api.php?module=customer&action=create', {
        method: 'POST',
        body: formData
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const result = await response.json();

      if (!result.success) {
        showErrorMessage(result.message);
        return;
      }

      if (result.success && result.data) {

        showSuccessMessage(result.message);

        const customer = result.data;

        createModal.classList.remove('modal--active');

        form.reset();

        const newRow = document.createElement('tr');
        newRow.className = 'customer-row';
        newRow.setAttribute('data-customer-id', customer.MaTaiKhoan);

        newRow.innerHTML = `
            <td>${customer.MaTaiKhoan}</td>
            <td><img class="admin-tables__image" src="<?= $GLOBALS['baseUrl'] ?>img/${customer.HinhAnh}" alt="${customer.TenDangNhap}"></td>
            <td>${customer.TenDangNhap}</td>
            <td>${customer.Email}</td>
            <td>${customer.HoVaTen}</td>
            <td>${customer.TrangThai == 1 ? 'Hiển thị' : 'ẨN'}</td>
            <td>${customer.VaiTro == 1 ? 'Quản lý' : 'Không'}</td>
            <td>${customer.NgayTao}</td>
            <td>
                <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-customer-id="${customer.MaTaiKhoan}">Sửa</a>
                <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-customer-id="${customer.MaTaiKhoan}">Xóa</a>
            </td>
        `;
        document.querySelector('#customerTable tbody').appendChild(newRow);
      } else {
        throw new Error(result.message);
      }
    } catch (err) {
      console.error(err);
    }
  });
</script>

<script>
  const editModal = document.getElementById('editCustomerModal');
  const closeEditModalBtn = document.getElementById('closeEditModalBtn');

  closeEditModalBtn.addEventListener('click', () => { 
    editModal.classList.remove('modal--active');
  });

  editModal.querySelector('.modal__overlay').addEventListener('click', () => {
    editModal.classList.remove('modal--active');
  });

  let editingCustomerId = null;

  document.querySelectorAll('.js-edit-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {

      e.preventDefault();

      const customerId = btn.getAttribute('data-customer-id');

      editingCustomerId = customerId;

      const editForm = document.getElementById('editCustomerForm');

      editModal.classList.add('modal--active');

      try {
        const response = await fetch(`/api.php?module=customer&action=get&id=${customerId}`);

        if (!response.ok) {
          throw new Error("Network response was not ok"); // Xây dựng lỗi
        }

        const customer = await response.json();

        editModal.querySelector('#EditCurrentImagePreview').src = `<?= rtrim($GLOBALS['baseUrl'], '/') ?>/img/${customer.HinhAnh}`;
        editModal.querySelector('#EditCurrentImagePreview').alt = customer.TenDangNhap;
        editForm.querySelector('[name="TenDangNhap"]').value = customer.TenDangNhap;
        editForm.querySelector('[name="Email"]').value = customer.Email;
        editForm.querySelector('[name="HoVaTen"]').value = customer.HoVaTen;
        editForm.querySelector('[name="TrangThai"]').value = customer.TrangThai;
        editForm.querySelector('[name="VaiTro"]').value = customer.VaiTro;
      } catch (error) {
        console.error(error);
      }
    });
  });

  document.getElementById('editCustomerForm').addEventListener('submit', async (e) => {
    e.preventDefault(); //Ngăn chặn trình duyệt gửi form đi

    const form = e.target;

    const formData = new FormData(form); // Là đối tượng giúp dễ dàng lấy dữ liệu từ form

    const imageFile = document.getElementById('editCustomerImage').files[0];
    if (imageFile) {
      formData.append('HinhAnh', imageFile);
    }
    formData.append('MaTaiKhoan', editingCustomerId);

    try {
      const response = await fetch('/api.php?module=customer&action=update', {
        method: 'POST',
        body: formData
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const result = await response.json();

      if (result.success) {
        showSuccessMessage(result.message);

        const data = result.data;

        const row = document.querySelector(`tr[data-customer-id="${editingCustomerId}"]`);

        if (row) {
          row.querySelector('.admin-tables__image').src = `<?= $GLOBALS['baseUrl'] ?>img/${data.HinhAnh}`;
          row.querySelector('.customer__username').textContent = data.TenDangNhap;
          row.querySelector('.customer__email').textContent = data.Email;
          row.querySelector('.customer__fullname').textContent = data.HoVaTen;
          row.querySelector('.customer__status').textContent = data.TrangThai == 1 ? 'Hiển thị' : 'ẨN';
          row.querySelector('.customer__role').textContent = data.VaiTro == 1 ? 'Quản lý' : 'Không';
        }
      } else {
        throw new Error(result.message);
      }
    } catch (err) {
      console.error(err);
    }

    editModal.classList.remove('modal--active');
  });
</script>

<script>
  document.querySelector('#customerTable').addEventListener('click', async (e) => {
    const deleteBtn = e.target.closest('.js-delete-btn');

    if (!deleteBtn) return;

    e.preventDefault();

    const customerId = deleteBtn.getAttribute('data-customer-id');

    if (confirm("Bạn có chắc muốn xóa tài khoản này không?")) {
      try {
        const response = await fetch(`/api.php?module=customer&action=delete&id=${customerId}`, {
          method: 'DELETE'
        });

        const result = await response.json();

        if (result.success) {
          // Xoá dòng <tr> tương ứng khỏi DOM mà không cần reload
          const row = deleteBtn.closest('tr');
          row.remove();
          alert("Đã xoá sản phẩm!");
        } else {
          alert("Xoá thất bại: " + (result.message || ""));
        }
      } catch (err) {
        console.error("Lỗi khi xoá:", err);
        alert("Đã xảy ra lỗi khi xoá.");
      }
    }
  });
</script>