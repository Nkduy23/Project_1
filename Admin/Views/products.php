<div class="admin-tables">
  <div id="successMessage" class="success-message" style="display: none;">
    <span class="checkmark">✔</span>
    <p class="success-message__text"></p>
  </div>
  <button id="openCreateModalBtn" class="btn btn--primary">Tạo sản phẩm</button>
  <h1 class="admin-tables__title">Danh sách sản phẩm</h1>
  <table class="admin-tables__table" id="productTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ảnh</th>
        <th>Ảnh hover</t>
        <th>Tên</th>
        <th>Giá</th>
        <th>Tồn kho</th>
        <th>Trạng thái</th>
        <th>Mô tả</th>
        <th>Giảm giá</th>
        <th>Đang giảm giá</th>
        <th>Nhãn</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product): ?>
        <tr class="product-row" data-product-id="<?= $product['MaSanPham'] ?>">
          <td class="product__id"><?= $product['MaSanPham'] ?></td>
          <td class="product__image">
            <img class="admin-tables__image" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($product['HinhAnh']); ?>" alt="<?= $product['TenSanPham'] ?>">
          </td>
          <td class="product__image">
            <img class="admin-tables__image" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($product['HinhAnhHover']); ?>" alt="<?= $product['TenSanPham'] ?>">
          </td>
          <td class="product__name"><?php echo htmlspecialchars($product['TenSanPham']); ?></td>
          <td class="product__price"><?= number_format($product['DonGia'], 0, ',', '.') ?>đ</td>
          <td class="product__quantity"><?php echo htmlspecialchars($product['SoLuongTonKho']); ?></td>
          <td class="product__status">
            <?php if ($product['TrangThai']): ?>
              <span class="admin-tables__status admin-tables__status--active">
                <i class="fa-solid fa-eye"></i>
              </span>
            <?php else: ?>
              <span class="admin-tables__status admin-tables__status--inactive">
                <i class="fa-solid fa-eye-slash"></i>
              </span>
            <?php endif; ?>
          </td>

          <td class="product__description">
            <p class="product__description-text">
              <?php echo htmlspecialchars($product['MoTa']); ?>
            </p>
          </td>
          <td class="product__discount">
            <p class="product__discount-text">
              <?php if ($product['GiaGiam'] === null): ?>
                <span class="admin-tables__price">Không</span>
              <?php else: ?>
                <span class="admin-tables__price"><?php echo number_format($product['GiaGiam'], 0, ',', '.'); ?></span>
              <?php endif; ?>
            </p>
          </td>
          <td class="product__is-discount">
            <p class="product__is-discount-text">
              <?php echo $product['DangGiamGia'] ? 'Có' : 'Không'; ?>
            </p>
          </td>
          <td class="product__label">
            <p class="product__label-text">
              <?php if ($product['Nhan'] === null): ?>
                <span class="admin-tables__price">Không</span>
              <?php else: ?>
                <span class="admin-tables__price"><?php echo $product['Nhan']; ?></span>
              <?php endif; ?>
            </p>
          </td>
          <td>
            <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-product-id="<?= $product['MaSanPham'] ?>">Sửa</a>
            <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-product-id="<?= $product['MaSanPham'] ?>">Xoá</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>

