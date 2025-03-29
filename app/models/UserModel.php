<?php
require_once __DIR__ . '/CallDatabase.php';

class UserModel extends CallDatabase {
    public function register ($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        return $this->db->execute($sql, [$username, $email, $hashedPassword]);
    }

    public function login ($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $user = $this->db->getOne($sql, [$email]);
        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->db->getOne($sql, [$id]);
    }
}
