<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            if($password != $confirmPassword) {
                echo 'Mật khẩu xác nhận không khớp!';
                return;
            }

            if ($this->userModel->register($username, $email, $password, $confirmPassword)) {
                header('Location: /login');
                exit;
            } else {
                echo 'Đăng ký thành công';
            }
        }
        require '../views/pages/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->login($email, $password)) {
                header('Location: /');
                exit;
            } else {
                echo 'Đăng nhập thất bại';
            }
        }
        require '../views/pages/login.php';
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }
}
