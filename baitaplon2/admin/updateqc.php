<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin quảng cáo</title>
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
    $idqc = $_GET['up']; 
    if (isset($idqc)) {
        $select_dt = $get_data->select_qc_id($idqc); 
        
        foreach ($select_dt as $i_dt) {
            
        }
    } else {
        echo "ID không tồn tại."; 
    }
?>

<h2>Sửa quảng cáo</h2>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
        <td>Tên sản phẩm liên kết</td>
                <td>
                <select name="id">
                    <?php 
                    $get_data1=new data_dienthoai();
                    $select_l = $get_data1->selectdt();
                    foreach ($select_l as $i) { ?>
                    <option value="<?php echo $i['id']?>"><?php echo $i['ten']?></option>
                    <?php } ?>
                </select>
                </td>
        </tr>
       <tr>
            <td>Hình</td>
            <td><input type="file" id="hinhqc" name="hinhqc" value="<?php echo $i_dt['hinh']; ?>">
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button type="submit" name="txtupdate">Sửa</button>
                <button type="button" onclick="window.history.back()">Quay lại</button>
            </td>
        </tr>
    </table>

    <?php 
        if (isset($_POST['txtupdate'])) {
            $id = $_POST['id'];
            if (!empty($_FILES["hinhqc"]["name"])) {
                $hinh = basename($_FILES["hinhqc"]["name"]);
            } else {
                $hinh = $i_dt['hinh'];
            }
            $update = $get_data->update_qc($idqc,$id, $hinh );
            if ($update) {
                echo "<script>alert('Thành công');window.location='danhsachqc.php';</script>";
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