<?php

namespace App\Controllers;

class BrandController
{
    private $brandModel;

    public function __construct($brandModel)
    {
        $this->brandModel = $brandModel;
    }

    public function getBrands($category)
    {
        return $this->brandModel->getBrands($category);
    }
}
