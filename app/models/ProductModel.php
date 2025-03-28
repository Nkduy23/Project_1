<?php
require_once __DIR__ . '/BaseModel.php';

class ProductModel extends BaseModel
{
    public function getProductsByCategory($categoryName, $limit = null)
    {
        $sql = "SELECT p.name, p.link, p.image, p.image_hover, p.price, p.label 
        FROM products p
        JOIN products_categories c ON p.category_id = c.id
        WHERE c.name = ? 
        ORDER BY p.id ASC";

        // Nếu có giới hạn, thêm LIMIT vào SQL
        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }
        return $this->db->getAll($sql, [$categoryName]);
    }

    public function getSaleProducts()
    {
        $sql = "SELECT * FROM products WHERE is_sale = 1 ORDER BY id ASC";
        return $this->db->getAll($sql);
    }

    public function getProductById($id)
    {
        $sql = "SELECT id, name, brand_id, category_id, image, image_hover, price, description, label, link 
            FROM products WHERE id = ?";
        return $this->db->getOne($sql, [$id]);
    }
}
