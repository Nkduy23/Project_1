<?php

namespace App\Models;

class NewsModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getAllNews()
    {
        $sql = "SELECT * FROM news ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getFeaturedNews()
    {
        $sql = "SELECT * FROM news WHERE is_featured = 1 ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
