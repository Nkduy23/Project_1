<?php
require_once __DIR__ . '/../models/BannerModel.php';

class BannerController {
    private $bannerModel;

    public function __construct() {
        $this->bannerModel = new BannerModel();
    }

    public function getBanners($type)
    {
        return $this->bannerModel->getBannersByType($type);
    }
}

?>