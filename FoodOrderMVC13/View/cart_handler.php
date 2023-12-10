<?php
session_start();

include '../Model/Database.php';
include '../Model/ProductModel.php';
include '../Controller/ProductController.php';

$database = new Database();
$productModel = new ProductModel($database);
$productController = new ProductController($productModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $productController->addToCart($productId);
    
    header("Location: menupage.php");
    exit(); // Ensure that no further code is executed after the redirect
}
