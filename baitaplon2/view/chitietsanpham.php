<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <div class="container">
<?php  include'header.php' ?>
<?php
            include('../admin/control.php');
            $get_data = new data_dienthoai();
            $select_dt= $get_data->selectdt();
            $id = $_GET['id'];
            if (isset($id)) {
                $select_dt = $get_data->select_dt_id($id);
            foreach($select_dt as $dt){
                ?>
           
    <div class="containersp">
    <div class="sanphamc1">
        <h2>Điện thoại <?php echo $dt['tenhang'] ?> <?php echo $dt['ten'] ?></h2>
        <img class="imgsp" src="../img/<?php echo $dt['hinhsp'] ?>" alt="">
        <h2>Thông số kỹ thuật</h2>
        <img class="imgsp" src="../img/<?php echo $dt['hinhthongso'] ?>" alt="">
        <br>
        <table >
            <tr>
            <th colspan="2">Cấu hình và bộ nhớ</th>
            </tr>
            <tr>
                
                <td>Hệ điều hành: </td>
                <td><?php echo $dt['hedieuhanh'] ?></td>
            </tr>
            <tr>
                <td>Chip xử lý (CPU): </td>
                <td><?php echo $dt['cpu'] ?></td>
            </tr>
            <tr>
                <td>Chip đồ họa(GPU): </td>
                <td><?php echo $dt['gpu'] ?></td>
            </tr>
            <tr>
                <td>RAM: </td>
                <td><?php echo $dt['ram'] ?> GB</td>
            </tr>
            <tr>
                <td>Dung lượng lưu trữ: </td>
                <td><?php echo $dt['rom'] ?> GB</td>
            </tr>
            
            <tr>
            <th colspan="2">Camera và màn hình</th>
            </tr>
            <tr>
                <td>Độ phân giải camera sau: </td>
                <td><?php echo $dt['camsau'] ?></td>
            </tr>
            <tr>
                <td>Độ phân giải camera trước: </td>
                <td><?php echo $dt['camtruoc'] ?></td>
            </tr>
            <tr>
                <td>Công nghệ màn hình: </td>
                <td><?php echo $dt['tamnen'] ?></td>
            </tr>
            <tr>
                <td>Độ phân giải màn hình: </td>
                <td><?php echo $dt['dophangiai'] ?> </td>
            </tr>
            <tr>
                <td>Màn hình rộng: </td>
                <td><?php echo $dt['rong'] ?></td>
            </tr>
         
            <tr>
            <th colspan="2">Pin và sạc</th>
            </tr>
            <tr>
                <td>Dung lượng Pin: </td>
                <td><?php echo $dt['pin'] ?></td>
            </tr>
            <tr>
                <td>Hỗ trợ sạc tối đa: </td>
                <td><?php echo $dt['sac'] ?></td>
            </tr>
        </table>
    </div>
    <div class="sanphamc2">
    <p>Giá:</p>
    <h3><?php echo $dt['gia'] ?>₫</h3>
    <table>
        <tr>
            <th>Khuyến mãi</th>
        </tr>
        <tr>
            <td>1. Phiếu mua hàng áp dụng mua sim trị giá 50,000đ</td>
        </tr>
        <tr>
            <td>2. Nhập mã TGDDSAM giảm 5% tối đa 01 triệu cho đơn hàng từ 14 Triệu, chỉ áp dụng thanh toán VNPAY-QR tại cửa hàng.</td>
        </tr>
        <tr>
            <td>3.  Trả góp 0% thẻ tín dụng qua Galaxy Member.</td>
        </tr>
    </table>
    
    <div class="buttonsp">
    <div class="buttonsp">
    <form action="addtocart.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo $dt['id'] ?>">
    <input type="hidden" name="hinh" value="<?php echo $dt['hinhqc'] ?>">
    <input type="hidden" name="ten" value="<?php echo $dt['ten'] ?>">
    <input type="hidden" name="hang" value="<?php echo $dt['tenhang'] ?>">
    <input type="hidden" name="ram" value="<?php echo $dt['ram'] ?>">
    <input type="hidden" name="rom" value="<?php echo $dt['rom'] ?>">
    <input type="hidden" name="gia" value="<?php echo $dt['gia'] ?>">
    <button type="submit" name="them">Thêm vào giỏ</button>
    </form>
    <form action="cart.php" method="post">
    <input type="hidden" name="product_id" value="<?php echo $dt['id'] ?>">
    <input type="hidden" name="hinh" value="<?php echo $dt['hinhqc'] ?>">
    <input type="hidden" name="ten" value="<?php echo $dt['ten'] ?>">
    <input type="hidden" name="hang" value="<?php echo $dt['tenhang'] ?>">
    <input type="hidden" name="ram" value="<?php echo $dt['ram'] ?>">
    <input type="hidden" name="rom" value="<?php echo $dt['rom'] ?>">
    <input type="hidden" name="gia" value="<?php echo $dt['gia'] ?>">
    <button type="submit" name="mua">Mua ngay</button>
    </form>

    </div>
    <p>Gọi đặt mua 1900 232 460 (8:00 - 21:30)</p>
    </div>
    </div>
    <?php } }?>
<?php  include'footer.php' ?>
</div>
</body>
</html>