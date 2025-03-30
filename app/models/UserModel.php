<?php
require_once __DIR__ . '/CallDatabase.php';

class UserModel extends CallDatabase
{
    public function register($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $result = $this->db->execute($sql, [$username, $email, $hashedPassword]);
        return $result;
    }

    public function isEmailExists($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        return $this->db->getOne($sql, [$email]) ? true : false;
    }

    public function isUsernameExists($username)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        return $this->db->getOne($sql, [$username]) ? true : false;
    }

    public function login($email, $password)
    {
        $sql = "SELECT id, email, username, password FROM users WHERE email = ?";
        $user = $this->db->getOne($sql, [$email]);
        if ($user && password_verify($password, $user['password'])) {
            return [
                'id' => $user['id'],
                'email' => $user['email'],
                'username' => $user['username']
            ];
        }
        return false;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->db->getOne($sql, [$id]);
    }
}
