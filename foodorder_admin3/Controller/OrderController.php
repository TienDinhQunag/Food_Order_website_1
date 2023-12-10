<?php

class OrderController {
    private $model;

    public function __construct($conn) {
        $this->model = new OrderModel($conn);
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
            if ($_POST["action"] == "updateOrderStatus") {
                $orderId = $_POST["orderId"];
                $newStatus = $_POST["newStatus"];

                $this->updateOrderStatus($orderId, $newStatus);
            }
        }

        // Gọi hàm từ model để lấy thông tin đơn hàng
        $orders = $this->model->getAllOrders();

        // Hiển thị view
        require('../views/order_list.php');
    }

    public function updateOrderStatus() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
            if ($_POST["action"] == "updateOrderStatus") {
                $orderId = $_POST["orderId"];
                $newStatus = $_POST["newStatus"];
    
                $this->model->updateOrderStatus($orderId, $newStatus);
            }
        }
    
        // Redirect back to the order list page after updating
        header("Location: order_list.php");
        exit;
    }
    
    

    public function viewOrderDetails($orderId) {
        // Gọi hàm từ model để lấy thông tin chi tiết đơn hàng theo $orderId
        $orderDetails = $this->model->getOrderDetailsById($orderId);

        // Hiển thị view chi tiết đơn hàng
        require('../views/order_details.php');
    }
}
?>
