<?php

namespace Admin\Models;

class AdminCustomerModel
{

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAllCustomers()
    {
        try {
            $sql = "SELECT * FROM KhachHang";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\Exception $e) {
            error_log("AdminProductModel Error: " . $e->getMessage());
            return [];
        }
    }
}
