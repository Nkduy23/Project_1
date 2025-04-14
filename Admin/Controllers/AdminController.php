<?php
namespace Admin\Controllers;

class AdminController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/dashboard.php';
    }
}
?>