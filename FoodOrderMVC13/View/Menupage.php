<?php
include "Bone.php"


?>


<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="UTF-8">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="bone.css">
  
   <style>
    #bannerCarousel{
    display:none;
}
       .flex-container {


           margin: auto;
       }
       .signup-section{
           max-width: 1400px;
           margin: auto;
       }


       .flex-container  {
       display: flex;
       flex-wrap: wrap;
       max-width: 1400px;
       }


       .filter {
           flex: 30%;
           border: 1px solid #ccc;
           padding: 40px;
           box-sizing: border-box;
           order: -1; /* Đưa nó lên trước */
           font-size: 18px; /* Điều chỉnh kích thước chữ theo mong muốn */
           border: none;
       }




       .display-category {
           flex: 70%;
           padding: 40px;
           background-color: ;
           box-sizing: border-box; /* Include padding in the width calculation */
       }
       /* ... your existing styles ... */
   @media (max-width: 768px) {
       .flex-container {
           flex-direction: column; /* Stack items vertically on smaller screens */
       }


       .filter, .display-category {
           flex: 100%; /* Take up full width on smaller screens */
       }
   }


       .signup-section {
           background-color: #87CEEB;
           color: white;
           text-align: center;
           padding: 50px 0;
        
       }


       .footer-section {
           background-color: #696969;
           color: white;
           text-align: center;
           padding: 50px 0;
       }


       .pagination {
       display: flex;
       justify-content: center;
       margin-top: 20px;
       }


       .pagination a {
       color: black;
       padding: 8px 16px;
       text-decoration: none;
       justify-content: center;
       border: 2px solid #ffc0cb;
       margin: 0 4px;
       border-radius: 4px;
       width: 45px;
       align-items: center;
       }


       .pagination a:hover {
       background-color: #faf2f9;
       color: black;
       }


       .pagination .active {
       background-color: #007bff;
       color: black;
       }


       /* Default styles for larger screens */
       .card {
           width: 300px;
           height: 350px;
           background-color: white;         

       }
       .card img {
       width: 100%;
       height: 75%;
       object-fit: cover; /* Maintain aspect ratio and cover the container */
       }
       .card-title {
       font-size: 18px ; /* Adjust the font size to your preference */
       margin-top: -12px;
       text-align: center;
       text-decoration: none;
       color: black;
       }
       .card:hover {
      transform: scale(1.05); /* Kích thước tăng lên khi hover */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Đổ bóng khi hover */
  }
       .card-text{
       font-size: 16px ;
       margin-top: -10px;
       text-align: center;
       text-decoration: none;
       color: red;
       padding: 3px;
       }
      /* Adjust styles for medium screens */
       @media (max-width: 767px) {
           .card {
               width: 110px;
               height: 190px;
              
           }
           .card-title {
       font-size: 9px; /* Adjust the font size to your preference */
       margin-top: -8px;
       padding: 2px;
   }
   .card-text{
       font-size: 8px ;
       margin-top: -12px;
       padding: 2px;
     
   }
       }


  
   @media (max-width: 768px) {
       .filter {
           flex: 100%; /* Take up full width on smaller screens */
           order: -1; /* Change the order to move it to the top */
           padding: 10px; /* Adjust padding for better mobile view */
       }


       .Producttype {
           margin-top: 20px; /* Add some margin for better spacing */
       }
       .row{
           margin-right: -15px;
           margin-left: -35px;
       }
   }




   </style>
   <title>MenuPage</title>
</head>


<body>




<!-- Container Main Section -->
<div class="flex-container">
   <div class="display-category">
           <?php
           include('../Controller/pagination.php');


           ?>
   </div>
   <div class="filter">
   <div class="Producttypde">
   <h4>Filter by Food Category</h4>
   <?php foreach ($foodCategories as $category): ?>
       <?php
       // Check if the category is selected in the URL parameters
       $isChecked = in_array($category, $_GET['categories'] ?? []);
       ?>
       <div class="form-check">
           <input type="checkbox" class="form-check-input category-checkbox" id="<?= $category ?>" value="<?= $category ?>" <?= $isChecked ? 'checked' : '' ?>>
           <label class="form-check-label" for="<?= $category ?>"><?= $category ?></label>
       </div>
   <?php endforeach; ?>
