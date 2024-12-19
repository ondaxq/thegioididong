<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua hàng thành công</title>
</head>
<body>
<div class="container">
<?php include 'header.php';
include('../admin/control.php');
$get_data = new data_dienthoai(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dathang'])) {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $total_price = htmlspecialchars($_POST['total_price']);
    $cart_items = json_decode($_POST['cart_items'], true);
    $username = htmlspecialchars($_POST['username']);
    $mavandon = htmlspecialchars($_POST['mavandon']);
    $pttt = htmlspecialchars($_POST['payment_method']);
    $mathang = "";
    foreach ($cart_items as $item) {
        $mathang .= "{$item['hang']} {$item['ten']} ({$item['ram']}GB/{$item['rom']}GB) - SL: {$item['quantity']}; ";
    }
    $result = $get_data->insert_dh($name, $phone, $address, $mathang, $total_price,$username,$mavandon,$pttt);
?>
<div class="cart">
<?php
    if($pttt == 1){
        echo "<h1>Quét mã để thanh toán!</h1>";
        $bankCode = "mbbank"; 
        $accountNumber = "666664250503"; 
        $receiverName = "NGUYEN XUAN QUYEN"; 
        $amount = number_format($total_price, 0, '', ''); 
        $description = $mavandon; 
        $qrUrl = "https://img.vietqr.io/image/{$bankCode}-{$accountNumber}-compact.png?amount={$total_price}&addInfo={$description}&accountName={$receiverName}";
        echo "<img src='{$qrUrl}' alt='Mã QR thanh toán MB Bank' />";
    }
    if ($result) {
        echo "<h1>Đặt hàng thành công!</h1>";
        echo "<p>Cảm ơn bạn <strong>$name</strong> đã đặt hàng.</p>";
        echo "<p>Mã vận đơn: $mavandon</p>";
        echo "<p>Thông tin giao hàng:</p>";
        echo "<p>Số điện thoại: $phone</p>";
        echo "<p>Địa chỉ: $address</p>";
        echo "<h2>Chi tiết giỏ hàng:</h2>";

        foreach ($cart_items as $item) {
            echo "<p>{$item['hang']} {$item['ten']} ({$item['ram']}GB/{$item['rom']}GB) - {$item['quantity']} x {$item['gia']}đ</p>";
        }

        echo "<h3>Tổng giá trị đơn hàng: " . number_format($total_price) . " VND</h3>";
        unset($_SESSION['cart']);
    } else {
        echo "<h1>Đặt hàng thất bại!</h1>";
        echo "<p>Vui lòng thử lại sau.</p>";
    }
}
?>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>