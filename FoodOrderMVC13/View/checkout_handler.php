<?php
session_start();

include '../Model/Database.php';
include '../Model/ProductModel.php';
include '../Controller/ProductController.php';
include '../Model/OrderModel.php';
include '../Controller/OrderController.php';

$database = new Database();
$productModel = new ProductModel($database);
$productController = new ProductController($productModel);
$orderModel = new OrderModel($database);
$orderController = new OrderController($orderModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "Bạn chưa đăng nhập.";
        return;
    }
    require_once '../Controller/TaiKhoanController.php';
    require_once '../Model/TaiKhoanModel.php';
    $model = new TaiKhoanModel(); // Initialize $model here
    $controller = new TaiKhoanController($model);
  
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../View/Sign-in.php");
        exit();
    }
    $tenTaiKhoan = $_SESSION['user_id'];


    $addressData = array(
        'ThanhPho' => $_POST['thanhPho'],
        'Quan' => $_POST['quan'],
        'Phuong' => $_POST['phuong'],
        'Duong' => $_POST['duong'],
    );

    // Create controller and update customer information
    $model->updateCustomerAddress($tenTaiKhoan, $addressData);

    // Get user ID from session
    $customerId = $_SESSION['user_id'];

    // Get cart items from session
    $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Place the order
    $orderId = $orderController->placeOrder($customerId, $cartItems);
    

    if ($orderId) {
        // Order successfully placed
        echo "Đơn hàng của bạn (ID: $orderId) đã được đặt thành công!";
        
        // Optionally, you can redirect the user to a thank you page or order summary page
        // header("Location: ../View/thank_you_page.php?order_id=$orderId");
        // exit();
    } else {
        // Failed to place the order
        echo "Đã xảy ra lỗi khi đặt hàng. Vui lòng thử lại.";
    }
}






?>
