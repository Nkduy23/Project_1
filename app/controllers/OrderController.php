<?php

namespace App\Controllers;

class OrderController
{
    public function success()
    {
        // Kiểm tra session để đảm bảo người dùng vừa đặt hàng thành công
        if (!isset($_SESSION['order_success'])) {
            header('Location: /');
            exit;
        }

        // Lấy thông tin đơn hàng từ session
        $orderId = $_SESSION['order_id'] ?? null;

        // Hiển thị view
        $data = [
            'orderId' => $orderId,
            'baseUrl' => $GLOBALS['baseUrl'] ?? '/'
        ];

        // Xóa session thông báo sau khi hiển thị
        unset($_SESSION['order_success']);
        unset($_SESSION['order_id']);

        // Render view
        include __DIR__ . '/../Views/pages/success.php';
    }

    public function history()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user']['MaTaiKhoan'];
        $orders = []; // Lấy từ model

        // Hiển thị view
        $data = [
            'orders' => $orders,
            'baseUrl' => $GLOBALS['baseUrl'] ?? '/'
        ];

        include __DIR__ . '/../Views/pages/history.php';
    }
}
