<?php

namespace App\Controllers;

class MenuController
{
    private $menuModel;

    public function __construct(
        $menuModel
    ) {
        $this->menuModel = $menuModel;
    }

    public function getAllMenusTree()
    {
        return $this->menuModel->getAllMenusTree();
    }
}
