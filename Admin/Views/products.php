<div class="admin-tables">
    <div id="successMessage" class="success-message" style="display: none;">
        <span class="checkmark">✔</span>
        <p class="success-message__text"></p>
    </div>

    <!-- Nút mở modal tạo sản phẩm -->
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

<!-- ✅ HTML: Form sửa sản phẩm dùng modal -->
<div class="modal" id="editProductModal">
    <div class="modal__overlay"></div>
    <div class="modal__content">
        <h2 class="modal__title">Sửa sản phẩm</h2>
        <form class="modal__form" id="editProductForm">
            <input type="hidden" id="productId" name="MaSanPham">
            <input type="hidden" id="oldImageInput" name="OldImage">

            <div class="modal__form-group">
                <label for="productImage">Ảnh hiện tại</label>
                <img id="currentImagePreview" src="" alt="Ảnh hiện tại" style="width: 100px; display: block; margin-bottom: 8px;">
            </div>

            <div class="modal__form-group">
                <label for="productImage">Chọn ảnh mới</label>
                <input type="file" id="productImage" name="HinhAnh">
            </div>

            <div class="modal__form-group">
                <label for="productImageHover">Chọn danh mục sản phẩm</label>
                <select name="MaDanhMucSanPham">
                    <option value="2">Đồng hồ nam</option>
                    <option value="3">Đồng hồ nữ</option>
                    <option value="4">Đồng hồ cặp</option>
                    <option value="5">Trang sức</option>
                    <option value="6">Phụ kiện</option>
                </select>
            </div>

            <div class="modal__form-group">
                <label for="productImageHover">Chọn danh mục thương hiệu</label>
                <select name="MaDanhMucSanPham">
                    <option value="1">Casio</option>
                    <option value="2">Seiko</option>
                    <option value="3">Citizen</option>
                    <option value="4">Tissot</option>
                </select>
            </div>

            <div class="modal__form-group">
                <label for="productName">Tên sản phẩm</label>
                <input type="text" id="productName" name="TenSanPham" />
            </div>

            <div class="modal__form-group">
                <label for="productPrice">Giá</label>
                <input type="number" id="productPrice" name="DonGia" />
            </div>

            <div class="modal__form-group">
                <label for="productQuantity">Tồn kho</label>
                <input type="number" id="productQuantity" name="SoLuongTonKho" />
            </div>

            <div class="modal__form-group">
                <label for="productStatus">Trạng thái</label>
                <select id="productStatus" name="TrangThai">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>

            <div class="modal__form-group">
                <label for="productDescription">Mô tả</label>
                <textarea id="productDescription" name="MoTa"></textarea>
            </div>

            <div class="modal__actions">
                <button type="submit" class="modal__btn modal__btn--save">Lưu</button>
                <button type="button" class="modal__btn modal__btn--close" id="closeEditModalBtn">Huỷ</button>
            </div>
        </form>
    </div>
</div>

