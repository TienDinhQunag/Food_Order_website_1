<?php
require_once('Model/MenuModel.php');

class MenuController {
    private $menuModel;

    public function __construct($db) {
        $this->menuModel = new MenuModel($db);
    }

    public function index() {
        $menus = $this->menuModel->getAllMenus();
        require('View/MenuView.php');
    }
}

// Sử dụng khi khởi tạo controller
$db = new mysqli('localhost', 'username', 'password', 'ten_database');
$menuController = new MenuController($db);
$menuController->index();
?>
