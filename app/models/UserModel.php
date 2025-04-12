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
        $sql = "INSERT INTO TaiKhoan (TenDangNhap, Email, MatKhau, VaiTro) VALUES (?, ?, ?,?)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$username, $email, $hashedPassword, 'user']);
        return $result;
    }

    public function isEmailExists($email)
    {
        $sql = "SELECT * FROM TaiKhoan WHERE Email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch() ? true : false;
    }

    public function isUsernameExists($username)
    {
        $sql = "SELECT * FROM TaiKhoan WHERE TenDangNhap = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch() ? true : false;
    }

    public function login($email, $password)
    {
        $sql = "SELECT MaTaiKhoan, Email, TenDangNhap, MatKhau, VaiTro FROM TaiKhoan WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['MatKhau'])) {
            return [
                'MaTaiKhoan' => $user['MaTaiKhoan'],
                'Email' => $user['Email'],
                'TenDangNhap' => $user['TenDangNhap'],
                'VaiTro' => $user['VaiTro']
            ];
        }
        return false;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM TaiKhoan WHERE MaTaiKhoan = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
