<?php
// order_status_update.php
include '../config/config.php';
include '../Model/OrderModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    if ($_POST["action"] == "updateOrderStatus") {
        require_once '../Controller/OrderController.php';
        require_once '../Model/OrderModel.php'; // Correct the path and case

        $orderId = $_POST["orderId"];
        $newStatus = $_POST["newStatus"];

        $orderController = new OrderController($conn);
        $orderController->updateOrderStatus($orderId, $newStatus);
    }
}
