<?php
require_once __DIR__ . '/../models/FeatureModel.php';

class FeatureController {
    private $featureModel;

    public function __construct() {
        $this->featureModel = new FeatureModel();
    }

    public function getAllFeature() {
        return $this->featureModel->getAllFeatures();
    }
}

?>