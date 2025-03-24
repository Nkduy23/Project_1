<?php
require_once __DIR__ . '/BaseModel.php';

class BrandModel extends BaseModel
{
    public function getBrandsByCategory($categoryName)
    {
        $sql = "SELECT b.* 
                FROM brands b
                JOIN brand_categories c ON b.category_id = c.id
                WHERE c.name = ? 
                ORDER BY b.id ASC";
                
        return $this->db->getAll($sql, [$categoryName]);
    }
}
