<?php
require_once __DIR__ . '/BaseModel.php';

class MenuModel extends BaseModel
{
    protected $table = 'menus'; // Định nghĩa bảng menus

    public function getAllMenusTree()
    {
        // Gọi phương thức getAll() từ BaseModel, sắp xếp theo 'position'
        $menus = $this->getAll($this->table, 'position');

        $menuTree = [];
        foreach ($menus as $menu) {
            $menuTree[$menu['parent_id']][] = $menu;
        }

        return $menuTree;
    }
}
