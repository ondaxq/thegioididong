<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hãng</title>
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
    <h1>Thêm hãng mới</h1>
<form action="" method="post">
    <table>
        <tr>
            <td>Tên hãng</td>
            <td><input type="text" name="ten" required></td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button type="submit" name="txtsub">Thêm mới</button>
                <button type="button" onclick="window.history.back()">Quay lại</button>
            </td>
        </tr>
    </table>
    <?php
         include('control.php');
        $get_data = new data_dienthoai(); 
        if (isset($_POST['txtsub'])) {
            $ten = $_POST['ten'];
            $insert_hang = $get_data->insert_hang($ten);
            if ($insert_hang) {
                echo "<script>alert('Thêm thành công');window.location='danhsachhang.php';</script>";
            } else {
                echo "<script>alert('Thêm thất bại');</script>";
            }
        }
    ?>
</form>

    </div>

</div>
</body>
</html>