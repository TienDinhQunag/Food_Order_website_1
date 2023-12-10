<?php include "Bone.php"?>

<style>
    /* Add this style to hide the banner section on the profile.php page */
#bannerCarousel{
    display:none;
}
</style>

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
        .row {
        display: flex;
        flex-wrap: wrap;
        margin: 2%;
        border-radius: 20px;
        }

        .left-bar {
            background-color: #ffc0cb;
            padding: 20px;
            border-radius: 20px;
            color: white; /* Thay đổi màu chữ thành màu trắng */
            /* Thêm đổ bóng */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng mờ nhẹ */
            transition: box-shadow 0.3s ease; /* Hiệu ứng chuyển động khi đổ bóng thay đổi */
        }

        .left-bar p {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .left-bar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .left-bar li {
            margin-bottom: 10px;
        }

        .left-bar a {
            text-decoration: none;
            color: #333;
        }

        .left-bar a:hover {
            color: #fff;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2); /* Đổ bóng lớn hơn khi hover */
        }

        .main-container {
            padding: 20px;
            background-color: #fff; /* Changed background to white for contrast */
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Added a subtle shadow */
            transition: box-shadow 0.3s ease; /* Shadow transition effect */
            
        }

        /* Adjusted form styles for better readability */
        #profileForm {
            max-width: 700px;
            margin: 10px ;
        }

        #profileForm label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold ;
            font-family: 'Poppins', sans-serif; /* Đặt font chữ là Poppins */
            color: #ff68b4; /* Đặt màu chữ là #ff68b4 */
        }

        #profileForm input {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #profileForm button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ff68b4;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #profileForm button:hover {
            background-color: #ff8fa0; /* Darker pink on hover */
        }

        

        
    </style>


</head>

    <div class="row flex-container">
        <div class="col-sm-12 col-md-3 left-bar">
            <p>Xin chào tình yêu 💗 </p>
            <ul>
                <li><a href="#" onclick="showProfile()">Thông tin người dùng</a></li>
                <li><a href="order_history.php">Lịch sử đặt hàng</a></li>
                <li><a href="#" onclick="logout()">Đăng xuất</a></li>
            </ul>
        </div>
    <script>
        function showProfile() {
            var profileForm = document.getElementById('profileForm');

            // Toggle the visibility of the profile form
            if (profileForm.style.display === 'none' || profileForm.style.display === '') {
                profileForm.style.display = 'block';
            } else {
                profileForm.style.display = 'none';
            }
        }

        function showOrderHistory() {
                window.location.href = 'order_history.php';
            }

    </script>

        <div class="col-sm-12 col-md-9 main-container" id="mainContainer">
        <?php
   require_once '../Model/TaiKhoanModel.php';
   require_once '../Controller/ProfileController.php';
   
   // Assuming $model is an instance of TaiKhoanModel
   $model = new TaiKhoanModel();
   
   // Create an instance of the ProfileController
   $profileController = new ProfileController($model);
   
   if (isset($_SESSION['user_id'])) {
       $tenTaiKhoan = $_SESSION['user_id'];
       $customerProfile = $profileController->getCustomerProfile($tenTaiKhoan);
   
       // Display customer information
       if ($customerProfile) {
      
           ?>
           <form id="profileForm" action="../Controller/update_profile.php" method="post">
                <input type="hidden" id="customerId" name="customerId" value="<?php echo $customerProfile['IDKhachHang']; ?>">
                
                <label for="newName" style="color: pink;">Name:</label>
                <input type="text" id="newName" name="newName" value="<?php echo $customerProfile['TenKhachHang']; ?>" required><br>

                <label for="newEmail" style="color: pink;">Gmail:</label>
                <input type="email" id="newEmail" name="newEmail" value="<?php echo $customerProfile['Email']; ?>" required><br>

                <label for="newPhoneNumber" style="color: pink;">Phone Number:</label>
                <input type="tel" id="newPhoneNumber" name="newPhoneNumber" value="<?php echo $customerProfile['SDT']; ?>" required><br>

                <label for="newBirthdate" style="color: pink;">Birth of Date</label>
                <input type="date" id="newBirthdate" name="newBirthdate" value="<?php echo $customerProfile['NgaySinh']; ?>" required><br>

                <br><br>
                <h5> Your Address </h5>
                <h6> ❗❗❗ Note: We will deliver food to this Address</h6>
                <br>

                <div style="display: flex;">
                    <div style="flex: 1;">
                        <label for="thanhPho" style="color: pink;">City</label>
                        <input type="text" id="thanhPho" name="thanhPho" value="<?php echo $customerProfile['ThanhPho']; ?>" required><br>
                        
                        <label for="quan" style="color: pink;">District</label>
                        <input type="text" id="quan" name="quan" value="<?php echo $customerProfile['Quan']; ?>" required><br>
                    </div>
                    <div style="flex: 1;">
                        <label for="phuong" style="color: pink;">Ward</label>
                        <input type="text" id="phuong" name="phuong" value="<?php echo $customerProfile['Phuong']; ?>" required><br>
                        
                        <label for="duong" style="color: pink;">Street</label>
                        <input type="text" id="duong" name="duong" value="<?php echo $customerProfile['Duong']; ?>" required><br>
                    </div>
                </div>

                <button type="submit" style="border: 1px solid pink; background-color: pink; color: white;">Update Profile</button>
            </form>
           <?php
       } else {
           echo "Không tìm thấy thông tin khách hàng.";
       }
   } else {
       // Redirect to login page if not logged in
       header("Location: login.php");
       exit();
   }

            
    ?>
      

        </div>
    </div>


    <script>      
    </script>




    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function toggleSearchBox() {
            var searchBox = document.getElementById('searchBox');
            searchBox.classList.toggle('active');

            var searchInput = document.getElementById('searchInput');
            if (searchBox.classList.contains('active')) {
                searchInput.focus();
                document.body.addEventListener('click', closeSearchBox);
            } else {
                document.body.removeEventListener('click', closeSearchBox);
            }
        }

        function closeSearchBox(event) {
            var searchBox = document.getElementById('searchBox');
            var searchIcon = document.querySelector('.search-icon');
            if (!searchBox.contains(event.target) && !searchIcon.contains(event.target)) {
                searchBox.classList.remove('active');
                document.body.removeEventListener('click', closeSearchBox);
            }
        }
    </script>


<?php 

include "footer.php"
?>
</body>
    

</html>