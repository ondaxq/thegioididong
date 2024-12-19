<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hòm thư góp ý</title>
    <link rel="stylesheet" href="style1.css">
</head>
<style>
    p{
        margin-top: 0px;
        padding-top: 0px;
        margin-bottom: 0px;
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
    
    <h1>Danh sách góp ý</h1>
    <table style="text-align: left;">
    <tr>
    <?php
            include('control.php');
            $get_data = new data_dienthoai();
            $select_ht= $get_data->select_homthu();
            foreach($select_ht as $h){
                ?>
               <td> 
                <div class="a" style="padding-left: 20px;">
               <h3 style="font-size: 30px; padding-top: 0px; margin-top: 0px;"> <?php echo $h['tieude'] ?></h3>
                <p>Từ: <?php echo $h['tennggui'] ?> <?php echo $h['email'] ?></p>
                <br>
                <p>Số điện thoại: 0<?php echo $h['sdt'] ?></p>
                <br>
                <p><?php echo $h['noidung'] ?></p>
                </div>
                </td>
                </tr>
            <?php }?>
    </table>
    </div>
</div>
</body>
</html>