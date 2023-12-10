<?php include "bone.php"?>

<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bone.css">
    <link rel="stylesheet" href="Bone.php">
    <title>Giới thiệu Hệ thống</title>

</head>
<style>
#bannerCarousel{
    display:none;
}
body {
    font-family: 'Poppins';
    background-color: #faf2f9;
    padding: 0;
}

.container {
    text-align: center; /* Căn giữa theo chiều ngang */
    width: 80%;
    margin: 0 auto;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

.content {
    padding: 20px 0;
}

.banner {
    text-align: center;
    margin-top: 10px;
    overflow: hidden;
}

.banner img {
    max-width: 100%;
    height: auto;
    animation: slideBanner 10s linear infinite;
}
body {
    font-family: 'Poppins';
    background-color: #faf2f9;
    padding: 0;
}

.header {
    background-color: #ff68b4;
    padding: 10px;
    height: 45px;
    color: rgb(54, 52, 52);
    display: flex;
    justify-content: space-between
}
.contact-info p {
    display: flex;
    margin-right: 10px; /* Khoảng cách giữa Phone number và Email */
    font-size: 12px;
    align-items: center;
  }
  @media (max-width: 767px) {
    .contact-info {
        font-size: 9px; /* Điều chỉnh kích thước font cho màn hình nhỏ hơn 767px */
    }
}
.logo-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height:30px;
}

.brand-logo img {
    height: 70px; /* Adjust the height as needed */
    width: auto;
    display: block;
}

.social-icons {
    display: flex;
    gap: 10px; /* Adjust the gap as needed */
    align-items: center; /* Align items vertically centered */
    padding: 5px 10px;
}

.social-icons img {
    width: 25px; /* Set your desired width */
    height: 25px; /* Set your desired height */
}

.search-login {
    display: flex;
    align-items: center;
}

.cart-icon {
    margin-left: 10px; 
    cursor: pointer;
}

.cart-icon img {
    width: 40px; 
    height: 40px; 
}
.login-button {
    background-color: #ff68b4;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.login-button:hover {
    background: #3e4348;
  }
.search-icon {
    cursor: pointer;
}

.search-box {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    width: 200px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.search-icon img {
    width: 30px; /* Set your desired width */
    height: 30px; /* Set your desired height */
    margin-right: 10px;
}

.search-box input {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
}

.search-box.active {
    display: block;
    z-index: 1000;
}
.menu-section {
    background-color: white; /* Light green color */
    color: black;
    text-align: center;
    padding: 0;
    margin: auto;
    display: flex;
    justify-content: space-between
}

.menu-item {
    margin: 0 40px;
}

.menu-toggle-text {
    display: none; /* Ẩn ban đầu */
}

@media (max-width: 768px) {
    .menu-toggle-text {
        display: block; /* Hiển thị khi kích thước màn hình nhỏ hơn hoặc bằng 768px */
        text-align: center; /* Căn giữa dòng chữ */
        font-weight: bold; /* In đậm chữ */
        
        margin: auto;
        font-size: 40px;
    }
}

.carousel-item img { 
    height: auto;  
    width: 70%; /* Set the width to 70% of the container width */
    display: block; /* Make the image a block element for centering */
    margin: 0 auto; /* Auto margin horizontally centers the image */
    padding: 40;
    padding-left: 50;
    padding-right: 50;
}

.flex-container {
    display: flex;
    flex-wrap: wrap;
}

.footer-section {
    background-color: #696969; /* Dim Gray */
    color: white;
    text-align: center;
    padding: 50px 0;
}

.container {
    display: flex;
}

body {
    font-family: 'Poppins';
    background-color: #faf2f9;
    padding: 0;
}

.header {
    background-color: #ff68b4;
    padding: 10px;
    height: 45px;
    color: rgb(54, 52, 52);
    display: flex;
    justify-content: space-between
}
.contact-info p {
    display: flex;
    margin-right: 10px; /* Khoảng cách giữa Phone number và Email */
    font-size: 12px;
    align-items: center;
  }
  @media (max-width: 767px) {
    .contact-info {
        font-size: 9px; /* Điều chỉnh kích thước font cho màn hình nhỏ hơn 767px */
    }
}
.logo-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height:30px;
}

.brand-logo img {
    height: 70px; /* Adjust the height as needed */
    width: auto;
    display: block;
}

.social-icons {
    display: flex;
    gap: 10px; /* Adjust the gap as needed */
    align-items: center; /* Align items vertically centered */
    padding: 5px 10px;
}

.social-icons img {
    width: 25px; /* Set your desired width */
    height: 25px; /* Set your desired height */
}

