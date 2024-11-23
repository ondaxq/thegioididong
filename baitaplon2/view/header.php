<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <header>
        <div class="headerup">
            <a href="index.php" style="text-decoration: none; width: 200px; color: black; font-size: 35px; font-weight: bold;padding-top: 10px; padding-left: 20px;">
               Trang chủ
            </a>
            <form action="timkiem.php" method="post">
                <input type="text" style="padding-left: 15px;" placeholder="Bạn cần tìm gì..." name="inputSearch" id="inputSearch" class="search-bar">
                <button type="submit" class="btnup" name="submit">
                    <i class="fas fa-search"></i>
                    Tìm kiếm</button>
            </form>
            <button type="button" class="btnup"  onclick="window.location.href='cart.php'">
                <i class="fas fa-shopping-cart"></i> Giỏ hàng
            </button>
            <?php if (isset($_SESSION['user'])): ?>
                <button type="button" class="btnup" onclick="window.location.href='logout.php'">Đăng xuất</button>
                </div>
                <div class="headerdown">
                <ul class = "menungang">
                <li><a href="dtdd.php">Điện thoại</a></li>
                <li><a href="#">Laptop</a></li>
                <li><a href="#">Phụ kiện</a></li>
                <li><a href="#">Smarthwatch</a></li> 
                <li><a href="#">Sản phẩm đã mua</a></li> 
                <li><a href="#">Tra cứu đơn hàng</a></li> 
                <li><a href="#">Phản hồi, góp ý</a></li>
                <li><a href="">Xin chào:  <?php  echo $_SESSION['user']['name'];?></a></li>
                </ul>  
                </div>
                
            <?php else: ?>
                <button type="button" class="btnup" onclick="window.location.href='login.php'">Đăng nhập</button>
                </div>
                <div class="headerdown">
                <ul class = "menungang">
                <li><a href="dtdd.php">Điện thoại</a></li>
                <li><a href="#">Laptop</a></li>
                <li><a href="#">Phụ kiện</a></li>
                <li><a href="#">Smarthwatch</a></li> 
                <li><a href="#">Sản phẩm đã mua</a></li> 
                <li><a href="#">Tra cứu đơn hàng</a></li> 
                <li><a href="#">Phản hồi, góp ý</a></li>
                </ul>  
                </div>
            <?php endif; ?>


        
        </header>
</body>
</html>