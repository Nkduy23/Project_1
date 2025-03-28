<?php
require_once __DIR__ . '/../models/MediaModel.php';

class MediaController
{
    private $mediaModel;

    public function __construct()
    {
        $this->mediaModel = new MediaModel();
    }

    public function getMedia($column, $value, $columns = '*', $orderBy = 'position', $order = 'ASC')
    {
        return $this->mediaModel->getMedia($column, $value, $columns, $orderBy, $order);
    }
}
