<?php
   require_once '../Model/TaiKhoanModel.php';
   require_once '../Controller/ProfileController.php';
   include "Bone.php";
   
   // Assuming $model is an instance of TaiKhoanModel
   $model = new TaiKhoanModel();
   
   // Create an instance of the ProfileController
   $profileController = new ProfileController($model);
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
/* CSS */
.cart {
    border: 1px solid #ccc;
    padding: 20px;
    margin: 40px auto;
    max-width: 800px;
    text-align: center; /* Để căn giữa nội dung bên trong */
    background-color: white;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border-radius: 10px;
}

table th {
    background-color: #ff68b4;
    color: white;
    padding: 8px;
    text-align: left;
}

table td {
    background-color: #fff;
    color: #000;
    border: 0px;
    padding: 8px;
    text-align: left;
}

table td:nth-child(3) { /* Giá tiền màu đỏ */
    color: #ff0000;
}

input[type="text"] {
    border: 1px solid #ccc;
    padding: 6px;
    margin-bottom: 10px;
}

.cart-summary {
    border-top: 1px solid #ccc;
    padding-top: 10px;
    margin-top: 20px;
}

.cart-summary p {
    font-weight: bold;
    color: #ff68b4;
}

.cart-summary button {
    padding: 10px 20px;
    background-color: #ff68b4;
    color: #fff;
    border: none;
    cursor: pointer;
}

.cart-summary button:hover {
    background-color: #ff3399;
}

.Address {
    text-align: left; /* Sử dụng text-align: left để căn trái */
    border: 2px solid #ff68b4; /* Khung màu hồng */
    border-radius: 10px; /* Bo góc */
    padding: 20px; /* Khoảng cách nội dung và khung */
}
    
    </style>

    <title>MainPage</title>
</head>

<body>
    <div class="cart">
        <h4>Checkout Your Cart 🛒</h4><br>

        <?php
        include '../Model/Database.php';
        include '../Model/ProductModel.php';
        include '../Controller/ProductController.php';

        $database = new Database();
        $productModel = new ProductModel($database);
        $productController = new ProductController($productModel);

        // Check if the cart is not empty
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            ?>
            <form id="checkoutForm" action="checkout_handler.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalPrice = 0;
                        foreach ($_SESSION['cart'] as $cartItem) {
                            ?>
                            <tr>
                                <td><?= $cartItem['IDMonAn'] ?></td>
                                <td><?= $cartItem['TenMonAn'] ?></td>
                                <td><?= $cartItem['Gia'] ?></td>
                                <td>
                                    <span class="quantity-value" id="quantity_<?= $cartItem['IDMonAn'] ?>"><?= $cartItem['SoLuong'] ?></span>
                                </td>
                                <td><?= $cartItem['Gia'] * $cartItem['SoLuong'] ?></td>
                            </tr>
                            <?php
                            $totalPrice += $cartItem['Gia'] * $cartItem['SoLuong'];
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                
                <!-- Display customer address as text inputs -->

        <div class="Address"> <h6>Change your Address here</h6> <br>    
                <?php
                if (isset($_SESSION['user_id'])) {
                    $tenTaiKhoan = $_SESSION['user_id'];
                    $customerProfile = $profileController->getCustomerProfile($tenTaiKhoan);
                    
                    if ($customerProfile) {
                        ?>
                        <label for="thanhPho">Thành Phố:</label>
                        <input type="text" id="thanhPho" name="thanhPho" value="<?= $customerProfile['ThanhPho']; ?>" required><br>
        
                        <label for="quan">Quận:</label>
                        <input type="text" id="quan" name="quan" value="<?= $customerProfile['Quan']; ?>" required><br>
        
                        <label for="phuong">Phường:</label>
                        <input type="text" id="phuong" name="phuong" value="<?= $customerProfile['Phuong']; ?>" required><br>
        
                        <label for="duong">Đường:</label>
                        <input type="text" id="duong" name="duong" value="<?= $customerProfile['Duong']; ?>" required><br>
                        <?php
                    }
                }
                ?>
        </div><br><br>

                <div id="addressConfirmation">
                    <h6>Your Address: </h6>
                    <p id="addressContent">Please fill in your address details above</p>
                </div>

                <script>
                    const thanhPhoInput = document.getElementById('thanhPho');
                    const quanInput = document.getElementById('quan');
                    const phuongInput = document.getElementById('phuong');
                    const duongInput = document.getElementById('duong');
                    const addressConfirmation = document.getElementById('addressContent'); // Thay đổi ID tương ứng

                    // Hàm để cập nhật nội dung xác nhận khi có thay đổi
                    function updateAddressConfirmation() {
                        const thanhPho = thanhPhoInput.value.trim();
                        const quan = quanInput.value.trim();
                        const phuong = phuongInput.value.trim();
                        const duong = duongInput.value.trim();

                        // Xâu chuỗi các giá trị để hiển thị xác nhận
                        const addressString = ${duong}, ${phuong}, ${quan}, ${thanhPho};

                        // Cập nhật nội dung xác nhận
                        addressConfirmation.textContent = addressString;
                    }

                    // Gọi hàm cập nhật ban đầu
                    updateAddressConfirmation();

                    // Lắng nghe sự kiện khi các input thay đổi
                    thanhPhoInput.addEventListener('input', updateAddressConfirmation);
                    quanInput.addEventListener('input', updateAddressConfirmation);
                    phuongInput.addEventListener('input', updateAddressConfirmation);
                    duongInput.addEventListener('input', updateAddressConfirmation);
                </script>

                <br>
                
                <!-- Display total price -->
                <div class="cart-summary">
                    <p>TOTAL: <?= $totalPrice ?>$</p>
                    <button type="submit" name="order"> 🤍 Order 🤍 </button>
                </div>
            </form>
            <?php
        }
        ?>
    </div>

  

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>