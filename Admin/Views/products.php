<div class="admin-products">
    <h1 class="admin-products__title">Danh sách sản phẩm</h1>
    <table class="admin-products__table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['MaSanPham'] ?></td>
                    <td>
                        <img class="admin-products__image" src="<?= $GLOBALS['baseUrl'] ?>img/product/<?php echo htmlspecialchars($product['HinhAnh']); ?>" alt="<?= $product['TenSanPham'] ?>">
                    </td>
                    <td><?php echo htmlspecialchars($product['TenSanPham']); ?></td>
                    <td><?= number_format($product['DonGia'], 0, ',', '.') ?>đ</td>
                    <td><?php echo htmlspecialchars($product['SoLuongTonKho']); ?></td>
                    <td>
                        <?php if ($product['TrangThai']): ?>
                            <span class="admin-products__status admin-products__status--active">Hiển thị</span>
                        <?php else: ?>
                            <span class="admin-products__status admin-products__status--inactive">Ẩn</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a class="admin-products__action admin-products__action--edit js-edit-btn" href="#" data-product-id="<?= $product['MaSanPham'] ?>">Sửa</a>
                        <a class="admin-products__action admin-products__action--delete" href="#">Xoá</a>
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
        <form class="modal__form">
            <div class="modal__form-group">
                <label for="productImage">Hình ảnh</label>
                <input type="file" id="productImage">
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
                <button type="button" class="modal__btn modal__btn--close" id="closeModalBtn">Huỷ</button>
            </div>
        </form>
    </div>
</div>

<!-- ✅ JS: Mở modal -->
<script>
    const modal = document.getElementById('editProductModal');
    const overlay = modal.querySelector('.modal__overlay');
    const closeBtn = document.getElementById('closeModalBtn');

    document.querySelectorAll('.js-edit-btn').forEach(btn => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const productId = btn.getAttribute('data-product-id');
            modal.classList.add('modal--active');

            try {
                const response = await fetch(`/api.php?action=get&id=${productId}`);
                if (!response.ok) throw new Error('Network response was not ok');

                const product = await response.json();

                document.getElementById('productName').value = product.TenSanPham;
                document.getElementById('productPrice').value = product.DonGia;
                document.getElementById('productQuantity').value = product.SoLuongTonKho;
                document.getElementById('productStatus').value = product.TrangThai;
                document.getElementById('productDescription').value = product.MoTa || '';
            } catch (error) {
                console.error('Error:', error);
                alert('Không thể tải dữ liệu sản phẩm');
            }
        });
    });

    // Đóng modal
    overlay.addEventListener('click', () => modal.classList.remove('modal--active'));
    closeBtn.addEventListener('click', () => modal.classList.remove('modal--active'));
</script>


<!-- ✅ SCSS -->
<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.4);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal--active {
        display: flex;
        animation: fadeIn 0.3s ease-in-out;
    }

    .modal__content {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        width: 500px;
        max-width: 95%;
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