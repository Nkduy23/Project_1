<?php
require_once __DIR__ . '/CallDatabase.php';

class ProductModel extends CallDatabase
{
    public function getProducts($categoryName, $limit = null)
    {
        $sql = "SELECT p.id, p.name, p.image, p.image_hover, p.price, p.label 
                FROM products p
                JOIN products_categories c ON p.category_id = c.id
                JOIN brands_names b ON p.brand_id = b.id
                WHERE c.name = ? 
                ORDER BY p.id ASC";
                
        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }
        
        $products = $this->db->getAll($sql, [$categoryName]);

        if ($products) {
            foreach ($products as &$product) {
                if (isset($product['id'])) {
                    $product['link'] = '/detail/' . $product['id'];
                } else {
                    $product['link'] = '#'; // Default link if ID is missing
                }
            }
        }

        return $products ?: []; // Return empty array if no products found
    }
    public function getSaleProducts()
    {
        $sql = "SELECT * FROM products WHERE is_sale = 1 ORDER BY id ASC";
        $products = $this->db->getAll($sql);

        if($products) {
            foreach ($products as &$product) {
                if (isset($product['id'])) {
                    $product['link'] = '/detail/' . $product['id'];
                } else {
                    $product['link'] = '#'; // Default link if ID is missing
                }
            }
        }

        return $products ?: [];
    }

    public function getProductById($id)
    {
        $sql = "SELECT id, name, category_id, brand_id, image, image_hover, price, description, label 
            FROM products WHERE id = ?";
         return$this->db->getOne($sql, [$id]);
    }

    public function getProductDetails($id)
    {
        $sql = "SELECT attribute_name, attribute_value FROM products_details WHERE product_id = ?";
        return $this->db->getAll($sql, [$id]);
    }
}
