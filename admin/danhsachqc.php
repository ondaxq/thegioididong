<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách quảng cáo</title>
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
    
    <h1>Danh sách quảng cáo</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Hình ảnh</th>
            <th>Sản phẩm liên kết</th>
            <th colspan="2">Tùy chọn</th>
        </tr>
        <tr>
            <?php
                include('control.php');  
                $get_data = new data_dienthoai(); 
                $select_dienthoai = $get_data->selectqc(); 
                foreach($select_dienthoai as $dt) {
            ?>
                <td><?php echo $dt['idqc'] ?></td>
                <td><img src="../img/<?php echo $dt['hinh'] ?>" alt="" style="width: 300px; height: 100px;"></td>
                <td><?php echo $dt['ten'] ?></td>
                <td><a href="deleteqc.php?del=<?php echo $dt['idqc']?>" 
                    onClick="if(confirm('Bạn có chắc chắn xóa?')) return true; else return false;">Xóa</a></td>
                <td><a href="updateqc.php?up=<?php echo $dt['idqc']?>">Sửa</a></td>
            </tr>
            <?php } ?>
            
    </table>
    </div>
</div>
</body>
</html>