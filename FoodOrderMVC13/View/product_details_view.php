<?php
include "Bone.php"




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
       /* Your existing styles here */


       .product-detail-container {
   display: flex;
   justify-content: center;
   margin: 20px auto;
   background-color: white;
   padding: 20px;
   border-radius: 10px;
}


.product-detail-container .row {
   display: flex;
   align-items: stretch; /* Make columns equal in height */
}


.product-image,
.product-info {
   flex: 1;
   box-sizing: border-box;
   border: none;
}


       .product-image,
       .product-info {
           flex: 1 0 48%;
           box-sizing: border-box;
       }


       .card {
           width: 100%;
           background-color: white;
          
       }


       .card img {
           width: 100%;
           height: 75%;
           object-fit: cover;
       }


       .card-title {
           font-size: 20px;
           margin-top: -8px;
       }


       .card-text {
           font-size: 20px;
           margin-top: -10px;
       }
       .card-body{
           flex: 1 1 auto;
           min-height: 1px;
           padding: 1.25rem;
          
       }
       @media (max-width: 767px) {
           .product-detail-container {
               flex-direction: column;
           }


           .product-image,
           .product-info {
               flex: 100%;
           }


           .card {
               width: 100%;
           }
       }
       .similar-products {
   text-align: center; /* Center text */
   margin-top: 20px;
   background-color: #f9e6e9;
   border-radius: 10px;
   padding: 20px;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


.similar-products h3 {
   font-size: 24px;
   color: #333;
   margin-bottom: 15px;
}
.add-to-cart-btn {
   background-color: #ff69b4; /* Pink color */
   color: white;
   padding: 10px 20px;
   border: none;
   border-radius: 5px;
   cursor: pointer;
   transition: background-color 0.3s ease;
}


.add-to-cart-btn:hover {
   background-color: #d44d8f; /* Darker pink on hover */
}
.similar-products .card:hover {
   transform: scale(1.05);
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


/* Remove underline and change text color for card text */
.similar-products .card-text {
   font-size: 16px;
   margin-top: -10px;
   text-align: center;
   text-decoration: none;
   color: red;
   padding: 3px;
   padding-top: -50;
}




/* Hover effect for card text */
.similar-products .card-text:hover {
   text-decoration: none; /* Remove underline on hover */
   color: blue; /* Change text color to blue on hover */
}
.product-info .card-body {
   display: flex;
   flex-direction: column;
   align-items: center;
   justify-content: center;
   height: 100%;
}


.product-info .card-text {
   font-size: 20px;
   margin-top: -8px;
   text-align: center;
}
   </style>
   <title>Product Detail</title>
</head>


<body>
   <!-- Product Detail Section -->
   <div class="container product-detail-container">
       <div class="row no-gutters">
           <div class="col-md-6">
               <div class="product-image">
                   <div class="card">
                       <?php foreach ($productDetails as $product): ?>
                           <img src="./Dish/<?= $product['HinhAnh'] ?>.png" alt="<?= $product['TenMonAn'] ?>">
                       <?php endforeach; ?>
                   </div>
               </div>
           </div>
           <div class="col-md-6">
               <div class="product-info">
                   <div class="card">
                       <div class="card-body">
                           <?php foreach ($productDetails as $product): ?>
                               <h2><?= $product['TenMonAn'] ?></h2>
                               <p><?= $product['MoTa'] ?></p>
                               <p>Price: <?= $product['Gia'] ?></p>
                               <p>Category: <?= $product['LoaiMonAn'] ?></p>
                               <!-- Add more details as needed -->
                           <?php endforeach; ?>
                           <div>
                               <?php foreach ($productDetails as $product): ?>
                                   <!-- ... existing code ... -->
                                   <form method="post" action="cart_handler.php">
                                       <input type="hidden" name="productId" value="<?= $product['IDMonAn'] ?>">
                                       <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                                   </form>
                               <?php endforeach; ?>
                           </div>
                           <!-- Add more product details as needed -->
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>


   <!-- Similar Products Section -->
   <div class="similar-products">
       <h3>Similar Products</h3>
       <div class="row justify-content-center">
           <?php foreach ($similarProducts as $similarProduct): ?>
               <div class="col-md-3">
                   <div class="card">
                       <a href="product_details.php?id=<?= $similarProduct['IDMonAn'] ?>">
                           <img src="./Dish/<?= $similarProduct['HinhAnh'] ?>.png" class="card-img-top"
                               alt="<?= $similarProduct['TenMonAn'] ?>">
                           <div class="card-body">
                               <h5 class="card-title"><?= $similarProduct['TenMonAn'] ?></h5>
                               <p class="card-text">Price: <?= $similarProduct['Gia'] ?></p>
                               <!-- Add more product details as needed -->
                           </div>
                       </a>
                   </div>
               </div>
           <?php endforeach; ?>
       </div>
   </div>
</body>
<?php 

include "footer.php"
?>


</html>







