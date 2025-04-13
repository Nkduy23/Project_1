<?php

namespace Admin\Controllers;

class AdminCustomerController
{
  private $adminCustomerModel;

  public function __construct($adminCustomerModel)
  {
    $this->adminCustomerModel = $adminCustomerModel;
  }

  public function index()
  {
    $customers = $this->adminCustomerModel->getAllCustomers();
    require_once __DIR__ . '/../Views/customers.php';
  }

  public function create($data)
  {
    header('Content-Type: application/json');

    $image = $_FILES['HinhAnh'] ?? null;
    if (!$image || $image['error'] !== UPLOAD_ERR_OK) {
      echo json_encode(['success' => false, 'message' => 'Ảnh không hợp lệ hoặc chưa chọn ảnh.']);
      return;
    }

    if ($this->adminCustomerModel->isDuplicateAccount($data['TenDangNhap'], $data['Email'])) {
      echo json_encode(['success' => false, 'message' => 'Tên đăng nhập hoặc email đã tồn tại.']);
      return;
    }

    $customerId = $this->adminCustomerModel->createCustomer($data);

    if ($customerId) {
      $customerById = $this->adminCustomerModel->getCustomerById($customerId);
      echo json_encode(['success' => true, 'data' => $customerById, 'message' => 'Tạo tài khoản thành công']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Tạo tài khoản thất bại']);
    }
  }

  public function get($id) {
    header('Content-Type: application/json');
    $customer = $this->adminCustomerModel->getCustomerById($id);
    echo json_encode($customer);
  }

  public function update($data)
  {
    header('Content-Type: application/json');
    $result = $this->adminCustomerModel->updateCustomer($data);
    if ($result) {
      echo json_encode([
        'success' => true,
        'data' => $result,
        'message' => 'Sửa tài khoản thành công'
      ]);
    } else {
      echo json_encode([
        'success' => false,
        'product_id' => false,
        'message' => 'Sửa tài khoản thất bại'
      ]);
    }
  }

  public function delete($id) {
    $customer = $this->adminCustomerModel->getCustomerById($id);
    
    if (!$customer) {
      return false;
    }

    $mainImagePath = __DIR__ . '/../../Public/assets/img/customer/' . $customer['HinhAnh'];
    if (file_exists($mainImagePath)) {
      unlink($mainImagePath);
    }

    return $this->adminCustomerModel->deleteCustomer($id);
  }
}
