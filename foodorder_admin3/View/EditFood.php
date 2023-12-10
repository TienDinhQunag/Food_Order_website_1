<?php
include('../Controller/FoodController.php');

$foodController = new FoodController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnEdit'])) {
    $foodController->editFood();
}

if (isset($_GET['foodId'])) {
    $foodId = $_GET['foodId'];
    $food = $foodController->getFoodById($foodId); // Implement this method in FoodController
}

include('EditFoodView.php');
?>
