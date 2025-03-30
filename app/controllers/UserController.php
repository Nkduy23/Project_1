<?php
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/CartModel.php';

class UserController
{
    private $userModel;
    private $cartModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->cartModel = new CartModel();
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
                    header('Location: /home');
                    exit;
                } else {
                    $_SESSION['errors']['login'] = 'Email hoặc mật khẩu không chính xác!';
                    header('Location: /login');
                    exit;
                }
            }

            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header('Location: /login');
            exit;
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
