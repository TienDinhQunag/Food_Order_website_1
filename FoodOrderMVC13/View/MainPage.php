<?php
include "Bone.php";
// Gọi file database.php

include "../Controller/MainpageController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bone.css">
    <style>
  

        .signup-section, .popular-categories-section, .super-delicious-section,.blog-section, .curated-collections-section{
            max-width: 1200px;
            margin: auto;
            background-color: white;
            
            
        }
        .signup-section {
            background-color: #f4d3e2; /* Light Sky Blue */
            color: white;
            text-align: center;
            padding: 50px 0;
        }
        /* Additional styles for the Sign Up Container */
        .signup-container {
            display: flex;
            justify-content: space-between;
            max-width: px; /* Adjust the width as needed */
            margin: auto;
            
        }

        .flex-signup-container{
            margin: 10px 300px;
            display: flex;
        }

        @media (max-width: 767px) {
    .flex-signup-container {
        flex-direction: column;
        align-items: center;
        margin: 10px; /* Điều chỉnh margin theo ý của bạn */
    }

    .signup-form {
        margin-bottom: 10px; /* Khoảng cách giữa input và nút sign up */
    }
}


        .signup-form {
            width: 100%;
            display: flex;       
        }

        .signup-form input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            height:83px;
            
        }

        .signup-button {
            width: 30%;
            
            
        }

        .signup-button button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #ff69b4;  /* Adjust the color as needed */
            color: #fff;
            cursor: pointer;
            height: 83px;
        }




        .popular-categories-section {
           
            color: black;
            text-align: center;
            padding: 50px 0;
        }

        .super-delicious-section {
            background-color: #faf2f9; 
            color: black;
            text-align: center;
            padding: 50px 0;
        }



        .blog-section {
            background-color: #FF6347; /* Tomato */
            color: white;
            text-align: center;
            padding: 50px 0;
        }

        .curated-collections-section {
            background-color: #8A2BE2; /* Blue Violet */
            color: white;
            text-align: center;
            padding: 50px 0;
        }
        .card-body{
            margin-top:-30px

        }
        .card a {
            text-decoration: none;
        }
        /* Default styles for larger screens */
        .card {
            width: 300px;
            height: 350px;
            background-color: #f4d3e2;
           
        }

        .card img {
        width: 100%;
        height: 75%;
        object-fit: cover; 
    }
        .card-title {
        font-size: 23px ;
        margin-top: -8px;
    }
    .card-text{
        font-size: 20px ;
        margin-top: -4px;
    }
       /* Adjust styles for medium screens */
        @media (max-width: 767px) {
            .card {
                width: 180px;
                height: 210px;
                
            }
            .card-title {
        font-size: 13px; 
        margin-top: -8px;
    }
    .card-text{
        font-size: 11px ;
       margin-top: -4px;
       
    }
        }

   


    </style>
    <title>MainPage</title>
</head>

<body>

   
            
<!-- Signup Section -->
<div class="signup-section">
        <form class="flex-signup-container" action="sign-up.php" method="post">
                    <div class="signup-form">
                        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number">
                    </div>
                    <div class="signup-button">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
</div>


  


<!-- Popular Categories Section -->
<div class="popular-categories-section">
    <div class="popular-categories-container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-left">Popular Categories</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <?php
                    foreach ($result as $row) {
                        $categoryName = $row['LoaiMonAn'];
                        $imagePath = "../Popular-categories/{$categoryName}.jpg";
                        
                        // Create a link to the MenuPage with the category as a parameter
                        echo '<div class="col-6 col-md-2" col-lg-2>';
                        echo '<div class="text-center">';
                        echo '<a href="MenuPage.php?page=1&keyword=&categories[]=' . urlencode($categoryName) . '" style="text-decoration: none;">'; 
                        echo '<img src="' . $imagePath . '" alt="' . $categoryName . '" class="rounded-circle" style="width: 150px; height: 150px;">';
                        
                        echo '<p style="color: black; font-size: 18px;">' . $categoryName . '</p>';
                        
                        echo '</a>';
                        echo '</div>';
                        echo '</div>';
                    }

            ?>
        </div>
    </div>
</div>





<!-- Super Delicious Section -->
<div class="super-delicious-section">
    <div class="super-delicious-container">
        <h2 class="text-left">Super Delicious</h2>
        <div class="row">
            <?php


foreach ($resultTopSellingItems as $row) {
    $itemID = $row['IDMONAN'];
    $itemName = $row['TenMonAn'];
    $itemPrice = $row['Gia'];
    $imageName_1 = $row['HinhAnh'];

    $imageName = strtolower(str_replace(" ", "", $imageName_1));
    $imagePath = "Dish/{$imageName}.png";

    // Display the top-selling item using Bootstrap card
    echo '<div class="col-6 col-md-6 col-lg-4 mt-3">';
    echo '<div class="card">';
    
    // Add text-decoration: none; to the anchor tag
    echo '<a href="product_details.php?id=' . $itemID . '" style="text-decoration: none;">';
    
    echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $itemName . '">';
    echo '<div class="card-body">';
    
    // Add color to the price
    echo '<p class="card-text" style="color: red;">$' . $itemPrice . '</p>';
    
    // Add color to the item name
    echo '<h5 class="card-title" style="color: black;">' . $itemName . '</h5>';
    
    echo '</div>';
    echo '</a>';
    echo '</div>';
    echo '</div>';
}



            ?>
        </div>
    </div>
</div>


<?php 

include "footer.php"
?>

  

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>