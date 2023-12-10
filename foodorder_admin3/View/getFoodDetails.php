<?php
include('../Controller/FoodController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['foodId'])) {
    $foodController = new FoodController();
    $foodId = (int)$_POST['foodId'];
    $foodDetails = $foodController->getFoodDetailsById($foodId);
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($foodDetails);
    exit();
}
?>