<!-- ✅ HTML: Modal tạo sản phẩm -->
<div class="modal" id="createProductModal">
    <div class="modal__overlay"></div>
    <div class="modal__content">
        <h2 class="modal__title">Tạo sản phẩm</h2>
        <form class="modal__form" id="createProductForm">
            <!-- Ảnh chính -->
            <div class="modal__form-group">
                <label for="productImage">Ảnh sản phẩm</label>
                <input type="file" id="productImage" name="HinhAnh" required>
            </div>

            <!-- Ảnh Hover -->
            <div class="modal__form-group">
                <label for="productImageHover">Ảnh hover</label>
                <input type="file" id="productImageHover" name="HinhAnhHover" required>
            </div>

            <!-- Danh mục sản phẩm -->
            <div class="modal__form-group">
                <label>Danh mục sản phẩm</label>
                <select name="MaDanhMucSanPham" required>
                    <option value="2">Đồng hồ nam</option>
                    <option value="3">Đồng hồ nữ</option>
                    <option value="4">Đồng hồ cặp</option>
                    <option value="5">Trang sức</option>
                    <option value="6">Phụ kiện</option>
                </select>
            </div>

            <!-- Danh mục thương hiệu -->
            <div class="modal__form-group">
                <label>Thương hiệu</label>
                <select name="MaDanhMucThuongHieu" required>
                    <option value="1">Casio</option>
                    <option value="2">Seiko</option>
                    <option value="3">Citizen</option>
                    <option value="4">Tissot</option>
                </select>
            </div>

            <!-- Tên sản phẩm -->
            <div class="modal__form-group">
                <label for="productName">Tên sản phẩm</label>
                <input type="text" id="productName" name="TenSanPham" required />
            </div>

            <!-- Giá -->
            <div class="modal__form-group">
                <label for="productPrice">Giá gốc</label>
                <input type="number" id="productPrice" name="DonGia" required />
            </div>

            <!-- Giá giảm -->
            <div class="modal__form-group">
                <label for="discountPrice">Giá giảm</label>
                <input type="number" id="discountPrice" name="GiaGiam" />
            </div>

            <!-- Tồn kho -->
            <div class="modal__form-group">
                <label for="productQuantity">Tồn kho</label>
                <input type="number" id="productQuantity" name="SoLuongTonKho" required />
            </div>

            <!-- Đang giảm giá -->
            <div class="modal__form-group">
                <label for="dangGiamGia">Đang giảm giá?</label>
                <select id="dangGiamGia" name="DangGiamGia">
                    <option value="0">Không</option>
                    <option value="1">Có</option>
                </select>
            </div>

            <!-- Nhãn -->
            <div class="modal__form-group">
                <label for="nhan">Nhãn</label>
                <input type="text" id="nhan" name="Nhan" placeholder="VD: New, Hot, ..." />
            </div>

            <!-- Trạng thái -->
            <div class="modal__form-group">
                <label for="productStatus">Trạng thái</label>
                <select id="productStatus" name="TrangThai">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>

            <!-- Mô tả -->
            <div class="modal__form-group">
                <label for="productDescription">Mô tả</label>
                <textarea id="productDescription" name="MoTa"></textarea>
            </div>

            <!-- Nút hành động -->
            <div class="modal__actions">
                <button type="submit" class="modal__btn modal__btn--save">Tạo</button>
                <button type="button" class="modal__btn modal__btn--close" id="closeCreateModalBtn">Huỷ</button>
            </div>
        </form>
    </div>
