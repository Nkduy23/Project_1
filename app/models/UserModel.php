<?php

namespace App\Models;

class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function register($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO KhachHang (TenDangNhap, Email, MatKhau) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$username, $email, $hashedPassword]);
        return $result;
    }

    public function isEmailExists($email)
    {
        $sql = "SELECT * FROM KhachHang WHERE Email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }

    public function isUsernameExists($username)
    {
        $sql = "SELECT * FROM KhachHang WHERE TenDangNhap = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch() ? true : false;
    }

    public function login($email, $password)
    {
        $sql = "SELECT MaKhachHang, Email, TenDangNhap, MatKhau FROM KhachHang WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['MatKhau'])) {
            return [
                'MaKhachHang' => $user['MaKhachHang'],
                'Email' => $user['Email'],
                'TenDangNhap' => $user['TenDangNhap']
            ];
        }
        return false;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM KhachHang WHERE MaKhachHang = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
