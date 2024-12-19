<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sản phẩm</title>
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
        $select_dt = $get_data->select_dt_id($id); 
        
        foreach ($select_dt as $i_dt) {
            
        }
    } else {
        echo "ID không tồn tại."; 
    }
?>

<h2>Sửa thông tin điện thoại</h2>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên điện thoại</td>
            <td><input type="text" name="ten" value="<?php echo $i_dt['ten']; ?>"></td>
        </tr>
        <tr>
        <td>Tên hãng</td>
                <td>
                <select name="idhang">
                    <?php 
                    $get_data1=new data_dienthoai();
                    $select_l = $get_data1->select_hang();
                    foreach ($select_l as $i) { ?>
                    <option value="<?php echo $i['idhang']?>"><?php echo $i['tenhang']?></option>
                    <?php } ?>
                </select>
                </td>
        </tr>
        <tr>
            <td>Hệ điều hành</td>
            <td><input type="text" name="hedieuhanh" value="<?php echo $i_dt['hedieuhanh']; ?>"></td>
        </tr>
        <tr>
            <td>CPU</td>
            <td><input type="text" name="cpu" value="<?php echo $i_dt['cpu']; ?>"></td>
        </tr>
        <tr>
            <td>GPU</td>
            <td><input type="text" name="gpu" value="<?php echo $i_dt['gpu']; ?>"></td>
        </tr>
        <tr>
            <td>RAM</td>
            <td><input type="text" name="ram" value="<?php echo $i_dt['ram']; ?>"></td>
        </tr>
        <tr>
            <td>Bộ nhớ trong (ROM)</td>
            <td><input type="text" name="rom" value="<?php echo $i_dt['rom']; ?>"></td>
        </tr>
        <tr>
            <td>Camera sau</td>
            <td><input type="text" name="camsau" value="<?php echo $i_dt['camsau']; ?>"></td>
        </tr>
        <tr>
            <td>Camera trước</td>
            <td><input type="text" name="camtruoc" value="<?php echo $i_dt['camtruoc']; ?>"></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input type="text" name="gia" value="<?php echo $i_dt['gia']; ?>"></td>
        </tr>
        <tr>
            <td>URL hình sản phẩm</td>
            <td><input type="file" id="hinhsp" name="hinhsp" value="<?php echo $i_dt['hinhsp']; ?>"></td>
        </tr>
        <tr>
            <td>URL hình thông số</td>
            <td><input type="file" id="hinhts" name="hinhts" value="<?php echo $i_dt['hinhthongso']; ?>"></td>
        </tr>
        <tr>
            <td>URL hình quảng cáo</td>
            <td><input type="file" id="hinhqc" name="hinhqc" value="<?php echo $i_dt['hinhqc']; ?>"></td>
        </tr>
        <tr>
            <td>URL video giới thiệu</td>
            <td><input type="text" id="linkrv" name="linkrv" value="<?php echo $i_dt['linkrv']; ?>"></td>
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
        $ten = $_POST['ten'];
        $hang = $_POST['idhang'];
        $hedieuhanh = $_POST['hedieuhanh'];
        $cpu = $_POST['cpu'];
        $gpu = $_POST['gpu'];
        $ram = $_POST['ram'];
        $rom = $_POST['rom'];
        $camsau = $_POST['camsau'];
        $camtruoc = $_POST['camtruoc'];
        $gia = $_POST['gia'];

        $urlhsp = !empty($_FILES["hinhsp"]["name"]) ? basename($_FILES["hinhsp"]["name"]) : $i_dt['hinhsp'];
        $urlhts = !empty($_FILES["hinhts"]["name"]) ? basename($_FILES["hinhts"]["name"]) : $i_dt['hinhthongso'];
        $urlhqc = !empty($_FILES["hinhqc"]["name"]) ? basename($_FILES["hinhqc"]["name"]) : $i_dt['hinhqc'];

        $linkrv = $_POST['linkrv'];


        $update = $get_data->update_dt(
            $ten,
            $hang,
            $hedieuhanh,
            $cpu,
            $gpu,
            $ram,
            $rom,
            $camsau,
            $camtruoc,
            $gia,
            $id,
            $urlhsp,
            $urlhts,
            $urlhqc,
            $linkrv
        );


        if ($update) {
            echo "<script>alert('Cập nhật thành công');window.location='danhsachsanpham.php';</script>";
        } else {
            echo "<script>alert('Cập nhật thất bại');</script>";
        }
    }

    ?>
</form>
    </div>

</div>
</body>
</html>