<?php
require_once __DIR__ . '/BaseModel.php';

class ServiceModel extends BaseModel
{
    public function getAllServices()
    {
        return $this->getAll('services', 'id', 'ASC');
    }
}
