<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách hãng</title>
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
    
    <h1>Danh sách hãng</h1>
    <table>
    <tr>
    <th>ID</th>
    <th>Tên hãng</th>
    <th colspan="2">Tùy chọn</th>
    </tr>
    <tr>
    <?php
            include('control.php');
            $get_data = new data_dienthoai();
            $select_hang= $get_data->select_hang();
            foreach($select_hang as $h){
                ?>
                <td><?php echo $h['idhang'] ?></td>
                <td><?php echo $h['tenhang'] ?></td>
                <td><a href="deletehang.php?del=<?php echo $h['idhang']?>"
                onClick="if(confirm('Bạn có chắc chắn xóa?')) return true; 
                else return false;">Xóa</a></td>
                <td><a href="updatehang.php?up=<?php echo $h['idhang']?>">Sửa</a></td>
                </tr>
            <?php }?>
    </table>
    </div>
</div>
</body>
</html>