</div>


   </div>


</div>


<script>




function loadFoodItems(page, keyword, categories) {
   $.ajax({
       url: '../Controller/pagination.php',
       type: 'GET',
       data: { page: page, keyword: keyword, categories: categories },
       success: function (data) {
           $('.display-category').html(data);
       },
       error: function (error) {
           console.error('Error loading food items:', error);
       }
   });
}
$(document).on('change', '.category-checkbox', function () {
   var selectedCategories = $('.category-checkbox:checked').map(function () {
       return this.value;
   }).get();


   // Set the keyword to an empty string when a checkbox is checked
   var keyword = "";


   // Clear the search input value
   $('#searchInput').val(keyword);


   // Get the current URL without the query parameters
   var baseUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;


   // Build the new URL with updated parameters
   var newUrl = baseUrl + '?page=1&keyword=' + encodeURIComponent(keyword) + '&categories[]=' + selectedCategories.join('&categories[]=');


   // Update the browser URL without reloading the page
   history.pushState(null, null, newUrl);


   // Load food items with updated parameters
   loadFoodItems(1, keyword, selectedCategories);
});
// Add event listener for checkbox changes
$(document).on('change', '.category-checkbox', function () {
   var selectedCategories = $('.category-checkbox:checked').map(function () {
       return this.value;
   }).get();


   // Set the keyword to an empty string when a checkbox is checked
   var keyword = "";


   // Get the current URL without the query parameters
   var baseUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;


   // Build the new URL with updated parameters
   var newUrl = baseUrl + '?page=1&keyword=' + encodeURIComponent(keyword) + '&categories[]=' + selectedCategories.join('&categories[]=');


   // Update the browser URL without reloading the page
   history.pushState(null, null, newUrl);


   loadFoodItems(1, keyword, selectedCategories);
});


$(document).on('click', '.pagination a', function (e) {
   e.preventDefault();
   var page = $(this).attr('href').split('=')[1];
   var keyword = $('#searchInput').val(); // Get the search keyword
   var selectedCategories = $('.category-checkbox:checked').map(function () {
       return this.value;
   }).get();
   loadFoodItems(page, keyword, selectedCategories);
});


// Call loadFoodItems on input change
$('#searchInput').on('input', function () {
   var keyword = $(this).val();
   var selectedCategories = $('.category-checkbox:checked').map(function () {
       return this.value;
   }).get();
   loadFoodItems(1, keyword, selectedCategories);
});






</script>




<script>
   // ... (Các hàm khác ở đây)


   // Function để lấy từ khóa từ URL
   function getKeywordFromURL() {
       var urlParams = new URLSearchParams(window.location.search);
       return urlParams.get('keyword') || '';
   }


   // Function để thiết lập giá trị từ khóa trong ô tìm kiếm
   function setKeywordInSearchBox() {
       var searchInput = document.getElementById('searchInput');
       searchInput.value = getKeywordFromURL();
   }


   // Thiết lập giá trị từ khóa khi trang được tải
   setKeywordInSearchBox();
   localStorage.removeItem('searchKeyword');
  
   // ... (Các xử lý sự kiện tìm kiếm khác ở đây)
</script>
<script>
       // Check if the page is being refreshed
       if (performance.navigation.type === 1) {
           // Set the keyword parameter to null
           var urlParams = new URLSearchParams(window.location.search);
           urlParams.set('keyword', "");


           // Redirect to the updated URL
           var newUrl = window.location.pathname + '?' + urlParams.toString();
           window.location.href = newUrl;
       }
</script>
















</body>


</html>







