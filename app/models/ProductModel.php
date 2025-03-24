<?php
require_once __DIR__ . '/BaseModel.php';

class ProductModel extends BaseModel
{
    public function getProductsByCategory($categoryName)
    {
        $sql = "SELECT p.* 
                FROM products p
                JOIN product_categories c ON p.category_id = c.id
                WHERE c.name = ? 
                ORDER BY p.id ASC";
                
        return $this->db->getAll($sql, [$categoryName]);
    }

    public function getSaleProducts()
    {
        $sql = "SELECT * FROM products WHERE is_sale = 1 ORDER BY id ASC";
        return $this->db->getAll($sql);
    }
}
