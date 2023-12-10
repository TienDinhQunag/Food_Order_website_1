
<?php
        include "bone.php";


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
        #bannerCarousel {
            display: none;
        }

    .flex-container {        
        background-color: pink;
        display: flex;
        flex-wrap: wrap;
        margin-top: 15px ;
        margin-bottom: 5% ;
        margin-left: 5%;
        margin-right: 5%;
        border-radius: 20px;
    }
        
    .ad-section {
        background-color: pink;
        border-radius: 20px;            
    }
    .ad-section img {
    max-width: 100%;
    max-height: 100%;
    width: 100%; 
    height: 100%;
    }

    .signin-section {
        background-color: pink; 
        border-radius: 20px;
    }

    .signin-section form {
        padding: 5%;
    }
    
    .signin-section form label,
    .signin-section form input,
    .signin-section form .form-group {
        font-family: 'Poppins', sans-serif;
    }

    </style>

    <title>sign-in</title>
</head>

<body>


<div class="row flex-container">





<div class="col-sm-12 col-md-7 ad-section d-none d-md-block">
    <img src="./Image/adpicture.jpg" alt="Mô tả về ảnh">

</div>


    <div class="col-sm-12 col-md-5 signin-section">

        <form action="../Controller/Xulydangnhap.php" method="POST" role="form">                
            <h2>Loggin</h2>

            <div class="form-group">
                <label for="">Account</label>
                <input type="text" class="form-control" id="" placeholder="Enter your account" name="tenTaiKhoan" required pattern="[A-Za-z0-9]+" title="Please enter a username without spaces or special characters">
            </div>

            <div class="form-group">                
                <label for="">Password</label>
                <input type="password" class="form-control" id="matKhau" placeholder="Enter your password" name="matKhau" required minlength="6">
            </div>

            <button type="submit" class="btn btn-primary" name="login">Loggin</button>
        </form>
        <?php 
                // Display error message if there is one
                if (isset($_SESSION['error_message'])) {
                    echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
        ?>
    </div>
</div>

    <!-- Footer Section -->


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</body>

</html>