<?php

namespace App\Models;

class CommentModel
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getComments($productId)
    {
        $sql = "SELECT * FROM BinhLuan WHERE MaSanPham = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$productId]);
        $comments = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $comments ?: [];
    }

    public function addComment($MaSanPham, $MaKhachHang, $TenKhachHang, $NoiDung)
    {
        $sql = "INSERT INTO BinhLuan (MaSanPham, MaKhachHang, TenKhachHang, NoiDung, ThoiGianBinhLuan)  VALUES ( ?, ?, ?, ?, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$MaSanPham, $MaKhachHang, $TenKhachHang, $NoiDung]);

        // Trả về ID của bình luận vừa tạo (MaBinhLuan tự động tăng)
        return $this->db->lastInsertId();
    }
}
