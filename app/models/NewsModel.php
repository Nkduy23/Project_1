<?php
require_once __DIR__ . '/CallDatabase.php';

class NewsModel extends CallDatabase
{
    public function getAllNews()
    {
        $sql = "SELECT * FROM news ORDER BY id DESC";
        return $this->db->getAll($sql);
    }

    public function getFeaturedNews()
    {
        $sql = "SELECT * FROM news WHERE featured = 1 ORDER BY id DESC";
        return $this->db->getAll($sql);
    }
}