</div>

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

    // Đóng modal khi click bên ngoài phần nội dung
    createModal.querySelector('.modal__overlay').addEventListener('click', () => {
        createModal.classList.remove('modal--active');
    });

    document.getElementById('createProductForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const form = e.target;

        const formData = new FormData();
        formData.append('TenSanPham', form.querySelector('[name="TenSanPham"]').value);
        formData.append('DonGia', form.querySelector('[name="DonGia"]').value);
        formData.append('GiaGiam', form.querySelector('[name="GiaGiam"]').value);
        formData.append('SoLuongTonKho', form.querySelector('[name="SoLuongTonKho"]').value);
        formData.append('TrangThai', form.querySelector('[name="TrangThai"]').value);
        formData.append('MoTa', form.querySelector('[name="MoTa"]').value);
        formData.append('HinhAnh', form.querySelector('[name="HinhAnh"]').files[0]);
        formData.append('HinhAnhHover', form.querySelector('[name="HinhAnhHover"]').files[0]);
        formData.append('DangGiamGia', form.querySelector('[name="DangGiamGia"]').value);
        formData.append('Nhan', form.querySelector('[name="Nhan"]').value);
        formData.append('MaDanhMucSanPham', form.querySelector('[name="MaDanhMucSanPham"]').value);
        formData.append('MaDanhMucThuongHieu', form.querySelector('[name="MaDanhMucThuongHieu"]').value);

        const productImage = document.getElementById('productImage').files[0];
        const productImageHover = document.getElementById('productImageHover').files[0];

        if (productImage) formData.append('HinhAnh', productImage);
        if (productImageHover) formData.append('HinhAnhHover', productImageHover);

        try {
            const response = await fetch('/call-api.php?action=create', {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error("Network response was not ok");
            }

            const result = await response.json();
            console.log('Kết quả trả về:', result); // Thêm dòng này để debug

            // Sửa lỗi ở đây: dùng && thay vì &
            if (result.success && result.data) {

                const messageBox = document.getElementById('successMessage');
                const messageText = messageBox.querySelector('.success-message__text');
                messageText.textContent = result.message;

                messageBox.style.display = 'flex';

                // Ẩn sau 2.5s
                setTimeout(() => {
                    messageBox.style.display = 'none';
                }, 2500);

                const product = result.data;

                createModal.classList.remove('modal--active');

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
            <td>${product.DangGiaGiam}</td>
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

            editModal.classList.add('modal--active');

            try {
                const response = await fetch(`/call-api.php?action=get&id=${productId}`);

                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }

                const product = await response.json();

                document.getElementById('currentImagePreview').src = `<?= rtrim($GLOBALS['baseUrl'], '/') ?>/img/product/${product.HinhAnh}`;
                document.getElementById('currentImagePreview').alt = product.TenSanPham;
                document.getElementById('oldImageInput').value = product.HinhAnh;
                document.getElementById('productName').value = product.TenSanPham;
                document.getElementById('productPrice').value = product.DonGia;
                document.getElementById('productQuantity').value = product.SoLuongTonKho;
                document.getElementById('productStatus').value = product.TrangThai;
                document.getElementById('productDescription').value = product.MoTa || '';
            } catch (error) {
                console.error("Fetch JSON error:", error)
            }
        });
    });

    document.getElementById('editProductForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const form = e.target;

        const formData = new FormData();

        formData.append('TenSanPham', form.querySelector('[name="TenSanPham"]').value);
        formData.append('DonGia', form.querySelector('[name="DonGia"]').value);
        formData.append('SoLuongTonKho', form.querySelector('[name="SoLuongTonKho"]').value);
        formData.append('TrangThai', form.querySelector('[name="TrangThai"]').value);
        formData.append('MoTa', form.querySelector('[name="MoTa"]').value);
        formData.append('id', editingProductId);
        formData.append('MaDanhMucSanPham', form.querySelector('[name="MaDanhMucSanPham"]').value);

        const imageFile = document.getElementById('productImage').files[0];
        if (imageFile) {
            formData.append('HinhAnh', imageFile);
        }

        formData.append('OldImage', document.getElementById('oldImageInput').value);

        try {
            const response = await fetch('/call-api.php?action=update', {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            const result = await response.json();

            console.log("Kết quả trả về:", result);

            if (result.success) {
                editModal.classList.remove('modal--active');
                const messageBox = document.getElementById('successMessage');
                const messageText = messageBox.querySelector('.success-message__text');
                messageText.textContent = result.message;

                messageBox.style.display = 'flex';

                // Ẩn sau 2.5s
                setTimeout(() => {
                    messageBox.style.display = 'none';
                }, 2500);

                const data = result.data;
                const row = document.querySelector(`tr[data-product-id="${editingProductId}"]`);

                if (row) {
                    row.querySelector('.product__image img').src = `<?= $GLOBALS['baseUrl'] ?>/img/product/${data.HinhAnh}`;
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
                const response = await fetch(`/call-api.php?action=delete&id=${productId}`, {
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


<!-- ✅ SCSS -->
<style>
    .btn {
        display: inline-block;
        padding: 0.8rem 1.6rem;
        margin: 1rem;
        font-size: 1.6rem;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-align: center;
        line-height: 1.2;
        text-decoration: none;
    }

    .success-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #d4edda;
        color: #155724;
        padding: 1rem 2rem;
        border: 1px solid #c3e6cb;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 16px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .success-message .checkmark {
        font-weight: bold;
        font-size: 20px;
        color: green;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        overflow-y: scroll;
    }

    .modal__title {
        font-weight: bold;
        font-size: 2rem;
        padding: 1rem;
        margin: 0.5rem;
        text-align: center;
    }

    .admin-tables__title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 1rem;
        padding: 1rem;
        text-align: center;
    }

    .modal--active {
        display: flex;
        animation: fadeIn 0.3s ease-in-out;
    }

    .modal__overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal__content {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        width: 70rem;
        max-width: 95%;
        max-height: 90%;
        overflow-y: auto;
        position: relative;
        animation: slideIn 0.3s ease;
    }

    .modal__form-group {
        margin-bottom: 1rem;
    }

    .modal__form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    .modal__form-group input,
    .modal__form-group select,
    .modal__form-group textarea {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: content-box;
    }

    .modal__actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .modal__btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .modal__btn--save {
        background-color: #28a745;
        color: white;
    }

    .modal__btn--close {
        background-color: #ccc;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            transform: translateY(-30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>