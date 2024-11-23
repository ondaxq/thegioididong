<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách user</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<?php 
include 'header.php';
?>
<div class="body">
    <div class="bodyc1">
    <?php include 'menudoc.php';?>
    </div>
    <div class="bodyc2">
    <h1>Danh sách đơn hàng</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Mặt hàng</th>
            <th>Gía trị đơn</th>
            <th>Tình trạng đơn</th>
            <th>Tùy chọn</th>
        </tr>
        <tr>
            <?php
                include('control.php');  
                $get_data = new data_dienthoai(); 
                $select_user = $get_data->select_dh(); 
                foreach($select_user as $dt) {
            ?>
                <td><?php echo $dt['iddh'] ?></td>
                <td><?php echo $dt['tenkh'] ?></td>
                <td>0<?php echo $dt['sdt'] ?></td>
                <td><?php echo $dt['dc'] ?></td>
                <td><?php echo $dt['mathang'] ?></td>
                <td><?php echo $dt['giatridon'] ?> đ</td>
                <td>
                <form action="updatedh.php" method="post">
                    <input type="hidden" name="iddh" value="<?php echo $dt['iddh']; ?>">
                    <select name="tinhtrangdon" style="width: 120px">
                        <option value="0" <?php if ($dt['tinhtrangdon'] == 0) echo 'selected'; ?>>Chưa xác nhận</option>
                        <option value="1" <?php if ($dt['tinhtrangdon'] == 1) echo 'selected'; ?>>Đã xác nhận</option>
                        <option value="2" <?php if ($dt['tinhtrangdon'] == 2) echo 'selected'; ?>>Đã giao</option>
                    </select>
                    <br>
                    <button type="submit" name="updatedh">Cập nhật</button>
                </form>
                </td>

                
                <td><a href="deletedh.php?del=<?php echo $dt['iddh']?>" 
                    onClick="if(confirm('Bạn có chắc chắn xóa?')) return true; else return false;">Xóa</a></td>
            </tr>
            <?php } ?>
    </table>
    </div>

</div>
</body>
</html>