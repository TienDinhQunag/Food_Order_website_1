<?php
include('../Model/FoodModel.php');

class FoodController {
    private $model;

    public function __construct() {
        $this->model = new FoodModel();
    }

    public function showAllFoods() {
        $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
        
        // If search term is provided, filter the results
        if (!empty($searchTerm)) {
            $foods = $this->model->searchFoods($searchTerm);
        } else {
            // Otherwise, get all foods
            $foods = $this->model->getAllFoods();
        }
        
        include('../View/Food.php');
    }

    // Các hàm khác như thêm, sửa, xóa món ăn cũng được định nghĩa ở đây

    // Thêm mới món ăn
    public function addFood() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_POST['btnadd'])) {
            $tenMonAn = $_POST['tenMonAn'];
            $moTa = $_POST['moTa'];
            $gia = $_POST['Gia'];
            $loaiMonAn = $_POST['LoaiMonAn'];
            $hinhAnh = $_POST['hinhAnh']; // Đây là phần xử lý file hình ảnh nếu cần thiết
    
            // Tiếp theo, gọi hàm trong FoodModel.php để thêm dữ liệu vào cơ sở dữ liệu
            $this->model->addNewFood($tenMonAn, $moTa, $gia, $loaiMonAn, $hinhAnh);
    
            // Sau khi thêm mới, chuyển hướng về trang danh sách món ăn
            header("Location: ../View/Food.php");
            exit();
        }
    }


    public function getFoodById($foodId) {
        return $this->model->getFoodById($foodId);
    }
    

    public function editFood() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnEdit'])) {
            $foodId = isset($_POST['editFoodId']) ? $_POST['editFoodId'] : '';
            $tenMonAn = isset($_POST['editTenMonAn']) ? $_POST['editTenMonAn'] : '';
            $moTa = isset($_POST['editMoTa']) ? $_POST['editMoTa'] : '';
            $gia = isset($_POST['editGia']) ? $_POST['editGia'] : '';
            $loaiMonAn = isset($_POST['editLoaiMonAn']) ? $_POST['editLoaiMonAn'] : '';
            $hinhAnh = isset($_POST['editHinhAnh']) ? $_POST['editHinhAnh'] : '';
    
            // Call the editFood method in FoodModel.php
            $this->model->editFood($foodId, $tenMonAn, $moTa, $gia, $loaiMonAn, $hinhAnh);
    
            // Redirect to the Food.php page after editing
            header("Location: ../View/Food.php");
            exit();
        }
    }
    public function searchFoods($searchTerm)
    {
        // Implement the logic to search for foods based on the given term
        // Return the search results as an array

        // Example:
        $foodModel = new FoodModel();
        $searchResults = $foodModel->searchFoods($searchTerm);

        return $searchResults;
    }

    public function deleteFood($foodId) {
        // Gọi hàm deleteFood từ model và nhận kết quả
        $result = $this->model->deleteFood($foodId);
    
        if ($result) {
            // Trả về true nếu xóa thành công
            return true;
        } else {
            // Trả về false nếu có lỗi xảy ra khi xóa
            return false;
        }    }    

}
?>