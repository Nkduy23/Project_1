<div class="admin-tables">
  <div id="successMessage" class="success-message" style="display: none;">
    <span class="checkmark">✔</span>
    <p class="success-message__text"></p>
  </div>

  <div id="errorMessage" class="error-message" style="display: none;">
    <span class="checkmark">✘</span>
    <p class="error-message__text"></p>
  </div>

  <button id="openCreateModalBtn" class="btn btn--primary">Tạo danh mục sản phẩm</button>
  <h1 class="admin-tables__title">Danh sách mục sản phẩm</h1>
  <table class="admin-tables__table" id="categoryTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên Danh mục</th>
        <!-- <th>Hình ảnh</th> -->
        <th>Mô tả</th>
        <th>Trang thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categories as $category) : ?>
        <tr class="category-row" data-category-id="<?= $category['MaDanhMucSanPham'] ?>">
          <td class="category__id"><?= $category['MaDanhMucSanPham'] ?></td>
          <td class="category__name"><?= $category['TenDanhMucSanPham'] ?></td>
          <!-- <td class="category__image"><img src="<?= $category['HinhAnh'] ?>" alt="" width="50px" height="50px"></td> -->
          <td class="category__description"><?= $category['MoTaDanhMuc'] ?></td>
          <td class="category__status">
            <?php if ($category['TrangThai']) : ?>
              <span class="admin-tables__status admin-tables__status--active">
                <i class="fa-solid fa-eye"></i>
              </span>
            <?php else : ?>
              <span class="admin-tables__status admin-tables__status--inactive">
                <i class="fa-solid fa-eye-slash"></i>
              </span>
            <?php endif; ?>
          </td>
          <td>
            <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-category-id="<?= $category['MaDanhMucSanPham'] ?>">Sửa</a>
            <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-category-id="<?= $category['MaDanhMucSanPham'] ?>">Xoá</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Thêm danh mục -->
<div class="modal" id="addCategoryModal">
  <div class="modal__overlay"></div>
  <div class="modal__body">
    <div class="modal__content">
      <div class="modal__header">
        <h2 class="modal__title">Tạo danh mục</h2>
      </div>
      <form action="" method="POST" id="createCategoryForm">
        <div class="modal__form">
          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Tên danh mục</label>
            <input type="text" id="categoryName" name="TenDanhMucSanPham" class="modal__form-input">
          </div>
          <div class="modal__form-group">
            <label for="description" class="modal__form-label">Mô tả</label>
            <input type="text" id="categoryDescription" name="MoTaDanhMuc" class="modal__form-input">
          </div>
          <!-- <div class="modal__form-group">
            <label for="image" class="modal__form-label">Hình ảnh</label>
            <input type="file" id="categoryImage" name="HinhAnh" class="modal__form-input">
          </div> -->
          <div class="modal__form-group">
            <label for="status" class="modal__form-label">Trang thái</label>
            <select id="categoryStatus" name="TrangThai" class="modal__form-input">
              <option value="1">Hiện</option>
              <option value="0">Ẩn</option>
            </select>
          </div>
        </div>
        <div class="modal__footer">
          <button type="submit" class="modal__btn modal__btn--save">Tạo</button>
          <button type="button" class="modal__btn modal__btn--close " id="closeCreateModalBtn">Hủy</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Sửa danh mục -->
