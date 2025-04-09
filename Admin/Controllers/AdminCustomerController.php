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

  public function getById () {

  }
}
