<?php

namespace Admin\Controllers;

class AdminController
{
    public function index()
    {
        if (!isset($_SESSION['user']) || $_SESSION['VaiTro'] !== 1) {
            header('Location: /login');
            exit;
        }
        require_once __DIR__ . '/../Views/dashboard.php';
    }
}
