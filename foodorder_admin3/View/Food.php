<?php
include('../Model/FoodModel.php');
$foodModel = new FoodModel();
$foods = $foodModel->getAllFoods();
?>

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

            /* CSS để ẩn hiện dropdown */
            .filter-dropdown {
                display: none;
                position: absolute;
                z-index: 1;
                background-color: #fff;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                border-radius: 4px;
                padding: 8px;
                top: 20px;
                right: 0;
            }

            .filter-icon-container:hover .filter-dropdown {
                display: block;
            }

            .filter-icon {
                cursor: pointer;
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
        <h1>Danh sách món ăn</h1>

        <!-- Tạo thanh tìm kiếm -->        
        <div class="flexsearch-actions">
            <form action="" method="get" class="search-form">
                <label for="searchTerm">Tìm kiếm:</label>
                <input type="text" id="searchTerm" name="searchTerm" placeholder="Nhập tên món ăn...">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
            <button type="button" id="resetSearch" class="btn btn-secondary">X</button>
        </div>

        <!-- xử lý việc tìm kiếm, tạo nội dung HTML dựa trên từ khóa tìm kiếm. -->
        <script>
        $(document).ready(function () {
            $('.search-form').submit(function (e) {
                e.preventDefault();

                // Get the search term from the input field
                var searchTerm = $('#searchTerm').val();

                // Make an AJAX request to get the search results
                $.ajax({
                    type: 'GET',
                    url: 'search.php', // Create a new PHP file for handling search
                    data: { searchTerm: searchTerm },
                    success: function (response) {
                        // Replace the current table body with the new search results
                        $('tbody').html(response);
                    }
                });
            });
        });
        </script>

        <!-- Xử lý hiển thị tìm kiếm -->        
        <script>
            $(document).ready(function () {
                // Lưu danh sách món ăn gốc khi trang được tải lần đầu
                var originalFoods = <?php echo json_encode($foods); ?>;

                $('.search-form').submit(function (e) {
                    e.preventDefault();

                    // Get the search term from the input field
                    var searchTerm = $('#searchTerm').val();

                    // Filter the original foods based on the search term
                    var searchResult = originalFoods.filter(function (food) {
                        return food['TenMonAn'].toLowerCase().includes(searchTerm.toLowerCase());
                    });

                    // Display the search result in the table
                    displaySearchResult(searchResult);
                });

                // Function to display search result in the table
                function displaySearchResult(result) {
                    var tableBody = $('tbody');

                    // Clear the table body
                    tableBody.empty();

                    // Render the search result in the table
                    result.forEach(function (food) {
                        var row = '<tr>' +
                            '<td>' + food['IDMonAn'] + '</td>' +
                            '<td>' + food['TenMonAn'] + '</td>' +
                            '<td>' + food['MoTa'] + '</td>' +
                            '<td>' + food['Gia'] + '</td>' +
                            '<td>' + food['LoaiMonAn'] + '</td>' +
                            '<td><img src="./Dish/' + food['HinhAnh'] + '.png" width="100" height="100"></td>' +
                            '<td>' +

                            // Các nút chỉnh sửa và xóa
                            '<a href="../View/EditFood.php?foodId=' + food['IDMonAn'] + '" class="btn btn-sm btn-primary edit-btn">' +
                            '<i class="fas fa-edit"></i> Chỉnh sửa</a>' +
                            '<a href="#" class="btn btn-sm btn-danger delete-btn" data-foodid="' + food['IDMonAn'] + '">' +
                            '<i class="fas fa-trash-alt"></i> Xóa</a>' +
                            '</td>' +
                            '</tr>';
                        tableBody.append(row);
                    });
                }

                // Reset to original food list when "x" button is clicked
                $('#resetSearch').click(function () {
                    // Display the original foods in the table
                    displaySearchResult(originalFoods);

                    // Clear the search term input field
                    $('#searchTerm').val('');
                });
            });
        </script>

        <!-- Tạo Button "Thêm Mới" -->        
        <br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFoodModal">
            Thêm Mới
        </button><br><br>

        <!-- Modal Thêm Mới Món Ăn -->
        <div class="modal fade" id="addFoodModal" tabindex="-1" role="dialog" aria-labelledby="addFoodModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFoodModalLabel">Thêm Mới Món Ăn</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="tenMonAn">Tên Món Ăn:</label>
                        <input type="text" class="form-control" id="tenMonAn" name="tenMonAn" required>
                    </div>
                    <div class="form-group">
                        <label for="moTa">Mô Tả:</label>
                        <textarea class="form-control" id="moTa" name="moTa" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Gia">Giá Tiền:</label>
                        <input type="text" class="form-control" id="Gia" name="Gia" required>
                    </div>
                    <div class="form-group">
                        <label for="LoaiMonAn">Loại Món Ăn:</label>
                        <select class="form-control" id="LoaiMonAn" name="LoaiMonAn" required>
                            <option value="">Chọn loại món ăn</option>
                            <option value="Toast">Toast</option>
                            <option value="Cake">Cake</option>
                            <option value="Cake Slice">Cake SLice</option>
                            <option value="Savoury">Savoury</option>
                            <option value="Sweet">Sweet</option>
                            <option value="Drink">Drink</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hinhAnh">Hình Ảnh:</label>
                        <input type="file" id="hinhAnh" name="hinhAnh" accept="image/*" required>
                    </div>

                    <button type="submit" name="btnadd" class="btn btn-primary">Thêm Món Ăn</button>

                </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách món ăn -->        
        <table border="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên món ăn</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>
                        <!-- Sử dụng icon filter thay thế -->
                        <div class="filter-icon-container" style="position: relative;">
                            Loại món ăn
                            <i class="fas fa-filter filter-icon"></i>
                            <div class="filter-dropdown">
                                <select class="form-control" id="filterLoaiMonAn">
                                    <option value="">Tất cả</option>
                                    <option value="Toast">Toast</option>
                                    <option value="Cake">Cake</option>
                                    <option value="Cake Slice">Cake Slice</option>
                                    <option value="Sweet">Sweet</option>
                                    <option value="Savoury">Savoury</option>
                                    <option value="Drink">Drinks</option>
                                </select>
                            </div>
                        </div>
                    </th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                </tr>                
            </thead>

            <tbody>
            <?php
                foreach ($foods as $food) {
                    echo "<tr>";
                    echo "<td>" . $food['IDMonAn'] . "</td>";
                    echo "<td>" . $food['TenMonAn'] . "</td>";
                    echo "<td>" . $food['MoTa'] . "</td>";
                    echo "<td>" . $food['Gia'] . "</td>";
                    echo "<td>" . $food['LoaiMonAn'] . "</td>";
                    echo "<td><img src='./Dish/" . $food['HinhAnh'] . ".png' width='100' height='100'></td>";
                    echo "<td>
                            <a href='../View/EditFood.php?foodId=" . $food['IDMonAn'] . "' class='btn btn-sm btn-primary edit-btn'>
                                <i class='fas fa-edit'></i> Chỉnh sửa
                            </a>

                            <a href='../View/delete_food.php?foodId=" . $food['IDMonAn'] . "' class='btn btn-sm btn-danger delete-btn' onclick='return confirm(\"Bạn có chắc chắn muốn xóa món ăn này không?\");'>
                            <i class='fas fa-trash-alt'></i> Xóa
                            </a>

                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>  

        <!-- Xử lý bộ lọc loại món ăn -->             
        <script>
        // Xử lý sự kiện khi dropdown bộ lọc loại món ăn thay đổi
        $('#filterLoaiMonAn').change(function () {
            var selectedCategory = $(this).val();

            // Lọc dữ liệu dựa trên loại món ăn được chọn
            var filteredFoods = <?php echo json_encode($foods); ?>.filter(function (food) {
                return selectedCategory === '' || food['LoaiMonAn'] === selectedCategory;
            });

            // Hiển thị kết quả lọc trên bảng
            displaySearchResult(filteredFoods);
        });

        function displaySearchResult(result) {
            var tableBody = $('tbody');

            // Xóa nội dung cũ trong bảng
            tableBody.empty();

            // Hiển thị các món ăn đã được lọc
            result.forEach(function (food) {
                var row = '<tr>' +
                    '<td>' + food['IDMonAn'] + '</td>' +
                    '<td>' + food['TenMonAn'] + '</td>' +
                    '<td>' + food['MoTa'] + '</td>' +
                    '<td>' + food['Gia'] + '</td>' +
                    '<td>' + food['LoaiMonAn'] + '</td>' +
                    '<td><img src="./Dish/' + food['HinhAnh'] + '.png" width="100" height="100"></td>' +
                    '<td>' +
                    '<a href="../View/EditFood.php?foodId=' + food['IDMonAn'] + '" class="btn btn-sm btn-primary edit-btn">' +
                    '<i class="fas fa-edit"></i> Chỉnh sửa</a>' +
                    '<a href="#" class="btn btn-sm btn-danger delete-btn" data-foodid="' + food['IDMonAn'] + '">' +
                    '<i class="fas fa-trash-alt"></i> Xóa</a>' +
                    '</td>' +
                    '</tr>';
                tableBody.append(row);
            });
        }


        </script>
        
</main>


</body>


</html>