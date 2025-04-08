<?php

namespace App\Controllers;

class CommentController
{

    private $commentModel;

    public function __construct($commentModel)
    {
        $this->commentModel = $commentModel;
    }

    public function getComments($productId)
    {
        $comments = $this->commentModel->getComments($productId);
        require_once __DIR__ . '/../Views/pages/detail.php';
    }

    public function addComment()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaSanPham = $_POST['product_id'];
            $MaKhachHang = $_POST['user_id'];
            $TenKhachHang = $_POST['name'];
            $NoiDung = $_POST['content'];

            $commentId = $this->commentModel->addComment($MaSanPham, $MaKhachHang, $TenKhachHang, $NoiDung);

            header('Location: /detail/' . $MaSanPham);
            exit;
        }
    }
}
