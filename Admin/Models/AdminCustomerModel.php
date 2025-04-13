<?php

namespace Admin\Models;

class AdminCustomerModel
{

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllCustomers()
    {
        try {
            $sql = "SELECT * FROM TaiKhoan";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function createCustomer($data)
    {
        try {
            $hashedPassword = password_hash($data['MatKhau'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO TaiKhoan (HinhAnh, TenDangNhap, HoVaTen, Email, MatKhau, DiaChi, SoDienThoai, TrangThai, VaiTro) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                $data['HinhAnh'],
                $data['TenDangNhap'],
                $data['HoVaTen'],
                $data['Email'],
                $hashedPassword,
                $data['DiaChi'],
                $data['SoDienThoai'],
                $data['TrangThai'],
                $data['VaiTro']
            ]);
            return $this->db->lastInsertId(); // trả về ID
        } catch (\Exception $e) {
            error_log("createCustomer Error: " . $e->getMessage());
            return false;
        }
    }

    public function isDuplicateAccount($username, $email)
    {
        $sql = "SELECT COUNT(*) FROM TaiKhoan WHERE TenDangNhap = ? OR Email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username, $email]);
        $count = $stmt->fetchColumn();
        return $count > 0;
    }


    public function getCustomerById($id)
    {
        try {
            $sql = "SELECT * FROM TaiKhoan WHERE MaTaiKhoan = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }

    public function updateCustomer($data)
    {
        try {
            if (!empty($data['HinhAnh'])) {
                $sql = "UPDATE TaiKhoan SET HinhAnh = ?, TenDangNhap = ?, HoVaTen = ?, Email = ?, TrangThai = ?, VaiTro = ? WHERE MaTaiKhoan = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $data['HinhAnh'],
                    $data['TenDangNhap'],
                    $data['HoVaTen'],
                    $data['Email'],
                    $data['TrangThai'],
                    $data['VaiTro'],
                    $data['MaTaiKhoan']
                ]);
            } else {
                $sql = "UPDATE TaiKhoan SET TenDangNhap = ?, HoVaTen = ?, Email = ?, TrangThai = ?, VaiTro = ? WHERE MaTaiKhoan = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    $data['TenDangNhap'],
                    $data['HoVaTen'],
                    $data['Email'],
                    $data['TrangThai'],
                    $data['VaiTro'],
                    $data['MaTaiKhoan']
                ]);
            }
            $selectStmt = $this->db->prepare("SELECT * FROM TaiKhoan WHERE MaTaiKhoan = ?");
            $selectStmt->execute([$data['MaTaiKhoan']]);
            $result = $selectStmt->fetch(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteCustomer($id)
    {
        try {
            $sql = "DELETE FROM TaiKhoan WHERE MaTaiKhoan = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return false;
        }
    }
}
