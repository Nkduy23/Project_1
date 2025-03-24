<?php
require_once __DIR__ . '/BaseModel.php';

class SliderModel extends BaseModel
{
    public function getAllSliders()
    {
        return $this->getAll('sliders', 'position', 'ASC');
    }
}
