<?php
require_once __DIR__ . '/BaseModel.php';

class Top10Model extends BaseModel
{
    public function getTop10()
    {
        return $this->getAll('top10', 'id', 'ASC');
    }
}
