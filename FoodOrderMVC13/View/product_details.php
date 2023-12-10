
<?php
include '../Model/Database.php';
include '../Model/ProductModel.php';
include '../Controller/ProductController.php';

$database = new Database();
$productModel = new ProductModel($database);
$productController = new ProductController($productModel);

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $productController->getProductDetails($productId);
} else {
    // Handle the case when no product ID is provided
    echo "Invalid product ID";
}
