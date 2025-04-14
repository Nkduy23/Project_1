<?php

namespace Admin\Models;

class AdminOrderModel
{

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllOrders()
    {
        try {
            $sql = "SELECT * FROM DonHang";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminOrderModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function getOrderById($id)
    {
        try {
            $sql = "SELECT * FROM DonHang WHERE MaDonHang = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminOrderModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function updateOrder($data)
    {
        try {
            $sql = "UPDATE DonHang SET MaTaiKhoan = ?, DiaChiNhanHang = ?, ThanhPho = ?, TongTien = ? , PhuongThucThanhToan = ?, TrangThai = ? WHERE MaDonHang = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['MaTaiKhoan'],
                $data['DiaChiNhanHang'],
                $data['ThanhPho'],
                $data['TongTien'],
                $data['PhuongThucThanhToan'],
                $data['TrangThai'],
                $data['MaDonHang']
            ]);
            $selectStmt = $this->db->prepare("SELECT * FROM DonHang WHERE MaDonHang = ?");
            $selectStmt->execute([$data['MaDonHang']]);
            $result = $selectStmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminOrderModel Error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteOrder($id)
    {
        try {
            $sql = "DELETE FROM DonHang WHERE MaDonHang = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            error_log("AdminOrderModel Error: " . $e->getMessage());
            return false;
        }
    }
}
