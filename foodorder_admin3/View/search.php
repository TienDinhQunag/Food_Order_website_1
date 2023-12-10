
<?php
include('../Controller/FoodController.php');

$foodController = new FoodController();

$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
$foods = $foodController->searchFoods($searchTerm);

foreach ($foods as $food) {
    echo "<tr>";
    echo "<td>" . $food['IDMonAn'] . "</td>";
    echo "<td>" . $food['TenMonAn'] . "</td>";
    echo "<td>" . $food['MoTa'] . "</td>";
    echo "<td>" . $food['Gia'] . "</td>";
    echo "<td>" . $food['LoaiMonAn'] . "</td>";
    echo "<td><img src='" . $food['HinhAnh'] . "' width='100' height='100'></td>";
    echo "<td>
            <a href='../View/EditFood.php?foodId=" . $food['IDMonAn'] . "' class='btn btn-sm btn-primary edit-btn'>
                <i class='fas fa-edit'></i> Chỉnh sửa
            </a>
            <a href='#' class='btn btn-sm btn-danger delete-btn' data-foodid='" . $food['IDMonAn'] . "'>
                <i class='fas fa-trash-alt'></i> Xóa
            </a>
        </td>";
    echo "</tr>";
}
?>
