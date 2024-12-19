<?php
session_start();
$cart_quantity = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_quantity += $item['quantity'];
    }
}
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
        <a href="index.php" style="text-decoration: none; width: 250px; color: black; font-size: 35px; font-weight: bold;padding-top: 10px; padding-left: 20px;">
            <i class="fas fa-home"></i> Trang chủ
        </a>
        <form action="timkiem.php" method="post">
            <input type="text" style="padding-left: 15px;" placeholder="Bạn cần tìm gì..." name="inputSearch" id="inputSearch" class="search-bar">
            <button type="submit" class="btnup" name="submit">
                <i class="fas fa-search"></i>
                Tìm kiếm</button>
        </form>
        <button type="button" class="btnup"  onclick="window.location.href='cart.php'">
            <i class="fas fa-shopping-cart">
            <?php if ($cart_quantity > 0): ?>
            <span style="color: white; background-color: red; border-radius: 50%; padding: 5px 10px; font-size: 12px;">
                <?php echo $cart_quantity; ?>
            </span>
        <?php endif; ?>
            </i> Giỏ hàng
        </button>
        <?php if (isset($_SESSION['user'])): ?>
        <button type="button" class="btnup" onclick="window.location.href='logout.php'">Đăng xuất</button>
    </div>
    <div class="headerdown">
        <ul class = "menungang">
            <li><a href="dtdd.php"><i class="fas fa-mobile-alt"></i> Điện thoại</a></li>
            <li><a href="#"><i class="fas fa-laptop"></i> Laptop</a></li>
            <li><a href="#"> <i class="fas fa-headphones"></i> Phụ kiện</a></li>
            <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 384 512">
                        <path d="M256 0H128a32 32 0 0 0-32 32V64H80A80 80 0 0 0 0 144V368a80 80 0 0 0 80 80h16v32a32 32 0 0 0 32 32h128a32 32 0 0 0 32-32V448h16a80 80 0 0 0 80-80V144a80 80 0 0 0-80-80h-16V32a32 32 0 0 0-32-32zM96 144a48 48 0 1 1-48 48 48.14 48.14 0 0 1 48-48zm192 224a48 48 0 1 1 48-48 48.14 48.14 0 0 1-48 48z"/>
                    </svg> Smart Watch
                </a></li>
            <li><a href="donhangdamua.php"><i class="fas fa-shopping-bag"></i> Sản phẩm đã mua</a></li>
            <li><a href="tracuudonhang.php"><i class="fas fa-search"></i> Tra cứu đơn hàng</a></li>
            <li><a href="phanhoi.php"><i class="fas fa-comment-dots"></i> Feedback</a></li>
            <li><a href="">Xin chào:  <?php  echo $_SESSION['user']['name'];?></a></li>
        </ul>
    </div>

    <?php else: ?>
        <button type="button" class="btnup" onclick="window.location.href='login.php'">Đăng nhập</button>
        </div>
        <div class="headerdown">
            <ul class = "menungang">
                <li><a href="dtdd.php"><i class="fas fa-mobile-alt"></i> Điện thoại</a></li>
                <li><a href="#"><i class="fas fa-laptop"></i> Laptop</a></li>
                <li><a href="#"> <i class="fas fa-headphones"></i> Phụ kiện</a></li>
                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 384 512">
                            <path d="M256 0H128a32 32 0 0 0-32 32V64H80A80 80 0 0 0 0 144V368a80 80 0 0 0 80 80h16v32a32 32 0 0 0 32 32h128a32 32 0 0 0 32-32V448h16a80 80 0 0 0 80-80V144a80 80 0 0 0-80-80h-16V32a32 32 0 0 0-32-32zM96 144a48 48 0 1 1-48 48 48.14 48.14 0 0 1 48-48zm192 224a48 48 0 1 1 48-48 48.14 48.14 0 0 1-48 48z"/>
                        </svg> Smart Watch
                    </a></li>
                <li><a href="donhangdamua.php"><i class="fas fa-shopping-bag"></i> Sản phẩm đã mua</a></li>
                <li><a href="tracuudonhang.php"><i class="fas fa-search"></i> Tra cứu đơn hàng</a></li>
                <li><a href="phanhoi.php"><i class="fas fa-comment-dots"></i> Feedback</a></li>
            </ul>
        </div>
    <?php endif; ?>



</header>
</body>
</html>