.search-login {
    display: flex;
    align-items: center;
}

.cart-icon {
    margin-left: 10px; 
    cursor: pointer;
}

.cart-icon img {
    width: 40px; 
    height: 40px; 
}
.login-button {
    background-color: #ff68b4;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.login-button:hover {
    background: #3e4348;
  }
.search-icon {
    cursor: pointer;
}

.search-box {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    width: 200px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.search-icon img {
    width: 30px; /* Set your desired width */
    height: 30px; /* Set your desired height */
    margin-right: 10px;
}

.search-box input {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
}

.search-box.active {
    display: block;
    z-index: 1000;
}
.menu-section {
    background-color: white; /* Light green color */
    color: black;
    text-align: center;
    padding: 0;
    margin: auto;
    display: flex;
    justify-content: space-between
}

.menu-item {
    margin: 0 40px;
}

.menu-toggle-text {
    display: none; /* Ẩn ban đầu */
}

@media (max-width: 768px) {
    .menu-toggle-text {
        display: block; /* Hiển thị khi kích thước màn hình nhỏ hơn hoặc bằng 768px */
        text-align: center; /* Căn giữa dòng chữ */
        font-weight: bold; /* In đậm chữ */
        
        margin: auto;
        font-size: 40px;
    }
}

.carousel-item img { 
    height: auto;  
    width: 70%; /* Set the width to 70% of the container width */
    display: block; /* Make the image a block element for centering */
    margin: 0 auto; /* Auto margin horizontally centers the image */
    padding: 40;
    padding-left: 50;
    padding-right: 50;
}

.flex-container {
    display: flex;
    flex-wrap: wrap;
}

.footer-section {
    background-color: #696969; /* Dim Gray */
    color: white;
    text-align: center;
    padding: 50px 0;
}

.container {
    display: flex;
}

body {
    font-family: 'Poppins';
    background-color: #faf2f9;
    padding: 0;
}

.header {
    background-color: #ff68b4;
    padding: 10px;
    height: 45px;
    color: rgb(54, 52, 52);
    display: flex;
    justify-content: space-between
}
.contact-info p {
    display: flex;
    margin-right: 10px; /* Khoảng cách giữa Phone number và Email */
    font-size: 12px;
    align-items: center;
  }
  @media (max-width: 767px) {
    .contact-info {
        font-size: 9px; /* Điều chỉnh kích thước font cho màn hình nhỏ hơn 767px */
    }
}
.logo-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height:30px;
}

.brand-logo img {
    height: 70px; /* Adjust the height as needed */
    width: auto;
    display: block;
}

.social-icons {
    display: flex;
    gap: 10px; /* Adjust the gap as needed */
    align-items: center; /* Align items vertically centered */
    padding: 5px 10px;
}

.social-icons img {
    width: 25px; /* Set your desired width */
    height: 25px; /* Set your desired height */
}

.search-login {
    display: flex;
    align-items: center;
}

.cart-icon {
    margin-left: 10px; 
    cursor: pointer;
}

.cart-icon img {
    width: 40px; 
    height: 40px; 
}
.login-button {
    background-color: #ff68b4;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.login-button:hover {
    background: #3e4348;
  }
.search-icon {
    cursor: pointer;
}

.search-box {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    width: 200px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.search-icon img {
    width: 30px; /* Set your desired width */
    height: 30px; /* Set your desired height */
    margin-right: 10px;
}

.search-box input {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
}

.search-box.active {
    display: block;
    z-index: 1000;
}
.menu-section {
    background-color: white; /* Light green color */
    color: black;
    text-align: center;
    padding: 0;
    margin: auto;
    display: flex;
    justify-content: space-between
}

.menu-item {
    margin: 0 40px;
}

.menu-toggle-text {
    display: none; /* Ẩn ban đầu */
}

@media (max-width: 768px) {
    .menu-toggle-text {
        display: block; /* Hiển thị khi kích thước màn hình nhỏ hơn hoặc bằng 768px */
        text-align: center; /* Căn giữa dòng chữ */
        font-weight: bold; /* In đậm chữ */
        
        margin: auto;
        font-size: 40px;
    }
}

.carousel-item img { 
    height: auto;  
    width: 70%; /* Set the width to 70% of the container width */
    display: block; /* Make the image a block element for centering */
    margin: 0 auto; /* Auto margin horizontally centers the image */
    padding: 40;
    padding-left: 50;
    padding-right: 50;
}

.flex-container {
    display: flex;
    flex-wrap: wrap;
}

.footer-section {
    background-color: #696969; /* Dim Gray */
    color: white;
    text-align: center;
    padding: 50px 0;
}

.container {
    display: flex;
}

body {
    font-family: 'Poppins';
    background-color: #faf2f9;
    padding: 0;
}

.header {
    background-color: #ff68b4;
    padding: 10px;
    height: 45px;
    color: rgb(54, 52, 52);
    display: flex;
    justify-content: space-between
}
.contact-info p {
    display: flex;
    margin-right: 10px; /* Khoảng cách giữa Phone number và Email */
    font-size: 12px;
    align-items: center;
  }
  @media (max-width: 767px) {
    .contact-info {
        font-size: 9px; /* Điều chỉnh kích thước font cho màn hình nhỏ hơn 767px */
    }
}
.logo-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height:30px;
}

