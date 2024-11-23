<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
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
    <div class="bodyc2" >
    
    <h1>Danh sách điện thoại</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Hãng</th>
            <th>Tên điện thoại</th>
            <th>Hệ điều hành</th>
            <th>CPU</th>
            <th>GPU</th>
            <th>RAM</th>
            <th>Bộ nhớ trong (ROM)</th>
            <th>Camera sau</th>
            <th>Camera trước</th>
            <th>Giá</th>
            <th colspan="2">Tùy chọn</th>
        </tr>
        <tr>
            <?php
                include('control.php');  
                $get_data = new data_dienthoai(); 
                $select_dienthoai = $get_data->selectdt(); 
                foreach($select_dienthoai as $dt) {
            ?>
                <td><?php echo $dt['id'] ?></td>
                <td><img src="../img/<?php echo $dt['hinhqc'] ?>" alt="" style="width: 100px; height: 100px;"></td>
                <td><?php echo $dt['tenhang'] ?></td>
                <td><?php echo $dt['ten'] ?></td>
                <td><?php echo $dt['hedieuhanh'] ?></td>
                <td><?php echo $dt['cpu'] ?></td>
                <td><?php echo $dt['gpu'] ?></td>
                <td><?php echo $dt['ram'] ?></td>
                <td><?php echo $dt['rom'] ?></td>
                <td><?php echo $dt['camsau'] ?></td>
                <td><?php echo $dt['camtruoc'] ?></td>
                <td><?php echo $dt['gia'] ?></td>
                <td><a href="deletedt.php?del=<?php echo $dt['id']?>" 
                    onClick="if(confirm('Bạn có chắc chắn xóa?')) return true; else return false;">Xóa</a></td>
                <td><a href="updatedt.php?up=<?php echo $dt['id']?>">Sửa</a></td>
            </tr>
            <?php } ?>
            
    </table>
    </div>
</div>
</body>
</html>