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
        <div class="content">
            <div class="main-content">
                <!-- Main Content Goes Here -->            
                    
                    <?php
                        $servername = "localhost";
                        $username = "root"; // Thay username và password bằng thông tin của bạn
                        $password = "";
                        $dbname = "foodorder";

                        // Tạo kết nối đến cơ sở dữ liệu
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Kiểm tra kết nối
                        if ($conn->connect_error) {
                            die("Kết nối không thành công: " . $conn->connect_error);
                        }

                        // Kiểm tra xem có IDDonHang được chọn không
                        if (isset($_GET['id'])) {
                            $orderId = $_GET['id'];

                            // Truy vấn chi tiết đơn hàng từ bảng ChiTietDonHang và DonHang
                            $sql = "SELECT ChiTietDonHang.IDDonHang, MonAn.TenMonAn, ChiTietDonHang.LoaiMonAn, 
                                    ChiTietDonHang.SoLuong, 
                                    CASE 
                                        WHEN ChiTietDonHang.LoaiMonAn = 'món chính' THEN ChiTietDonHang.SoLuong * MonAn.Gia 
                                        WHEN ChiTietDonHang.LoaiMonAn = 'món tặng' THEN 0 
                                        ELSE 0 
                                    END AS ThanhTien
                                    FROM ChiTietDonHang
                                    INNER JOIN MonAn ON ChiTietDonHang.IDMonAn = MonAn.IDMonAn
                                    WHERE ChiTietDonHang.IDDonHang = $orderId";

                            $result = $conn->query($sql);

                        if ($result) {
                            if ($result->num_rows > 0) {
                                // Hiển thị thông tin chi tiết đơn hàng trong bảng
                                echo "<h2>Chi tiết đơn hàng</h2>";
                                echo "<table>";
                                echo "<thead><tr>
                                        <th>ID đơn hàng</th>
                                        <th>Tên món ăn</th>
                                        <th>Loại món ăn</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr></thead><tbody>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["IDDonHang"] . "</td>";
                                    echo "<td>" . $row["TenMonAn"] . "</td>";
                                    echo "<td>" . $row["LoaiMonAn"] . "</td>";
                                    echo "<td>" . $row["SoLuong"] . "</td>";
                                    echo "<td>" . $row["ThanhTien"] . "</td>";
                                    echo "</tr>";
                                }

                                    echo "</tbody></table>";
                                } else {
                                    echo "<p>Không có dữ liệu cho đơn hàng có ID " . $orderId . "</p>";
                                }
                            } else {
                                echo "<p>Lỗi truy vấn SQL: " . $conn->error . "</p>";
                            }
                            } else {
                                echo "<p>Không có ID đơn hàng được cung cấp</p>";
                            }

                            $conn->close();
                            ?>

                        <div class="details">
                            <!-- Nơi để hiển thị chi tiết đơn hàng khi nhấn nút -->
                        </div>

                        <script>
                            // JavaScript để xử lý sự kiện khi nhấn nút "Xem Chi Tiết"
                            const detailButtons = document.querySelectorAll('.details-btn');
                            const detailsContainer = document.querySelector('.details');

                            detailButtons.forEach(button => {
                                button.addEventListener('click', function () {
                                    const orderId = this.getAttribute('data-orderid');

                                    // Gửi yêu cầu AJAX hoặc Fetch để lấy chi tiết đơn hàng từ máy chủ dựa trên IDDonHang
                                    // Hiển thị dữ liệu chi tiết đơn hàng trong detailsContainer
                                    // Ví dụ:
                                    detailsContainer.innerHTML = `<p>Đang tải chi tiết đơn hàng ${orderId}...</p>`;
                                });
                            });
                        </script>

                        <!-- Thêm sản phẩm khác tương tự ở đây -->
                    <a href="order_list.php">Quay lại danh sách đơn hàng</a>


        

            </div>
</body>
</html>
