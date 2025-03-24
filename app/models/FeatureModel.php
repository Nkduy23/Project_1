<?php
require_once __DIR__ . '/BaseModel.php';

class FeatureModel extends BaseModel
{
    public function getAllFeatures()
    {
        return $this->getAll('features', 'position', 'ASC');
    }
}
