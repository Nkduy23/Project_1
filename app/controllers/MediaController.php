<?php

namespace App\Controllers;

class MediaController
{
    private $mediaModel;

    public function __construct($mediaModel,)
    {
        $this->mediaModel = $mediaModel;
    }

    public function getMedia($column, $value, $columns = '*', $orderBy = 'position', $order = 'ASC')
    {
        return $this->mediaModel->getMedia($column, $value, $columns, $orderBy, $order);
    }
}
