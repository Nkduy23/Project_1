<?php
require_once __DIR__ . '/CallDatabase.php';

class BrandModel extends CallDatabase
{
    public function getBrands($categoryName)
    {
        $sql = "SELECT b.* FROM brands b JOIN brands_categories c ON b.category_id = c.id WHERE c.name = ? ORDER BY b.id ASC";
        $result = $this->db->getAll($sql, [$categoryName]);
        return $result;
    }
}
