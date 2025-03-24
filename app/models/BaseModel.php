<?php
require_once __DIR__ . '/../config/Database.php';

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll($table, $orderBy = 'id', $order = 'ASC')
    {
        $sql = "SELECT * FROM $table ORDER BY $orderBy $order";
        return $this->db->getAll($sql);
    }
}
