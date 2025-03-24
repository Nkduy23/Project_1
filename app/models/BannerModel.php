<?php
require_once __DIR__ . '/BaseModel.php';

class BannerModel extends BaseModel
{
    public function getBannersByType($type)
    {
        $sql = "SELECT * FROM banners WHERE type = ? ORDER BY id ASC";
        return $this->db->getAll($sql, [$type]);
    }
}
