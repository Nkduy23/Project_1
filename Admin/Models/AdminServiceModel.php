<?php

namespace Admin\Models;

class AdminServiceModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllServices()
    {
        try {
            $sql = "SELECT * FROM DichVu";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            error_log("AdminServiceModel Error: " . $e->getMessage());
        }
    }
}