.brand-logo img {
    height: 70px; /* Adjust the height as needed */
    width: auto;
    display: block;
}

.social-icons {
    display: flex;
    gap: 10px; /* Adjust the gap as needed */
    align-items: center; /* Align items vertically centered */
    padding: 5px 10px;
}

.social-icons img {
    width: 25px; /* Set your desired width */
    height: 25px; /* Set your desired height */
}

.search-login {
    display: flex;
    align-items: center;
}

.cart-icon {
    margin-left: 10px; 
    cursor: pointer;
}

.cart-icon img {
    width: 40px; 
    height: 40px; 
}
.login-button {
    background-color: #ff68b4;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.login-button:hover {
    background: #3e4348;
  }
.search-icon {
    cursor: pointer;
}

.search-box {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    border: 1px solid #ccc;
    padding: 10px;
    width: 200px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.search-icon img {
    width: 30px; /* Set your desired width */
    height: 30px; /* Set your desired height */
    margin-right: 10px;
}

.search-box input {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
}

.search-box.active {
    display: block;
    z-index: 1000;
}
.menu-section {
    background-color: white; /* Light green color */
    color: black;
    text-align: center;
    padding: 0;
    margin: auto;
    display: flex;
    justify-content: space-between
}

.menu-item {
    margin: 0 40px;
}

.menu-toggle-text {
    display: none; /* Ẩn ban đầu */
}

@media (max-width: 768px) {
    .menu-toggle-text {
        display: block; /* Hiển thị khi kích thước màn hình nhỏ hơn hoặc bằng 768px */
        text-align: center; /* Căn giữa dòng chữ */
        font-weight: bold; /* In đậm chữ */
        
        margin: auto;
        font-size: 40px;
    }
}

.carousel-item img { 
    height: auto;  
    width: 70%; /* Set the width to 70% of the container width */
    display: block; /* Make the image a block element for centering */
    margin: 0 auto; /* Auto margin horizontally centers the image */
    padding: 40;
    padding-left: 50;
    padding-right: 50;
}

.flex-container {
    display: flex;
    flex-wrap: wrap;
}

.footer-section {
    background-color: #696969; /* Dim Gray */
    color: white;
    text-align: center;
    padding: 50px 0;
}

.container {
    display: flex;
}





@keyframes slideBanner {
    0% {
        transform: translateX(0%);
    }
    25% {
        transform: translateX(0%);
    }
    50% {
        transform: translateX(0%);
    }
    75% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(0%);
    }
}
.container {
    text-align: center; /* Căn giữa theo chiều ngang */
}

.content {
    text-align: center; /* Căn giữa theo chiều ngang */
    margin-top: 20px; /* Để tạo khoảng cách giữa h2 và nội dung bên dưới */
}

.content h2 {
    display: block; /* Để h2 chiếm toàn bộ chiều ngang */
}

.content p {
    margin-top: 10px; /* Để tạo khoảng cách giữa h2 và nội dung bên dưới */
}


