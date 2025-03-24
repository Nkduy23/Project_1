<?php
require_once __DIR__ . '/../config/Database.php';

class MenuModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllMenusTree()
    {
        $sql = "SELECT * FROM menus ORDER BY position";
        $menus = $this->db->getAll($sql);
        $menuTree = [];
        foreach ($menus as $menu) {
            $menuTree[$menu['parent_id']][] = $menu;
        }

        return $menuTree;
    }
}
