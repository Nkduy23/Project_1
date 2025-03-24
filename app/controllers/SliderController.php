<?php
require_once __DIR__ . '/../models/SliderModel.php';

class SliderController {
    private $sliderModel;

    public function __construct() {
        $this->sliderModel = new SliderModel();
    }

    public function getAllSliders() {
        return $this->sliderModel->getAllSliders();
    }
}

?>