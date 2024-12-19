<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm quảng cáo</title>
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
    <h1>Thêm quảng cáo mới</h1>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
                <td>Tên sản phẩm</td>
                <td>
                <select name="id">
                    <?php 
                    include('control.php');
                    $get_data1=new data_dienthoai();
                    $select_l = $get_data1->selectdt();
                    foreach ($select_l as $i) { ?>
                    <option value="<?php echo $i['id']?>"><?php echo  $i['tenhang']." ".$i['ten']?></option>
                    <?php } ?>
                </select>
                </td>
            </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" id="hinh" name="hinh" required></td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button type="submit" name="txtsub">Thêm mới</button>
                <button type="button" onclick="window.history.back()">Quay lại</button>
            </td>
        </tr>
    </table>
    <?php
        $get_data = new data_dienthoai(); 
        if (isset($_POST['txtsub'])) {
            $id = $_POST['id'];
            $hinh = basename($_FILES["hinh"]["name"]);
            $insert_qc = $get_data->insert_qc($id, $hinh);
            if ($insert_qc) {
                echo "<script>alert('Thêm thành công');window.location='danhsachqc.php';</script>";
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