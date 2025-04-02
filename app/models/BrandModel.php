<?php

namespace App\Models;

class BrandModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
    public function getBrands($categoryName)
    {
        $sql = "SELECT b.* FROM brands b JOIN brands_categories c ON b.category_id = c.id WHERE c.name = ? ORDER BY b.id ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$categoryName]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result ?: [];
    }
}
