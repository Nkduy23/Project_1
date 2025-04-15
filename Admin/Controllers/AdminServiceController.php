<?php
namespace Admin\Controllers;

class AdminServiceController {
    private $adminServiceModel;
    
    public function __construct($adminServiceModel) {
        $this->adminServiceModel = $adminServiceModel;
    }

    public function index() {
        $services = $this->adminServiceModel->getAllServices();
        require_once __DIR__ . '/../Views/services.php';
    }
}
?>