/* CSS cho footer */
footer {
            background-color: Gainsboro;
            color: black ;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Các phần tử con sẽ căn giữa theo chiều ngang */
            
           
        }

        /* CSS cho cột */
        .column {
            flex: 1;
            margin: 10px;
        }

        /* CSS cho cột "Giới thiệu" */
        #introduction {
            text-align: center; /* Căn giữa nội dung trong cột */
            margin-top: 10px; /* Tự động căn giữa theo chiều dọc */
            align-self: center; /* Căn giữa cột theo chiều dọc */
        }

        /* CSS cho cột "Sản phẩm" */
        #products {
            text-align: center; /* Căn giữa nội dung trong cột */
            margin-top: 10px; /* Tự động căn giữa theo chiều dọc */
            align-self: flex-start; /* Căn cột "Sản phẩm" lên trên theo chiều dọc */
        }

        /* CSS cho cột "Liên hệ" */
        #contact {
            text-align: center; /* Căn giữa nội dung trong cột */
            margin-top: 10px; /* Tự động căn giữa theo chiều dọc */
            align-right: flex-end; /* Căn cột "Liên hệ" xuống dưới theo chiều dọc */
        }

        /* CSS cho hình ảnh */
        img {
            max-width: 100%;
            height: auto;
        }

        /* CSS cho social icons */
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: px; /* Khoảng cách giữa social icons và div logo */
        }

        .social-icons img {
            margin: 0 5px; /* Khoảng cách giữa các social icon */
            cursor: pointer;
        }
        .column a {
            color: black; /* Màu chữ cho liên kết */
            text-decoration: none; /* Loại bỏ gạch chân */
        }
        .footer-bar {
            background-color: #333; /* Màu nền của thanh footer ngang mới */
            color: white; /* Màu chữ của thanh footer ngang mới */
            padding: 10px; /* Khoảng cách giữa nội dung và viền của thanh footer ngang mới */
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .container {
            display: flex;
        }

        .left-column {
            flex: 1;
        }

        .right-column {
            flex: 2;
            padding: 20px;
        }
        .left-column img {
            max-width: 100%;
            height: auto;
            border: 8px solid transparent;
            box-shadow: 0 0 20px rgba(255, 104, 180, 0.5);
            animation: slideBanner 10s linear infinite;
            
            /* Thêm dòng dưới để phóng to hình ảnh */
            width: 100%; /* Hoặc bạn có thể thay đổi giá trị theo nhu cầu */
        }


/* Thêm các quy tắc CSS khác cho giao diện trang web */
        .banner {
            text-align: center;
            margin-top: 10px; /* Add this line for top margin */
            margin-bottom: 10px; /* You can adjust this margin as needed */
            overflow: hidden;
            display: flex;
            justify-content: center; /* Center horizontally */
        }

        .banner img {
            max-width: 1200px; /* Thay đổi giá trị này thành kích thước mong muốn */
            height: auto;
            animation: slideBanner 10s linear infinite;
        }

        .left-column {
            flex: 1;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin-top: 20px; /* Add margin at the top */
            margin-bottom: 20px; /* Add margin at the bottom */
            position: relative; /* Add position relative for absolute positioning */
        }

        .left-column img {
            max-width: 100%;
            height: auto;
            border: 8px solid transparent; /* Set initial border as transparent */
            box-shadow: 0 0 20px rgba(255, 104, 180, 0.5); /* Subtle shadow effect */
            animation: slideBanner 10s linear infinite; /* Horizontal sliding effect */
        }

        .left-column::before {
            content: ''; /* Create a pseudo-element for the border */
            position: absolute;
            top: -5px; /* Adjust the distance from the top */
            right: -5px; /* Adjust the distance from the right */
            bottom: -5px; /* Adjust the distance from the bottom */
            left: -5px; /* Adjust the distance from the left */
            border: 8px solid #ff68b4; /* Pink border */
            z-index: -1; /* Place the border behind the image */
        }

        @keyframes slideBanner {
            0% {
                transform: translateX(0%);
            }
            25% {
                transform: translateX(2%);
            }
            50% {
                transform: translateX(0%);
            }
            75% {
                transform: translateX(-2%);
            }
            100% {
                transform: translateX(0%);
            }
        }
        .intro-container {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .our-story {
            font-size: 2em; /* Adjust the font size as needed */
            font-weight: bold; /* Make it bold if desired */
        }

        .artisan-bakery {
            font-size: 1.5em; /* Adjust the font size as needed */
            color: #ff68b4; /* Set a custom color if desired */
        }
        .right-column {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center; /* Đảm bảo nội dung được căn giữa */
        }
        .container-content {
            width: 80%;
            margin: 0 auto;
            /* Thêm các thuộc tính CSS khác cho container-content nếu cần */
            }

            .cart {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            /* Thêm các thuộc tính CSS khác cho cart nếu cần */
            }

            .banner {
            text-align: center;
            }

            .banner img {
            max-width: 100%;
            }

            .container-content {
            width: 80%;
            margin: 0 auto;
            }

            .cart {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            }
            

            .box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
            }

            h2 {
            text-align: center;
            margin: 20px auto; 
            }
            .box img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            }

            .content {
            font-size: 16px;
            text-align: center;
            }

            h3 {
            font-size: 20px;
            margin-bottom: 10px;
            }
            /* CSS để thiết lập kiểu dáng cho thanh màu đen */
            .black-bar {
            background-color: black;
            height: 10px; /* Điều chỉnh chiều cao của thanh */
            width: 100%; /* Chiều rộng bằng 100% của trang */
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 9999;
        }
            .column a {
                color: black; /* Màu chữ cho liên kết */
                text-decoration: none; /* Loại bỏ gạch chân */
            }

            .footer-bar {
                background-color: #333; /* Màu nền của thanh footer ngang mới */
                color: white; /* Màu chữ của thanh footer ngang mới */
                padding: 10px; /* Khoảng cách giữa nội dung và viền của thanh footer ngang mới */
                text-align: center;
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
            }
             .footer-bar {
            background-color: #333; /* Màu nền của thanh footer ngang mới */
            color: white; /* Màu chữ của thanh footer ngang mới */
            padding: 10px; /* Khoảng cách giữa nội dung và viền của thanh footer ngang mới */
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 10px; /* Chiều cao của thanh ngang */
        }

            
        </style>
                    



