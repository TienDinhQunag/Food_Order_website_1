<?php
session_start();
require_once '../Model/Database.php';
require_once '../Model/OrderModel.php';

$database = new Database();
$orderModel = new OrderModel($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateStatus'])) {
        $orderId = $_POST['orderId'];
        $newStatus = $_POST['newStatus'];

        // Perform validation on $orderId and $newStatus if needed

        // Update the order status in the database
        $success = $orderModel->updateOrderStatus($orderId, $newStatus);

        if ($success) {
            echo "Order status updated successfully.";
            header("Location: order_history.php");
        } else {
            echo "Failed to update order status.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>
