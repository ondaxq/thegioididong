<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách user</title>
    <link rel="stylesheet" href="style1.css">
</head>
<style>
    .ipdate{
        height: 30px;
        border-radius: 5px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<body>
<?php 
include 'header.php';
?>
<div class="body">
    <div class="bodyc1">
    <?php include 'menudoc.php';?>
    </div>
    <div class="bodyc2">
    <form action="" method="get">
    <label for="start_date">Ngày bắt đầu:</label>
    <input type="date" id="start_date" name="start_date" class="ipdate">
    <br>
    <label for="end_date">Ngày kết thúc:</label>
    <input type="date" id="end_date" name="end_date" class="ipdate">
    <br>
    <button type="submit" name="filter">Lọc</button>
    </form>

    <h1>Danh sách đơn hàng</h1>
    <table>
        <tr>
            <th>Mặt hàng</th>
            <th>Ngày giao</th>
            <th>Gía trị đơn</th>
        </tr>
        <tr>
        <?php
    include('control.php');  
    $get_data = new data_dienthoai();
    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
    
    $select_user = $get_data->select_dh_dagiao($start_date, $end_date);
    $total_value = $get_data->sum_giatridon($start_date, $end_date);
    $total_orders = mysqli_num_rows($select_user);  

    while($dt = mysqli_fetch_assoc($select_user)) {
    ?>
    <tr>
    <td><?php echo $dt['mathang'] ?></td>
    <td><?php echo $dt['timeupd'] ?></td>
    <td><?php echo number_format($dt['giatridon']) ?> đ</td>
    </tr>
    
    <?php } ?>
    
    <?php if ( $end_date) { ?>
        <tr>
            <td colspan="2"><strong>Số lượng đơn: <?php echo $total_orders; ?> đơn </strong></td>
            <td><strong>Tổng giá trị: <?php echo number_format($total_value) ?> đ</strong></td>
        </tr>
    <?php } ?>
    </table>
    </div>

</div>
</body>
</html>
