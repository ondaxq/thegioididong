<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin hãng</title>
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
    <?php
    include('control.php');
    $get_data = new data_dienthoai(); 
    $id = $_GET['up']; 
        if (isset($id)) {
            $select_h = $get_data->select_hang_id($id);

            foreach ($select_h as $i_h) {
                
            }
        } else {
            echo "ID không tồn tại.";
        }
            ?>
    <h2>Sửa hãng </h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Tên hãng</td>
                <td><input type="text" name="tenhang" value="<?php echo $i_h['tenhang']?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="center">
                    <button type="submit"  name="txtupdate">Sửa</button>
                    <button type="button" onclick="window.history.back()">Quay lại</button>
                </td>
            </tr>
        </table>
        <?php 
        if (isset($_POST['txtupdate'])) {
            $tenhang = $_POST['tenhang'];
            $update = $get_data->update_hang($tenhang,$id);
            if ($update) {
                echo "<script>alert('Thành công');window.location='danhsachhang.php';</script>";
            } else {
                echo "<script>alert('Thất bại');</script>";
            }
        }
    ?>
    </form>
    </div>

</div>
</body>
</html>