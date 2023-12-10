// index.php

<?php
require_once('config.php');
require_once('controllers/OrderController.php');

$controller = new OrderController($conn);

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'viewOrderDetails' && isset($_GET['id'])) {
        $orderId = $_GET['id'];
        $controller->viewOrderDetails($orderId);
        exit();
    }
}

$controller->index();
?>
 </div>

<script>




