<?php  session_start(); // Mở phiên session 
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="bone.css">

    </head>
    <!-- header -->
    <div class="header">
        <div class="contact-info">
            968 - 489 - 040   |   Brocell@gmail.com
        </div>  
        <div class="social-icons">
              <img src="./Image/facebook1.png" alt="Facebook">
              <img src="./Image/insta.png" alt="Instagram">
              <img src="./image/twitter1.png" alt="Twitter">
        </div>  
        </div>       
    </div>
    <!-- menu -->
    <body>
        
    <div class="menu-section">
        <div class="flex-header-container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="brand-logo">
                    <img src="./Image/brandlogo.png" alt="Brand Logo" height="70px" width="70px">
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto" id="menuItems">
                        <li class="nav-item active">
                            <a class="nav-link menu-item" href="Mainpage.php">Home</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="MenuPage.php">Menu</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="Promotion.php">Promotion</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="GT.php">About Us</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link menu-item" href="#">Blog</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php                
                        if (isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item"><a class="nav-link menu-item" href="profile.php">Profile</a></li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            echo '<li class="nav-item"><a class="nav-link menu-item" href="../Controller/logout.php">Log out</a></li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        ?>                  
                    </ul>
                </div>  
                
                <div class="search-login">
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <div class="cart-icon">
                            <a href="cart_view.php" style="text-decoration: none;">
                                <img src="./Image/cart.png" alt="Cart" style="width: 28px; height: 30px;">
                            </a>
                            </div>
                        <?php endif; ?>

                        <div class="search-icon" onclick="toggleSearchBox()">
                            <img src="../View/Image/logosearch.png" alt="Search">
                        </div>

                        <script>
                            function redirectToLogin() {
                                // Check if the user is not in a session
                                <?php if (!isset($_SESSION['user_id'])) : ?>
                                    // If not in a session, redirect to login.php
                                    window.location.href = 'Sign-In.php';
                                <?php endif; ?>
                            }
                        </script>

                        <?php                
                            if (isset($_SESSION['user_id'])) {
                                // If the user is logged in, hide the login button
                                echo '<button class="login-button" style="display: none;">Login</button>';
                            } else {
                                // If the user is not logged in, show the login button
                                echo '<button class="login-button" onclick="redirectToLogin()">Login</button>';
                            }
                        ?>

                        <div class="search-box" id="searchBox">
                            <input type="text" id="searchInput" placeholder="Search...">
                        </div>
                    </div>


            </nav>
                            

        </div>
    </div>

    <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./Image/bannernew/banner1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./Image/bannernew/banner2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./Image/bannernew/banner3.png" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./Image/bannernew/banner4.png" alt="Fourth slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./Image/bannernew/banner5.png" alt="Fifth slide">
    </div>
    </div>
  <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div> 
    </div>

    <script>
        function redirectToMenuPage() {
            var searchInput = document.getElementById('searchInput');
            var keyword = searchInput.value.trim();

            if (keyword !== '') {            
                localStorage.setItem('searchKeyword', keyword);          
                window.location.href = 'Menupage.php?page=1&keyword=' + encodeURIComponent(keyword);
            }
        }
    // Function để lưu từ khóa vào Local Storage
        function saveKeywordToStorage(keyword) {
            localStorage.setItem('searchKeyword', keyword);
        }
        // Function để xử lý sự kiện khi nhấn enter trong ô tìm kiếm
        function handleEnterKeyPress(event) {
            if (event.key === 'Enter') {
                var searchInput = document.getElementById('searchInput');
                var keyword = searchInput.value.trim();

                if (keyword !== '') {
                    // Lưu từ khóa vào Local Storage
                    saveKeywordToStorage(keyword);

                    // Gọi hàm tìm kiếm hoặc chuyển hướng đến trang tìm kiếm
                    // Ở đây tôi giả sử bạn muốn gọi hàm toggleSearchBox khi nhấn enter
                    toggleSearchBox();
                    redirectToMenuPage();
                }
            }
        }
        // Thêm sự kiện lắng nghe khi nhấn phím enter trong ô tìm kiếm
        document.getElementById('searchInput').addEventListener('keyup', handleEnterKeyPress);
    </script>

    <script>
        function toggleSearchBox() {
            var searchBox = document.getElementById('searchBox');
            searchBox.classList.toggle('active');
    
            var searchInput = document.getElementById('searchInput');
            if (searchBox.classList.contains('active')) {
                // Focus on the search input when the search box is active
                searchInput.focus();
                // Add a click event listener to the document body to close the search box if the user clicks outside of it
                document.body.addEventListener('click', closeSearchBox);
            } else {
                // Remove the click event listener when the search box is not active
                document.body.removeEventListener('click', closeSearchBox);
            }
        }
        function closeSearchBox(event) {
            var searchBox = document.getElementById('searchBox');
            var searchIcon = document.querySelector('.search-icon');
            // Check if the clicked element is not the search box or the search icon
            if (!searchBox.contains(event.target) && !searchIcon.contains(event.target)) {
                // If the click is outside the search box, hide it
                searchBox.classList.remove('active');
                // Remove the click event listener
                document.body.removeEventListener('click', closeSearchBox);
            }
        }
    </script>      
     
    <!-- Signup Section -->
    <!-- Footer -->

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
