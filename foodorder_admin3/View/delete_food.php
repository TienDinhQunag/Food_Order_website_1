<?php
    // Include các file cần thiết và khởi tạo controller
    include_once '../Controller/FoodController.php';

    $foodController = new FoodController();

    // Kiểm tra nếu có yêu cầu xóa và gọi hàm deleteFood
    if (isset($_POST['foodId'])) {
        $foodId = $_POST['foodId'];
        $result = $foodController->deleteFood($foodId);

        if ($result) {
            echo 'success'; // Trả về kết quả thành công nếu xóa thành công
        } else {
            echo 'error'; // Trả về thông báo lỗi nếu có lỗi xảy ra khi xóa
        }
    }
?>

<?php
// Include các file cần thiết và khởi tạo controller
include_once '../Controller/FoodController.php';

$foodController = new FoodController();

// Kiểm tra nếu có tham số foodId được gửi đến
if (isset($_GET['foodId'])) {
    $foodId = $_GET['foodId'];
    $result = $foodController->deleteFood($foodId);

    if ($result) {
        // Nếu xóa thành công, chuyển hướng về trang danh sách món ăn
        header('Location: ../View/Food.php');
        exit();
    } else {
        // Xử lý lỗi nếu có
        echo 'Error occurred while deleting the food.';
    }
} else {
    // Xử lý trường hợp không có tham số foodId được gửi đến
    echo 'Invalid food ID.';
}
?>

