<div class="admin-tables">
  <div id="successMessage" class="success-message" style="display: none;">
    <span class="checkmark">✔</span>
    <p class="success-message__text"></p>
  </div>

  <div id="errorMessage" class="error-message" style="display: none;">
    <span class="checkmark">✘</span>
    <p class="error-message__text"></p>
  </div>
  
  <h1 class="admin-tables__title">Danh sách bình luận</h1>
  <table class="admin-tables__table" id="commentTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Mã sản phẩm</th>
        <th>Mã tài khoản</th>
        <th>Tên khách hàng</th>
        <th>Nội dung</th>
        <th>Thời gian tạo</th>
        <th>Thao tác</th>
      </tr>
    <tbody>
      <?php foreach ($comments as $comment) : ?>
        <tr class="comment-row" data-comment-id="<?= $comment['MaBinhLuan'] ?>">
          <td class="comment__id"><?= $comment['MaBinhLuan'] ?></td>
          <td class="comment__product-id"><?= $comment['MaSanPham'] ?></td>
          <td class="comment__user-id"><?= $comment['MaTaiKhoan'] ?></td>
          <td class="comment__name"><?= $comment['TenKhachHang'] ?></td>
          <td class="comment__content"><?= $comment['NoiDung'] ?></td>
          <td class="comment__created-at"><?= $comment['ThoiGianBinhLuan'] ?></td>
          <td>
            <a class="admin-tables__action admin-tables__action--edit js-edit-btn" href="#" data-comment-id="<?= $comment['MaBinhLuan'] ?>">Sửa</a>
            <a class="admin-tables__action admin-tables__action--delete js-delete-btn" href="#" data-comment-id="<?= $comment['MaBinhLuan'] ?>">Xoá</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    </thead>
  </table>
</div>

<!-- Sửa bình luận -->
<div class="modal" id="editCommentModal">
  <div class="modal__overlay"></div>
  <div class="modal__body">
    <div class="modal__content">
      <div class="modal__header">
        <h2 class="modal__title">Sửa bình luận</h2>
      </div>
      <form action="" method="POST" id="editCommentForm">
        <input type="hidden" id="editCommentId" name="MaBinhLuan">
        <div class="modal__form">
          <div class="modal__form-group">
            <label for="name" class="modal__form-label">Nội dung</label>
            <input type="text" id="editCommentContent" name="NoiDung" class="modal__form-input" required>
          </div>
        </div>
        <div class="modal__footer">
          <button type="submit" class="modal__btn modal__btn--save">Sửa</button>
          <button type="button" class="modal__btn modal__btn--close " id="closeEditModalBtn">Hủy</button>
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
    const editCommentModal = document.getElementById('editCommentModal');
    const closeEditModalBtn = document.getElementById('closeEditModalBtn');

    closeEditModalBtn.addEventListener('click', () => {
      editCommentModal.classList.remove('modal--active');
    });

    editCommentModal.querySelector('.modal__overlay').addEventListener('click', () => {
      editCommentModal.classList.remove('modal--active');
    });

    document.querySelectorAll('.js-edit-btn').forEach(btn => {
      btn.addEventListener('click', async (e) => {

        editCommentModal.classList.add('modal--active');

        e.preventDefault();

        const commentId = btn.getAttribute('data-comment-id');

        selectedCommentId = commentId;

        const editComment = document.getElementById('editCommentModal');

        try {
          const response = await fetch(`/api.php?module=comment&action=get&id=${commentId}`);

          if (!response.ok) {
            throw new Error('Failed to fetch comment');
          }

          const result = await response.json();

          const data = result.data;

          if (!result.success) {
            console.warn("Lỗi nghiệp vụ:", result.message);
            showErrorMessage(result.message);
            return;
          }

          editComment.querySelector('[name= "NoiDung"]').value = data.NoiDung;
          // showSuccessMessage(result.message);
        } catch (error) {
          console.error(error);
          showErrorMessage(error.message);
        }
      });
    });

    document.getElementById('editCommentForm').addEventListener('submit', async (e) => {
      e.preventDefault();

      const form = e.target;

      const formData = new FormData(form);

      formData.append('MaBinhLuan', selectedCommentId);

      try {
        const response = await fetch(`/api.php?module=comment&action=update&id=${selectedCommentId}`, {
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

        const row = document.querySelector(`tr[data-comment-id="${selectedCommentId}"]`);

        if (row) {
          row.querySelector('.comment__content').textContent = data.NoiDung;
        }

        editCommentModal.classList.remove('modal--active');

        showSuccessMessage(result.message);
      } catch (error) {
        console.error(error);
        showErrorMessage(error.message);
      }
    });
  </script>

  <script>
    document.querySelector('#commentTable').addEventListener('click', async (e) => {
      const deleteBtn = e.target.closest('.js-delete-btn');
      if (!deleteBtn) return;

      e.preventDefault();

      const commentId = deleteBtn.getAttribute('data-comment-id');

      if (confirm("Bạn có chắc chắn muốn xóa bình luận này?")) {
        try {
          const response = await fetch(`/api.php?module=comment&action=delete&id=${commentId}`, {
            method: 'DELETE'
          });

          const result = await response.json();

          if (!result.success) {
            console.warn("Lỗi nghiệp vụ:", result.message);
            showErrorMessage(result.message);
            return;
          }

          const row = deleteBtn.closest('tr');
          row.remove();
          showSuccessMessage(result.message);
        } catch (error) {
          console.error("Lỗi khi xóa:", error);
          showErrorMessage(error.message);
        }
      }
    });
  </script>