</style>    
<body>

</head>
<!-- header -->

<!-- menu -->
<body>


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

    

    

    <div class="container">
        <div class="left-column">
            <!-- Banner hình ảnh -->
            <img src="https://i.pinimg.com/564x/d0/82/af/d082af20e4df3c61c257eb57599dd1a9.jpg" alt="Banner">
        </div>
        <div class="right-column">
            <!-- Nội dung giới thiệu -->
            
            <div class="intro-container">
                <div class="our-story">OUR STORY</div>
                <div class="artisan-bakery">An Artisan Bakery Serving A Unique Selection Of Fresh Bread</div>
                <p>Since our launch into the United States in 2004, TOUS les JOURS [meaning "everyday" in French] has developed into a reputable neighborhood bakery specializing in French-Asian inspired baked goods, handcrafted beverages, and bold, flavorful coffee and espresso made with the finest ingredients.</p>
                <p>We take pride in sourcing and using carefully selected ingredients and promise to bring freshness and quality to our customers. To date, we have more than 90 locations across the United States, and more than 1,650 worldwide.</p>
            </div>
                
            </p>
            <!-- Hiển thị nội dung cửa hàng -->
            <!-- ... -->
        </div>
    </div>
        
        <div class="container-content">
    <div class="cart">
        <img src="./ANHGT/a.jpg" alt="Banner Image">
        <h2> Vision and mission</h2>
        <p>
           
            Our bakery's vision is to become our customers' favorite destination where they can experience the most exquisite and creative cakes. We understand that food is not just about eating, but also about creating special and sweet moments. Our mission is to provide customers with delicious experiences through producing and serving innovative, high-quality cakes from the finest ingredients. We are committed to putting quality first, from processing to service. Creativity is our driving force, and we constantly explore and apply new ideas in every product. Acting conscientiously to ensure customer satisfaction and loyalty is the core value on which we built our business. At the same time, we value sustainability, acting responsibly towards the environment and the community. Our business motto is "Cooking with love and creativity", and we are proud that each cake is created with dedicated hands and a passion for cooking. We believe that through each cake, we send a piece of love and joy to our customers, creating special and sweet memories.



        </p>
    </div>
    
    <div class="container">
     
        <div class="column">
          <div class="box">
            <img src="./ANHGT/IMG_8942.jpg" alt="Logo">
            <h3>Freshness + Quality</h3>
            <p class="content">We bake everyday to provide fresh products using the finest ingredients to not only produce a number of baked goods, but quality baked goods.</p>
          </div>
        </div>
    
        <div class="column">
          <div class="box">
            <img src="./ANHGT/IMG_8943.jpg" alt="Logo">
            <h3>Joy</h3>
            <p class="content">Our guests come to us not just for our offerings, but because stopping by our place gives them an elevated spirit, and a lift that carries .</p>
          </div>
        </div>
    
        <div class="column">
          <div class="box">
            <img src="./ANHGT/IMG_8944.jpg" alt="Logo">
            <h3>Artistry</h3>
            <p class="content">From gorgeous cakes and specially designed packaging to a clean store and warm interior, everywhere you view Tous les Jours is visually pleasing.</p>
          </div>
        </div>
    
        <div class="column">
          <div class="box">
            <img src="./ANHGT/IMG_8945.jpg" alt="Logo">
            <h3>Approachable</h3>
            <p class="content">We aim to be approachable, accessible, and affordable to all, for any need, on any budget, dine in and to-go,We form impactful relationships.</p>
          </div>
        </div>
      </div>
    



      
    

    
</body>
</html>


