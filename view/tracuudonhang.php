<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu đơn hàng</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="goiy">
            <h2>Thông tin đơn hàng</h2>
            <form method="POST" action="">
                <label for="mavandon">Nhập mã vận đơn:</label>
                <input type="text" id="mavandon" name="mavandon" required>
                <button type="submit">Tra cứu</button>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mavandon'])) {
                    include('../admin/control.php');
                    $get_data = new data_dienthoai();
                    $mavandon = $_POST['mavandon']; 
                    $select_dh = $get_data->select_dh_bymvd($mavandon);
                    if ($select_dh->num_rows == 0) {
                        echo "<p>Không tìm thấy đơn hàng với mã vận đơn này.</p>";
                    } else {
                        $dh = $select_dh->fetch_assoc();
            ?>                   
                            <h4 style="font-size: 18px;">Mã vận đơn: <?php echo htmlspecialchars($dh['mavandon']); ?> </h4>
                            <p>Sản phẩm: <?php echo htmlspecialchars($dh['mathang']); ?></p>
                            <?php if($dh['ptthanhtoan'] == 1 && $dh['tinhtrangdon'] == 1 or $dh['tinhtrangdon'] == 2 ){?>
                            <p>Đã thanh toán, tổng giá trị đơn: <?php echo number_format($dh['giatridon']); ?>đ</p>
                            <?php } else { ?>
                            <p>Giá: <?php echo number_format($dh['giatridon']); ?>đ</p>
                            <?php } ?>
                            <p>Địa chỉ nhận: <?php echo htmlspecialchars($dh['dc']); ?></p>
                            <p>Số điện thoại: 0<?php echo htmlspecialchars($dh['sdt']); ?></p>
                            <p>Trạng thái: 
                                <?php 
                                    if ($dh['tinhtrangdon'] == 0) {
                                        echo "Chờ xác nhận";
                                    } elseif ($dh['tinhtrangdon'] == 1) {
                                        echo "Đã xác nhận";
                                    } elseif ($dh['tinhtrangdon'] == 2) {
                                        echo "Đã giao";
                                    } else {
                                        echo "Trạng thái không xác định";
                                    }
                                ?>
                            </p>
            <?php  
                    }
                }
            ?>      
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
