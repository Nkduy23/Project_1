<?php

namespace App\Controllers;

class UserController
{
    private $userModel;
    private $cartModel;

    // Constructor __construct() giúp khởi tạo các thuộc tính của đối tượng khi nó được tạo ra.
    // Tham số $menuModel sẽ được truyền vào từ bên ngoài khi bạn khởi tạo lớp này, và sau đó giá trị đó sẽ được gán vào thuộc tính $menuModel của đối tượng.

    public function __construct(
        $userModel,
        $cartModel
    ) {
        $this->userModel = $userModel;
        $this->cartModel = $cartModel;
    }

    public function registerPage() {
        require_once __DIR__ . '/../views/pages/register.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            $errors = [];

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
        require_once __DIR__ . '/../views/pages/login.php';
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
                            $this->cartModel->addToCart($user['id'], $productId, $cartItem['quantity']);
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
        require_once __DIR__ . '/../views/pages/profile.php';
    }
}