<div class="modal" id="editCategoryModal">
  <div class="modal__overlay"></div>
  <div class="modal__body">
    <div class="modal__content">
      <div class="modal__header">
        <h2 class="modal__title">Sửa danh mục</h2>
      </div>
      <form action="" method="POST" id="editCategoryForm">
        <div class="modal__form">
          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Tên danh mục</label>
            <input type="text" id="editCategoryName" name="TenDanhMucSanPham" class="modal__form-input">
          </div>
          <div class="modal__form-group">
            <label for="description" class="modal__form-label">Mô tả</label>
            <input type="text" id="editCategoryDescription" name="MoTaDanhMuc" class="modal__form-input">
          </div>
          <div class="modal__form-group">
            <label for="status" class="modal__form-label">Trang thái</label>
            <select id="editCategoryStatus" name="TrangThai" class="modal__form-input">
              <option value="1">Hiện</option>
              <option value="0">Ẩn</option>
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
  const openCreateModalBtn = document.getElementById('openCreateModalBtn');
  const closeCreateModalBtn = document.getElementById('closeCreateModalBtn');
  const createCategoryModal = document.getElementById('addCategoryModal');
  openCreateModalBtn.addEventListener('click', () => {
    createCategoryModal.classList.add('modal--active');
  });

  closeCreateModalBtn.addEventListener('click', () => {
    createCategoryModal.classList.remove('modal--active');
  });

  createCategoryModal.querySelector('.modal__overlay').addEventListener('click', () => {
    createCategoryModal.classList.remove('modal--active');
  });

  document.getElementById('addCategoryModal').addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    try {
      const response = await fetch('/api.php?module=category&action=create', {
        method: 'POST',
        body: formData,
      });

      if (!response.ok) {
        throw new Error('Failed to create category');
      }

      const data = await response.json();

      if (!data.success) {
        showErrorMessage(data.message);
        return;
      }

      if (data.success && data.data) {
        showSuccessMessage(data.message);
        const category = data.data;
        createCategoryModal.classList.remove('modal--active');

        form.reset();

        const newRow = document.createElement('tr');
        newRow.className = 'category-row';
        newRow.setAttribute('data-category-id', category.MaDanhMucSanPham);

        newRow.innerHTML = `
          <td class="category__id">${category.MaDanhMucSanPham}</td>
          <td class="category__name">${category.TenDanhMucSanPham}</td>
          <td class="category__description">${category.MoTaDanhMuc}</td>
          <td class="category__status">
            <span class="admin-tables__status admin-tables__status--active">
              <i class="fa-solid fa-eye"></i>
            </span>
          </td>
          <td>
            <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-category-id="${category.MaDanhMucSanPham}">Sửa</a>
            <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-category-id="${category.MaDanhMucSanPham}">Xoá</a>
          </td>
        `;

        document.querySelector(' #categoryTable tbody').appendChild(newRow);
      } else {
        throw new Error(data.message);
      }
    } catch (error) {
      console.error(error);
    }
  });
</script>

<script>
  const closeEditModalBtn = document.getElementById('closeEditModalBtn');
  const editCategoryModal = document.getElementById('editCategoryModal');

  closeEditModalBtn.addEventListener('click', () => {
    editCategoryModal.classList.remove('modal--active');
  });

  editCategoryModal.querySelector('.modal__overlay').addEventListener('click', () => {
    editCategoryModal.classList.remove('modal--active');
  });

  let selectedCategoryId = null;

  document.querySelectorAll('.js-edit-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {

      e.preventDefault();

      const categoryId = button.getAttribute('data-category-id');

      selectedCategoryId = categoryId;

      editCategoryModal.classList.add('modal--active');

      try {
        const response = await fetch(`/api.php?module=category&action=get&id=${categoryId}`);

        if (!response.ok) {
          throw new Error('Failed to fetch category');
        }

        const category = await response.json();

        editCategoryModal.querySelector('input[name="TenDanhMucSanPham"]').value = category.TenDanhMucSanPham;
        editCategoryModal.querySelector('input[name="MoTaDanhMuc"]').value = category.MoTaDanhMuc;
      } catch (error) {
        console.error(error);
      }
    });
  });

  document.getElementById('editCategoryModal').addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = e.target;

    try {
      const response = await fetch(`/api.php?module=category&action=update&id=${selectedCategoryId}`, {
        method: 'POST',
        body: new FormData(form),
      });

      if (!response.ok) {
        throw new Error('Failed to update category');
      }

      const data = await response.json();

      if (data.success) {
        showSuccessMessage(data.message);
        const data = result.data;
        const row = document.querySelector(`tr[data-category-id="${selectedCategoryId}"]`);

        if (row) {
          row.querySelector('.category__name').textContent = data.TenDanhMucSanPham;
          row.querySelector('.category__description').textContent = data.MoTaDanhMuc;
        }

        editCategoryModal.classList.remove('modal--active');
      } else {
        showErrorMessage(data.message);
      }
    } catch (error) {
      console.error(error);
    }
  });
</script>