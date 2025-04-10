<?php

namespace App\Controllers;

class UserController
{
    private $userModel;
    private $cartModel;

    public function __construct(
        $userModel,
        $cartModel
    ) {
        // $this->userModel: là thuộc tính nội bộ của controller để lưu lại model
        $this->userModel = $userModel;
        $this->cartModel = $cartModel;
    }

    public function registerPage()
    {
        require_once __DIR__ . '/../Views/pages/register.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            $errors = [];
            // Gọi method trong model từ bên trong controller
            if ($this->userModel->isEmailExists($email)) {
                $errors[] = "Email đã tồn tại";
            }

            if ($this->userModel->isUsernameExists($username)) {
                $errors[] = "Tên đăng nhập đã tồn tại";
            }

            if ($password != $confirmPassword) {
                $errors[] = "Mật khẩu xác nhận không khớp!";
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = $_POST; // Lưu lại dữ liệu trước đó
                header('Location: /register');
                exit;
            }

            if ($this->userModel->register($username, $email, $password)) {
                $_SESSION['register_success'] = 'Đăng ký thành công';
                header('Location: /login');
                exit;
            } else {
                header('Location: /register');
                exit;
            }
        }
    }

    public function loginPage()
    {
        require_once __DIR__ . '/../Views/pages/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $errors = [];

            if (empty($email)) {
                $errors[] = 'Vui lòng nhập email';
            }
            if (empty($password)) {
                $errors[] = 'Vui lòng nhập mật khẩu';
            }

            if (empty($errors)) {
                $user = $this->userModel->login($email, $password);

                if ($user) {
                    $_SESSION['user'] = $user;
                    $_SESSION['login_success'] = 'Đăng nhập thành công!';

                    // Kiểm tra nếu có giỏ hàng trong session thì đẩy vào database
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $productId => $cartItem) {
                            $this->cartModel->addToCart($user['MaKhachHang'], $productId, $cartItem['SoLuong'], $cartItem['KichThuoc']);
                        }
                        // ✅ Xóa session cart sau khi đồng bộ với database
                        unset($_SESSION['cart']);
                    }
                    header('Location: /');
                    exit;
                } else {
                    $_SESSION['errors'] = ['Email hoặc mật khẩu không chính xác!'];
                    header('Location: /login');
                    exit;
                }
            }

            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header('Location: /login');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }

    public function profilePage()
    {
        require_once __DIR__ . '/../Views/pages/profile.php';
    }
}
