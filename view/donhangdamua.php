
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng đã mua</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <?php
        if (!isset($_SESSION['user'])) {
            header("Location: ../view/login.php");
            exit();
        }
        ?>
        
        <div class="goiy">
            <h2>Đơn hàng đã mua</h2>
            <?php
                include('../admin/control.php');
                $get_data = new data_dienthoai();
                $user_name = $_SESSION['user']['username'];
                $select_dh = $get_data->select_dh_damua($user_name);
                if ($select_dh->num_rows == 0) {
                    echo "<p>Bạn chưa mua sản phẩm nào.</p>";
                } else {
                    $stt = 0;
                    foreach ($select_dh as $dh) {
            ?>                  
                        <p>Đơn hàng thứ <?php echo $stt + 1; ?>:</p>
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
                        <p><?php 
                        if ($dh['tinhtrangdon'] == 2) {
                            echo "Thời gian giao: ".$dh['timeupd'];
                        } ?></p>
                        <hr>
            <?php  
                        $stt += 1; 
                    }
                }
            ?>      
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
