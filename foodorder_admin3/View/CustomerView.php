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
    
    <title>Danh sách Khách hàng</title>
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
               <!-- Main Content Goes Here -->
               
               <h1>Danh sách Khách Hàng</h1>

            <!-- Thêm ô tìm kiếm -->
            <br><br>
            <div class="search-container">
                <div id="search-box">
                    <label for="search">Tìm kiếm</label>
                    <input type="text" id="search" name="search" placeholder="Nhập tìm kiếm">
                    <button onclick="checkAndSearchOrder()">Tìm kiếm</button>
                    <p id="search-result-message" style="display: none;"></p>
                </div>
            </div>        
            <br><br>

            <script>

            // JavaScript để xử lý sự kiện khi nhấn nút "Tìm kiếm"
            function searchOrder() {
                const searchInput = document.getElementById('search').value;

                // Chuyển hướng đến trang chi tiết đơn hàng với IDDonHang được tìm kiếm
                window.location.href = `order_details.php?id=${searchInput}`;
            }
            function checkAndSearchOrder() {
            // Lấy giá trị nhập vào ô tìm kiếm
            var searchInput = document.getElementById("search").value;

            // Kiểm tra xem ô tìm kiếm có giá trị hay không
                if (searchInput.trim() === "") {
                    alert("Vui lòng nhập ID Đơn Hàng trước khi tìm kiếm.");
                } else {
                    // Nếu có giá trị, gọi hàm tìm kiếm
                    searchOrder();
                }
            }
            </script>


            <div class="cart">

            <table>
                <thead>
                    <tr>
                        <th class="col-md-1">ID Khách hàng</th>
                        <th class="col-md-3">Tên Khách Hàng</th>
                        <th class="col-md-2">Số điện thoại</th>
                        <th class="col-md-2">Email</th>
                        <th class="col-md-2">Ngày sinh</th>
                        <th class="col-md-2">Hình Ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodorder";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Kết nối không thành công: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM KhachHang ORDER BY IDKhachHang"; // Truy vấn SQL để lấy danh sách khách hàng theo ID
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='col-md-1'>" . $row["IDKhachHang"] . "</td>";
                            echo "<td class='col-md-3'>" . $row["TenKhachHang"] . "</td>";
                            echo "<td class='col-md-2'>" . $row["SDT"] . "</td>";
                            echo "<td class='col-md-2'>" . $row["Email"] . "</td>";
                            echo "<td class='col-md-2'>" . $row["NgaySinh"] . "</td>";
                            echo "<td class='col-md-2'><img src='" . $row["HinhAnh"] . "' alt='Hình ảnh' width='50'></td>"; // Hiển thị hình ảnh
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
            </div>

            <script>
            // JavaScript để xử lý sự kiện khi nhấn nút "Xem Chi Tiết"
            const detailButtons = document.querySelectorAll('.details-btn');
            const detailsContainer = document.querySelector('.details');

            detailButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const orderId = this.getAttribute('data-orderid');
                    
                    // Chuyển hướng đến trang chi tiết đơn hàng với IDDonHang tương ứng
                    window.location.href = 'order_details.php?id=' + orderId;
                });
            });
            </script>

    </main>

</body>

</html>
