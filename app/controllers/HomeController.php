<?php

namespace App\Controllers;

class HomeController
{
    private $mediaModel;
    private $productModel;
    private $brandModel;
    private $newsModel;

    public function __construct(
        $mediaModel,
        $productModel,
        $brandModel,
        $newsModel
    ) {
        $this->mediaModel = $mediaModel;
        $this->productModel = $productModel;
        $this->brandModel = $brandModel;
        $this->newsModel = $newsModel;
    }

    public function index()
    {
        $data = [
            // Key
            'sliders' => $this->mediaModel->getMedia('type', 'slider', 'id, image, image_large, image_small, title, link'),
            'features' => $this->mediaModel->getMedia('type', 'feature', 'image, title, link'),
            'bannerTop' => $this->mediaModel->getMedia('banner_type', 'top', 'image, title, link, banner_type, position'),
            'bannerBottom' => $this->mediaModel->getMedia('banner_type', 'bottom', 'image, title, link, banner_type, position'),
            'maleProducts' => $this->productModel->getProducts('male', 8),
            'femaleProducts' => $this->productModel->getProducts('female', 8),
            'jewelryProducts' => $this->productModel->getProducts('jewelry', 8),
            'leatherProducts' => $this->productModel->getProducts('leather', 8),
            'saleProducts' => $this->productModel->getSaleProducts(),
            'services' => $this->mediaModel->getMedia('type', 'service', 'image, title, link'),
            'top10' => $this->mediaModel->getMedia('type', 'top10', 'image, image_large, image_small'),
            'popularBrands' => $this->brandModel->getBrands('popular'),
            'swissBrands' => $this->brandModel->getBrands('swiss'),
            'jewelryBrands' => $this->brandModel->getBrands('jewelry'),
            'allNews' => $this->newsModel->getAllNews(),
            'featuredNews' => $this->newsModel->getFeaturedNews(),
        ];

        require_once __DIR__ . '/../views/pages/home.php';
    }
}
