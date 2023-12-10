<?php
include('../Controller/FoodController.php');

// Instantiate the FoodController
$foodController = new FoodController();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnadd'])) {
    // Call the addFood method to handle the form submission
    $foodController->addFood();
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnEdit'])) {
    // Call the editFood method to handle the form submission
    $foodController->editFood();
}

// Display the list of foods
$foodController->showAllFoods();

?>
