<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
    <h1>Thêm điện thoại mới</h1>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên điện thoại</td>
            <td><input type="text" name="ten" required></td>
        </tr>
        <tr>
                <td>Tên hãng</td>
                <td>
                <select name="idhang">
                    <?php 
                    include('control.php');
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
            <td><input type="text" name="hedieuhanh" required></td>
        </tr>
        <tr>
            <td>CPU</td>
            <td><input type="text" name="cpu" required></td>
        </tr>
        <tr>
            <td>GPU</td>
            <td><input type="text" name="gpu" required></td>
        </tr>
        <tr>
            <td>RAM</td>
            <td><input type="text" name="ram" required></td>
        </tr>
        <tr>
            <td>ROM</td>
            <td><input type="text" name="rom" required></td>
        </tr>
        <tr>
            <td>Camera sau</td>
            <td><input type="text" name="camsau" required></td>
        </tr>
        <tr>
            <td>Camera trước</td>
            <td><input type="text" name="camtruoc" required></td>
        </tr>
        <tr>
            <td>Tấm nền</td>
            <td><input type="text" name="tamnen" required></td>
        </tr>
        <tr>
            <td>Độ phân giải</td>
            <td><input type="text" name="dophangiai" required></td>
        </tr>
        <tr>
            <td>Kích thước màn hình</td>
            <td><input type="text" name="rong" required></td>
        </tr>
        <tr>
            <td>Dung lượng pin</td>
            <td><input type="text" name="pin" required></td>
        </tr>
        <tr>
            <td>Tốc độ sạc</td>
            <td><input type="text" name="sac" required></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input type="text" name="gia" required></td>
        </tr>
        <tr>
            <td>URL hình sản phẩm</td>
            <td><input type="file" id="hinhsp" name="hinhsp" required></td>
        </tr>
        <tr>
            <td>URL hình thông số</td>
            <td><input type="file" id="hinhts" name="hinhts" ></td>
        </tr>
        <tr>
            <td>URL hình quảng cáo</td>
            <td><input type="file" id="hinhqc" name="hinhqc" required></td>
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
            $ten = $_POST['ten'];
            $idhang = $_POST['idhang'];
            $hedieuhanh = $_POST['hedieuhanh'];
            $cpu = $_POST['cpu'];
            $gpu = $_POST['gpu'];
            $ram = $_POST['ram'];
            $rom = $_POST['rom'];
            $camsau = $_POST['camsau'];
            $camtruoc = $_POST['camtruoc'];
            $tamnen = $_POST['tamnen'];
            $dophangiai = $_POST['dophangiai'];
            $rong = $_POST['rong'];
            $pin = $_POST['pin'];
            $sac = $_POST['sac'];
            $gia = $_POST['gia'];
            $urlhsp = basename($_FILES["hinhsp"]["name"]);
            $urlhts = basename($_FILES["hinhts"]["name"]);
            $urlhqc = basename($_FILES["hinhqc"]["name"]);
            $insert_dienthoai = $get_data->insert_dienthoai($ten, $idhang, $hedieuhanh, $cpu, $gpu, $ram, $rom,
             $camsau, $camtruoc, $tamnen, $dophangiai, $rong, $pin , $sac,$gia, $urlhsp, $urlhts, $urlhqc);
            if ($insert_dienthoai) {
                echo "<script>alert('Thêm thành công');window.location='danhsachsanpham.php';</script>";
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