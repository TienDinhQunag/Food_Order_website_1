<?php
include "bone.php";
require_once '../Model/Database.php';
require_once '../Model/OrderModel.php';


$database = new Database();
$orderModel = new OrderModel($database);

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header("Location: sign-in.php"); 
    exit();
}

$tenTaiKhoan = $_SESSION['user_id'];
$orderHistory = $orderModel->getOrderHistory($tenTaiKhoan);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bone.css">

    <style>
        /* Thêm CSS cho trang lịch sử đặt hàng nếu cần */
    </style>

    <title>Order History</title>
</head>
<style>
#bannerCarousel{
   display:none;
}
</style>
<body>
    <div class="container">

        <h2>Order History</h2>

        <?php
        if (!empty($orderHistory)) {
            foreach ($orderHistory as $order) {
                echo "<div class='order-item'>";
                echo "<p>Order ID: " . $order['IDDonHang'] . "</p>";
                echo "<p>Total Price: $" . $order['TongDonHang'] . "</p>";
                echo "<p>Status: " . $order['TrangThaiDonHang'] . "</p>";
            
                // Add more details as needed
            
                // Add a button or link to change order status
                echo "<form action='update_order_status.php' method='post'>";
                echo "<input type='hidden' name='orderId' value='" . $order['IDDonHang'] . "'>";
// ...

                echo "<select name='newStatus'>";

                // Allow changing status to "Cancelled" only if the current status is not "Shipped" or "Delivered"
                if ($order['TrangThaiDonHang'] !== 'cancelled') {
                    if ($order['TrangThaiDonHang'] !== 'processing' && $order['TrangThaiDonHang'] !== 'completed') {
                        echo "<option value='pending'>Pending</option>";
                        echo "<option value='cancelled'>Cancelled</option>";
                    } else {
                        // Display the current status as an option (read-only)
                        echo "<option value='" . $order['TrangThaiDonHang'] . "' selected>" . $order['TrangThaiDonHang'] . "</option>";
                    }
                } else {
                    // Display the current status as an option (read-only)
                    echo "<option value='cancelled' selected>Cancelled</option>";
                }

                echo "</select>";

// ...

                echo "<button type='submit' name='updateStatus'>Update Status</button>";
                echo "</form>";
            
                echo "</div>";
            }
            
        } else {
            echo "<p>No order history available.</p>";
        }
        ?>

    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
