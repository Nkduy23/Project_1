<?php

namespace Admin\Controllers;

class AdminOrderController
{

    private $adminOrderModel;

    public function __construct($adminOrderModel)
    {
        $this->adminOrderModel = $adminOrderModel;
    }

    public function index()
    {
        $orders = $this->adminOrderModel->getAllOrders();
        require_once __DIR__ . '/../Views/orders.php';
    }

    public function get($id)
    {
        header('Content-Type: application/json');
        $oderById = $this->adminOrderModel->getOrderById($id);
        if($oderById) {
            echo json_encode([
                'success' => true,
                'data' => $oderById,
                'message' => 'Lấy đơn hàng thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Lấy đơn hàng thất bại'
            ]);
        }
    }

    public function update($data)
    {
        header('Content-Type: application/json');
        $result = $this->adminOrderModel->updateOrder($data);
        if($result) {
            echo json_encode([
                'success' => true,
                'data' => $result,
                'message' => 'Cập nhật đơn hàng thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Cập nhật đơn hàng thất bại'
            ]);
        }
    }

    public function delete($id)
    {
        header('Content-Type: application/json');
        $result = $this->adminOrderModel->deleteOrder($id);
        if($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Xóa đơn hàng thành công'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Xóa đơn hàng thất bại'
            ]);
        }

        exit;

    }
}