<!-- Thêm sản phẩm -->
<div class="modal" id="createProductModal">
  <div class="modal__overlay"></div>
  <div class="modal__content">
    <h2 class="modal__title">Tạo sản phẩm</h2>
    <form class="modal__form" id="createProductForm">
      <div class="modal__form-group">
        <label for="productImage">Ảnh sản phẩm</label>
        <input type="file" id="createProductImage" name="HinhAnh" required>
      </div>

      <div class="modal__form-group">
        <label for="productImageHover">Ảnh hover</label>
        <input type="file" id="createProductImageHover" name="HinhAnhHover" required>
      </div>

      <div class="modal__form-group">
        <label>Danh mục sản phẩm</label>
        <select name="MaDanhMucSanPham" required>
          <option value="1">Thương hiệu</option>
          <option value="2">Đồng hồ nam</option>
          <option value="3">Đồng hồ nữ</option>
          <option value="4">Đồng hồ cặp</option>
          <option value="5">Trang sức</option>
          <option value="6">Phụ kiện</option>
        </select>
      </div>

      <div class="modal__form-group">
        <label>Thương hiệu</label>
        <select name="MaDanhMucThuongHieu" required>
          <option value="1">Casio</option>
          <option value="2">Seiko</option>
          <option value="3">Citizen</option>
          <option value="4">Tissot</option>
        </select>
      </div>

      <div class="modal__form-group">
        <label for="productName">Tên sản phẩm</label>
        <input type="text" id="createProductName" name="TenSanPham" required />
      </div>

      <div class="modal__form-group">
        <label for="productPrice">Giá gốc</label>
        <input type="number" id="createProductPrice" name="DonGia" required />
      </div>

      <div class="modal__form-group">
        <label for="discountPrice">Giá giảm</label>
        <input type="number" id="CreateDiscountPrice" name="GiaGiam" />
      </div>

      <div class="modal__form-group">
        <label for="productQuantity">Tồn kho</label>
        <input type="number" id="createProductQuantity" name="SoLuongTonKho" required />
      </div>

      <div class="modal__form-group">
        <label for="dangGiamGia">Đang giảm giá?</label>
        <select id="CreateDangGiamGia" name="DangGiamGia">
          <option value="0">Không</option>
          <option value="1">Có</option>
        </select>
      </div>

      <div class="modal__form-group">
        <label for="nhan">Nhãn</label>
        <input type="text" id="createProductNhan" name="Nhan" placeholder="VD: New, Hot, ..." />
      </div>

      <div class="modal__form-group">
        <label for="productStatus">Trạng thái</label>
        <select id="createProductStatus" name="TrangThai">
          <option value="1">Hiển thị</option>
          <option value="0">Ẩn</option>
        </select>
      </div>

      <div class="modal__form-group">
        <label for="productDescription">Mô tả</label>
        <textarea id="createProductDescription" name="MoTa"></textarea>
      </div>

      <div class="modal__actions">
        <button type="submit" class="modal__btn modal__btn--save">Tạo</button>
        <button type="button" class="modal__btn modal__btn--close" id="closeCreateModalBtn">Huỷ</button>
      </div>
    </form>
  </div>
</div>

<!-- Sửa sản phẩm -->
<div class="modal" id="editProductModal">
  <div class="modal__overlay"></div>
  <div class="modal__content">
    <h2 class="modal__title">Sửa sản phẩm</h2>
    <form class="modal__form" id="editProductForm">
      <input type="hidden" id="editProductId" name="MaSanPham">
      <input type="hidden" id="oldImageInput" name="OldImage">

      <div class="modal__form-group">
        <label for="productImage">Ảnh hiện tại</label>
        <img id="EditCurrentImagePreview" src="" alt="Ảnh hiện tại" style="width: 100px; display: block; margin-bottom: 8px;">
      </div>

      <div class="modal__form-group">
        <label for="productImage">Chọn ảnh mới</label>
        <input type="file" id="EditProductImage" name="HinhAnh">
      </div>

      <div class="modal__form-group">
        <label for="productCategory">Chọn danh mục sản phẩm</label>
        <select name="MaDanhMucSanPham">
          <option value="1">Thương hiệu</option>
          <option value="2">Đồng hồ nam</option>
          <option value="3">Đồng hồ nữ</option>
          <option value="4">Đồng hồ cặp</option>
          <option value="5">Trang sức</option>
          <option value="6">Phụ kiện</option>
        </select>
      </div>

      <div class="modal__form-group">
        <label for="productBrand">Chọn danh mục thương hiệu</label>
        <select name="MaDanhMucThuongHieu">
          <option value="1">Casio</option>
          <option value="2">Seiko</option>
          <option value="3">Citizen</option>
          <option value="4">Tissot</option>
        </select>
      </div>

      <div class="modal__form-group">
        <label for="productName">Tên sản phẩm</label>
        <input type="text" id="EditProductName" name="TenSanPham" />
      </div>

      <div class="modal__form-group">
        <label for="productPrice">Giá</label>
        <input type="number" id="EditProductPrice" name="DonGia" />
      </div>

      <div class="modal__form-group">
        <label for="productQuantity">Tồn kho</label>
        <input type="number" id="EditProductQuantity" name="SoLuongTonKho" />
      </div>

      <div class="modal__form-group">
        <label for="productStatus">Trạng thái</label>
        <select id="EditProductStatus" name="TrangThai">
          <option value="1">Hiển thị</option>
          <option value="0">Ẩn</option>
        </select>
      </div>

      <div class="modal__form-group">
        <label for="productDescription">Mô tả</label>
        <textarea id="EditProductDescription" name="MoTa"></textarea>
      </div>

      <div class="modal__actions">
        <button type="submit" class="modal__btn modal__btn--save">Lưu</button>
        <button type="button" class="modal__btn modal__btn--close" id="closeEditModalBtn">Huỷ</button>
      </div>
    </form>
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
</script>


