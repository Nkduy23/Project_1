<?php
require_once __DIR__ . '/BaseModel.php';

class NewsModel extends BaseModel
{
    public function getAllNews()
    {
        return $this->getAll('news', 'id', 'DESC');
    }

    public function getFeaturedNews()
    {
        $sql = "SELECT * FROM news WHERE is_featured = 1 ORDER BY id DESC";
        return $this->db->getAll($sql);
    }
}
