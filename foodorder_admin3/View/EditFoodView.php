<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="BoneAdmin.css">

    <style>
        /* CSS để hiển thị button "X" và button "Tìm kiếm" cùng hàng */

        .flexsearch-actions {
            display: flex;
            justify-content: flex-end; /* Căn phải */
            margin-right: 20px;
            margin-top: 20px;
            align-items: center; /* Căn các phần tử theo chiều dọc */
        }

        /* Định dạng label */
        label[for="searchTerm"] {
            margin-right: 10px; /* Khoảng cách với ô nhập liệu */
        }

        /* Định dạng ô nhập liệu */
        input#searchTerm {
            flex: 1; /* Ô nhập liệu mở rộng để lấp đầy khoảng trống còn lại */
            padding: 8px;
            border: 1px solid #ff80ab;
            border-radius: 4px;
        }

        /* Định dạng nút tìm kiếm */
        button.btn.btn-primary {
            background-color: #ff80ab;
            color: #fff;
            border: 1px solid #ff80ab;
            padding: 8px 16px;
            border-radius: 4px;
            margin-left: 10px; /* Khoảng cách giữa nút tìm kiếm và ô nhập liệu */
        }

        /* Định dạng nút reset */
        button#resetSearch.btn.btn-secondary {
            background-color: transparent;
            color: #ff80ab;
            border: 1px solid #ff80ab;
            padding: 6px 10px;
            border-radius: 50%;
            cursor: pointer;
            margin-left: 10px; /* Khoảng cách giữa nút reset và nút tìm kiếm */
        }

        /* Hiệu ứng hover cho nút reset */
        button#resetSearch.btn.btn-secondary:hover {
            background-color: #ffdede; /* Màu nền khi hover */
            border-color: #ff6b9c; /* Màu border khi hover */
            color: #ff6b9c; /* Màu chữ khi hover */
        }

        /* Thêm transition cho nút tìm kiếm và nút reset */
        button.btn.btn-primary,
        button#resetSearch.btn.btn-secondary {
            transition: all 0.3s ease; /* Thời gian và kiểu chuyển động */
        }

        /* Định dạng nút Thêm Mới */
        button.btn.btn-primary[data-toggle="modal"] {
            margin-left: auto; /* Đẩy nút sang phải */
            margin-bottom: 10px; /* Khoảng cách dưới của nút */
        }
        /* Hiệu ứng hover cho nút tìm kiếm */
        button.btn.btn-primary:hover {
            background-color: #ff6b9c; /* Màu nền khi hover */
            border-color: #ff6b9c; /* Màu border khi hover */
        }

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
        


    </style>
    
    <title>Danh sách món ăn</title>
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
        <h6><a href="Food.php"> &lt; Danh sách món ăn </a></h6><br><br>
        <h2>Chỉnh sửa món ăn</h2><br><br>
        <form id="editFoodForm" action="" method="post">
        <!-- Populate the form fields with values from $food -->
        <input type="hidden" name="editFoodId" value="<?php echo $food['IDMonAn']; ?>">

        <div class="form-group">
            <label for="editTenMonAn">Tên Món Ăn:</label>
            <input type="text" class="form-control" id="editTenMonAn" name="editTenMonAn" value="<?php echo $food['TenMonAn']; ?>" required>
        </div>

        <div class="form-group">
            <label for="editMoTa">Mô Tả:</label>
            <textarea class="form-control" id="editMoTa" name="editMoTa" rows="4" required><?php echo $food['MoTa']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="editGia">Giá Tiền:</label>
            <input type="text" class="form-control" id="editGia" name="editGia" value="<?php echo $food['Gia']; ?>" required>
        </div>

        <div class="form-group">
            <label for="editLoaiMonAn">Loại Món Ăn:</label>
            <select class="form-control" id="editLoaiMonAn" name="editLoaiMonAn" required>
                <option value="Toast" <?php echo ($food['LoaiMonAn'] === 'Toast') ? 'selected' : ''; ?>>Toast</option>
                <option value="Cake" <?php echo ($food['LoaiMonAn'] === 'Cake') ? 'selected' : ''; ?>>Cake</option>
                <!-- Add other options for LoaiMonAn -->
            </select>
        </div>

        <div class="form-group">
            <label for="hinhAnh">Hình Ảnh:</label>
            <input type="file" id="hinhAnh" name="hinhAnh" accept="image/*" required>
        </div>

        <button type="submit" name="btnEdit" class="btn btn-primary edit-btn" style="margin: 20px 300px">Lưu Thay Đổi</button>
    </form>
        
    </main>

<script>

</script>

</body>

</html>