<!-- Tạo sản phẩm -->
<script>
  const createModal = document.getElementById('createProductModal');
  const openCreateModalBtn = document.getElementById('openCreateModalBtn');
  const closeCreateModalBtn = document.getElementById('closeCreateModalBtn');
  const productTable = document.getElementById('productTable');

  openCreateModalBtn.addEventListener('click', () => {
    createModal.classList.add('modal--active');
  });

  closeCreateModalBtn.addEventListener('click', () => {
    createModal.classList.remove('modal--active');
  });

  createModal.querySelector('.modal__overlay').addEventListener('click', () => {
    createModal.classList.remove('modal--active');
  });

  document.getElementById('createProductForm').addEventListener('submit', async (e) => {
    e.preventDefault(); //Ngăn chặn trình duyệt gửi form đi

    // Tự sử lý form bằng javascript tại đây

    const form = e.target;

    const formData = new FormData(form); // Là đối tượng giúp dễ dàng lấy dữ liệu từ form

    try {
      const response = await fetch('/api.php?module=product&action=create', {
        method: 'POST',
        body: formData
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }

      const result = await response.json();

      if (result.success && result.data) {

        const product = result.data;

        createModal.classList.remove('modal--active');

        showSuccessMessage(result.message);

        form.reset();

        const newRow = document.createElement('tr');
        newRow.className = 'product-row';
        newRow.setAttribute('data-product-id', product.MaSanPham);

        newRow.innerHTML = `
            <td>${product.MaSanPham}</td>
            <td><img class="admin-tables__image" src="<?= $GLOBALS['baseUrl'] ?>img/product/${product.HinhAnh}" alt="${product.TenSanPham}"></td>
            <td><img class="admin-tables__image" src="<?= $GLOBALS['baseUrl'] ?>img/product/${product.HinhAnhHover}" alt="${product.TenSanPham}"></td>
            <td>${product.TenSanPham}</td>
            <td>${product.DonGia}</td>
            <td>${product.SoLuongTonKho}</td>
            <td>${product.TrangThai == 1 ? 
            ' <span class="admin-tables__status admin-tables__status--active"><i class="fa-solid fa-eye"></i></span>' :
            ' <span class="admin-tables__status admin-tables__status--inactive"><i class="fa-solid fa-eye-slash"></i></span>'}</td>    
            <td>${product.MoTa}</td>
            <td>${product.GiaGiam}</td>
            <td>${product.DangGiaGiam == 1 ? 'Có' : 'Không'}</td>
            <td>${product.Nhan}</td>
            <td>
                <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-product-id="${product.MaSanPham}">Sửa</a>
                <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-product-id="${product.MaSanPham}">Xoá</a>
            </td>
        `;

        document.querySelector('#productTable tbody').appendChild(newRow);
      } else {
        throw new Error(result.message);
      }
    } catch (err) {
      console.error(err);
    }

  });
</script>

<!-- Sửa sản phẩm -->
<script>
  const editModal = document.getElementById('editProductModal');
  const closeEditModalBtn = document.getElementById('closeEditModalBtn');

  closeCreateModalBtn.addEventListener('click', () => {
    editModal.classList.remove('modal--active');
  });

  editModal.querySelector('.modal__overlay').addEventListener('click', () => {
    editModal.classList.remove('modal--active');
  });

  let editingProductId = null;
  document.querySelectorAll('.js-edit-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {

      e.preventDefault();

      const productId = btn.getAttribute('data-product-id');

      editingProductId = productId;

      const editForm = document.getElementById('editProductForm');

      editModal.classList.add('modal--active');

      try {
        const response = await fetch(`/api.php?module=product&action=get&id=${productId}`);

        if (!response.ok) {
          throw new Error("Network response was not ok");
        }

        const product = await response.json();

        editModal.querySelector('#EditCurrentImagePreview').src = `<?= rtrim($GLOBALS['baseUrl'], '/') ?>/img/product/${product.HinhAnh}`;
        editModal.querySelector('#EditCurrentImagePreview').alt = product.TenSanPham;
        editForm.querySelector('[name="TenSanPham"]').value = product.TenSanPham;
        editForm.querySelector('[name="DonGia"]').value = product.DonGia;
        editForm.querySelector('[name="SoLuongTonKho"]').value = product.SoLuongTonKho;
        editForm.querySelector('[name="TrangThai"]').value = product.TrangThai;
        editForm.querySelector('[name="MoTa"]').value = product.MoTa || '';
      } catch (error) {
        console.error("Fetch JSON error:", error)
      }
    });
  });

  document.getElementById('editProductForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = e.target;

    const formData = new FormData(form);

    const imageFile = document.getElementById('EditProductImage').files[0];

    if (imageFile) {
      formData.append('HinhAnh', imageFile);
    }
    formData.append('MaSanPham', editingProductId);

    try {
      const response = await fetch('/api.php?module=product&action=update', {
        method: 'POST',
        body: formData,
      });

      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      const result = await response.json();

      if (result.success) {
        editModal.classList.remove('modal--active');

        showSuccessMessage(result.message);

        const data = result.data;
        const row = document.querySelector(`tr[data-product-id="${editingProductId}"]`);

        if (row) {
          row.querySelector('.product__image img').src = `<?= $GLOBALS['baseUrl'] ?>img/product/${data.HinhAnh}`;
          row.querySelector('.product__name').textContent = data.TenSanPham;
          row.querySelector('.product__price').textContent = Number(data.DonGia).toLocaleString('vi-VN') + 'đ';
          row.querySelector('.product__quantity').textContent = data.SoLuongTonKho;

          const statusCell = row.querySelector('.product__status');
          const span = statusCell.querySelector('.admin-tables__status');
          const icon = span.querySelector('i');

          span.className = data.TrangThai === 1 ?
            'admin-tables__status admin-tables__status--active' :
            'admin-tables__status admin-tables__status--inactive';

          icon.className = data.TrangThai === 1 ?
            'fa-solid fa-eye' :
            'fa-solid fa-eye-slash';

          const descriptionCell = row.querySelector('.product__description');
          descriptionCell.textContent = data.MoTa || '';
        }
      } else {
        throw new Error(result.message);
      }
    } catch (error) {
      console.error(error)
    }
  });
</script>

<script>
  // Lắng nghe sự kiện xoá trên toàn bảng (event delegation)
  document.querySelector('#productTable').addEventListener('click', async (e) => {
    const deleteBtn = e.target.closest('.js-delete-btn');
    if (!deleteBtn) return;

    e.preventDefault();

    const productId = deleteBtn.getAttribute('data-product-id');

    if (confirm("Bạn có chắc chắn muốn xoá sản phẩm này?")) {
      try {
        const response = await fetch(`/api.php?module=product&action=delete&id=${productId}`, {
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