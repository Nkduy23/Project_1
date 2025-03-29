<?php
require_once __DIR__ . '/CallDatabase.php';

class MenuModel extends CallDatabase
{
    public function getAllMenusTree()
    {
        $sql = "SELECT * FROM menus ORDER BY position ASC";
        $menus = $this->db->getAll($sql);
        $menuTree = [];
        foreach ($menus as $menu) {
            $menuTree[$menu['parent_id']][] = $menu;
        }

        return $menuTree;
    }
}
