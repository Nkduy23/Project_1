<?php
require_once __DIR__ . '/../models/BrandModel.php';

class BrandController
{
    private $brandModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
    }

    public function getBrands($category)
    {
        return $this->brandModel->getBrandsByCategory($category);
    }
}
