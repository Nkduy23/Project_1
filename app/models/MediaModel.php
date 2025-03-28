<?php
require_once __DIR__ . '/BaseModel.php';

class MediaModel extends BaseModel
{
    public function getMedia($column, $value, $columns = '*', $orderBy = 'position', $order = 'ASC')
    {
        return $this->getByCondition('media_library', $column, $value, $columns, $orderBy, $order);
    }
}