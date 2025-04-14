<?php

namespace Admin\Controllers;

class AdminCommentController
{
    private $adminCommentModel;

    public function __construct($adminCommentModel)
    {
        $this->adminCommentModel = $adminCommentModel;
    }

    public function index()
    {
        $comments = $this->adminCommentModel->getAllComments();
        require_once __DIR__ . '/../Views/comments.php';
    }

    public function get($id)
    {
        header('Content-Type: application/json');
        $commentById = $this->adminCommentModel->getCommentById($id);
        if ($commentById) {
            echo json_encode([
                'success' => true,
                'data' => $commentById,
                'message' => 'Lấy bình luận thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Lấy bình luận thất bạt'
            ]);
        }
        exit;
    }

    public function update($data) {
        header('Content-Type: application/json');
        $result = $this->adminCommentModel->updateComment($data);
        if ($result) {
            echo json_encode([
                'success' => true,
                'data' => $result,
                'message' => 'Cập nhật bình luận thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'comment_id' => false,
                'message' => 'Cập nhật bình luận thất bại'
            ]);
        }
        exit;
    }

    public function delete($id) {
        header('Content-Type: application/json');
        $result = $this->adminCommentModel->deleteComment($id);
        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Xoá bình luận thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Xoá bình luận thất bại'
            ]);
        }
        exit;
    }
}
