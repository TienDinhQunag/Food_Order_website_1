<?php
include(__DIR__ . '/../config/database.php');

class FoodModel {
    private $db;

    // Hàm lấy danh sách món ăn
    public function getAllFoods() {
        global $conn;
        $sql = "SELECT IDMonAn, TenMonAn, MoTa, Gia, LoaiMonAn, HinhAnh FROM MonAn";
        $result = $conn->query($sql);
        $foods = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $foods[] = $row;
            }
        }
        return $foods;
    }
    public function searchFoods($searchTerm) {
        global $conn;

        $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

        $sql = "SELECT IDMonAn, TenMonAn, MoTa, Gia, LoaiMonAn, HinhAnh FROM MonAn
                WHERE TenMonAn LIKE '%$searchTerm%'";
                
        $result = $conn->query($sql);

        $foods = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $foods[] = $row;
            }
        }

        return $foods;
    }


    // Thêm mới món ăn
    // Viết hàm thêm món ăn tại đây
    // Thêm mới món ăn
        public function addNewFood($tenMonAn, $moTa, $gia, $loaiMonAn, $hinhAnh) {
            global $conn;

            $tenMonAn = mysqli_real_escape_string($conn, $tenMonAn);
            $moTa = mysqli_real_escape_string($conn, $moTa);
            $loaiMonAn = mysqli_real_escape_string($conn, $loaiMonAn);
            $hinhAnh = mysqli_real_escape_string($conn, $hinhAnh);

            // Thực hiện việc thêm mới món ăn vào cơ sở dữ liệu
            $sql = "INSERT INTO MonAn (TenMonAn, MoTa, Gia, LoaiMonAn, HinhAnh) VALUES ('$tenMonAn', '$moTa', $gia, '$loaiMonAn', '$hinhAnh')";
            $result = $conn->query($sql);

            if (!$result) {
                echo "Lỗi: " . $conn->error;
            }
        }

        public function getFoodById($foodId) {
            global $conn;
            $sql = "SELECT * FROM MonAn WHERE IDMonAn = $foodId";
            $result = $conn->query($sql);
            return $result->fetch_assoc();
        }
        
        
        public function editFood($foodId, $tenMonAn, $moTa, $gia, $loaiMonAn, $hinhAnh) {
            global $conn;
    
            $tenMonAn = mysqli_real_escape_string($conn, $tenMonAn);
            $moTa = mysqli_real_escape_string($conn, $moTa);
            $loaiMonAn = mysqli_real_escape_string($conn, $loaiMonAn);
            $hinhAnh = mysqli_real_escape_string($conn, $hinhAnh);
    
            // Update the food information in the database
            $sql = "UPDATE MonAn SET 
                    TenMonAn = '$tenMonAn', 
                    MoTa = '$moTa', 
                    Gia = " . ($gia !== '' ? $gia : 'NULL') . ", 
                    LoaiMonAn = '$loaiMonAn', 
                    HinhAnh = '$hinhAnh' 
                    WHERE IDMonAn = $foodId";
    
            $result = $conn->query($sql);
    
            if (!$result) {
                echo "Lỗi: " . $conn->error;
            }
        }

        public function deleteFood($foodId) {
            global $conn;
        
            // Xóa các bản ghi trong chitietdonhang tham chiếu đến MonAn
            $sqlDeleteChiTietDonHang = "DELETE FROM chitietdonhang WHERE IDMonAn = $foodId";
            $resultDeleteChiTietDonHang = $conn->query($sqlDeleteChiTietDonHang);
        
            if ($resultDeleteChiTietDonHang) {
                // Xóa món ăn từ bảng MonAn
                $sqlDeleteFood = "DELETE FROM MonAn WHERE IDMonAn = $foodId";
                $resultDeleteFood = $conn->query($sqlDeleteFood);
        
                if ($resultDeleteFood) {
                    // Trả về true nếu xóa thành công
                    return true;
                } else {
                    // Xử lý lỗi khi xóa món ăn
                    error_log("Lỗi khi xóa món ăn: " . $conn->error);
                    return false;
                }
            } else {
                // Xử lý lỗi khi xóa chitietdonhang
                error_log("Lỗi khi xóa chitietdonhang: " . $conn->error);
                return false;
            }
        }
        
        
     


}
?>