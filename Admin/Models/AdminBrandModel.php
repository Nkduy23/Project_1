<?php

namespace Admin\Models;

class AdminBrandModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllBrands()
    {
        try {
            $sql = "SELECT * FROM DanhMucThuongHieu";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("AdminBrandModel Error: " . $e->getMessage());
            return [];
        }
    }
}
