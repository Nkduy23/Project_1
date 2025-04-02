<?php

namespace App\Models;

class MenuModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllMenusTree()
    {
        $sql = "SELECT * FROM menus ORDER BY position ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $menus = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $menuTree = [];
        foreach ($menus as $menu) {
            $menuTree[$menu['parent_id']][] = $menu;
        }

        return $menuTree;
    }
}
