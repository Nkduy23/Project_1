<?php

namespace Admin\Controllers;

class AdminBrandController
{

    private $adminBrandModel;

    public function __construct($adminBrandModel)
    {
        $this->adminBrandModel = $adminBrandModel;
    }

    public function index()
    {
        $brands = $this->adminBrandModel->getAllBrands();
        require_once __DIR__ . '/../Views/brands.php';
    }

}
