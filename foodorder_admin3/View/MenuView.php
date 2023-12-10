<?php
include('../config/database.php'); // Thêm đoạn này để có kết nối đến database

require_once('../Model/MenuModel.php');

$db = new mysqli('localhost', 'root', '', 'foodorder');
$menuModel = new MenuModel($db); // Truyền đối số kết nối đến MenuModel

$menus = $menuModel->getAllMenus();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="BoneAdmin.css">

    <style>

        table {
            border-spacing: 0;
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
        }

            /* CSS cho phần header của bảng */
        thead th {
            background-color: #ff80ab; /* Màu nền */
            color: white; /* Chữ trắng */
        }

        /* CSS cho những dòng liên tiếp */
        tbody tr:nth-child(even) {
            background-color: #ffeded; /* Màu hồng nhạt cho dòng chẵn */
        }

        tbody tr:nth-child(odd) {
            background-color: #fff7f7; /* Màu hồng nhạt khác cho dòng lẻ */
        }

        /* Loại bỏ border */
         th,
        td {
            border: none; /* Loại bỏ border */
            padding: 8px;
            text-align: left;
        }

        button.btn.btn-primary {
            background-color: #ff80ab;
            color: #fff;
            border: 1px solid #ff80ab;
            padding: 8px 16px;
            border-radius: 4px;
        }

    </style>

</head>

<body>
    <header>
        <div class="notification" style="margin-left: 1300px">
            <i class="fas fa-bell" style="color: white;"></i>
            <i class="fas fa-cog" style="color: white;"></i>
        </div>
    </header>

    <aside class="sidebar">
        <div class="admin-info">
            <img src="logo.jpg" alt="logo picture" width="100" height="100"> <br><br>
            <h4> Hello, Admin </h4>
        </div>
        <nav class="menu">
            <ul>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'HomeView.php') echo 'class="current-page"'; ?>><a href="HomeView.php">Trang Chủ</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'Food.php') echo 'class="current-page"'; ?>><a href="Food.php">Quản lý Món Ăn</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'MenuView.php') echo 'class="current-page"'; ?>><a href="MenuView.php">Quản lý Menu</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'CustomerView.php') echo 'class="current-page"'; ?>><a href="CustomerView.php">Quản lý Khách Hàng</a></li>
                <li <?php if(basename($_SERVER['PHP_SELF']) == 'order_list.php') echo 'class="current-page"'; ?>><a href="order_list.php">Quản lý đơn hàng</a></li>
            </ul>
        </nav>
        <div class="logout" style="margin-top: 10px">
            <a href=".php" class="logout-button">Đăng Xuất</a>
        </div>
    </aside>

    <main class="content">
        <h1>Danh sách Menu</h1>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFoodModal">
            Thêm Mới
        </button>
        <br><br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Menu</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu): ?>
                    <tr>
                        <td><?php echo $menu['MenuID']; ?></td>
                        <td><?php echo $menu['TenMenu']; ?></td>
                        <td><?php echo $menu['NgayCapNhat']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary edit-btn" data-menuid="<?php echo $menu['MenuID']; ?>" data-toggle="modal" data-target="#editMenuModal">Chỉnh sửa</button>
                            <button type="button" class="btn btn-danger delete-btn" data-menuid="<?php echo $menu['MenuID']; ?>">Xóa</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <!-- Modal Thêm mới menu -->
    <div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Thêm Mới Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form để người dùng nhập thông tin -->
                    <form id="addMenuForm" action="../Controller/MenuController.php?action=addMenu" method="post">
                        <div class="form-group">
                            <label for="tenMenu">Tên Menu:</label>
                            <input type="text" class="form-control" id="tenMenu" name="tenMenu" required>
                        </div>
                        <!-- Các trường thông tin khác nếu cần -->
                        <button type="submit" class="btn btn-primary">Thêm Menu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    </main>




</body>

</html>
