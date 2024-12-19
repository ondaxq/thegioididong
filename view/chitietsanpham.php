<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
</head>
<style>
.cmtform label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
}

.cmtform input {
    width: 97%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.cmtform button {
    width: 50%;
    padding: 10px;
    background-color: whitesmoke;
    color: royalblue;
    margin-bottom: 15px;
    border: 1px solid royalblue;
    border-radius: 4px;
    box-sizing: border-box;
    margin-left: 150px;
}
textarea{
    width: 97%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    height: 100px;
    box-sizing: border-box;
}
.cmt{
    width: 700px;
    height: auto;
    margin-left: 180px;
    padding-bottom: 50px;
    margin-top: 40px;
    padding-top: 10px;
    padding-left: 20px;
    background-color: white;
    border-radius: 10px;
}
        .star-rating {
            direction: rtl;
            display: inline-flex;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
        }

        .star-rating input:checked ~ label,
        .star-rating input:hover ~ label,
        .star-rating label:hover ~ label {
            color: #f90;
        }
</style>
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
            <th colspan="2">Giới thiệu sản phẩm</th>
            </tr>
            <tr>
                <td colspan="2">  <iframe width="100%" height="355" src="<?php echo $dt['linkrv']; ?>" frameborder="0" allowfullscreen></iframe>
                </td>
                </td>
            </tr>
        </table>
    </div>
    <div class="sanphamc2" style="height: 500px;">
    <p>Giá:</p>
    <h3 style="font-size: 28px;"><?php echo $dt['gia'] ?>₫</h3>
    <table >
        <tr>
            <th > Khuyến mãi</th>
        </tr>
        <tr>
            <td>  1. Phiếu mua hàng áp dụng mua sim trị giá 50,000đ</td>
        </tr>
        <tr>
            <td>  2. Nhập mã TGDDSAM giảm 5% tối đa 01 triệu cho đơn hàng từ 14 Triệu, chỉ áp dụng thanh toán VNPAY-QR tại cửa hàng.</td>
        </tr>
        <tr>
            <td>  3.  Trả góp 0% thẻ tín dụng qua Galaxy Member.</td>
        </tr>
    </table>
    <div class="buttonsp">
    <form action="addtocart.php" method="post" style="margin-right: 10px;">
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
    <div class="cmt">
    <form  class="cmtform" action="" method="post">
    <input type="hidden" name="id" value="<?php echo $dt['id'] ?>">
    <label for="ten">Họ tên:</label>
    <input type="text" id="ten" name="ten" placeholder="Nhập họ và tên" require>
    <label for="">Đánh giá sản phẩm này: </label>
    <div class="star-rating">
            <input type="radio" name="rating" value="5" id="5"><label for="5">★</label>
            <input type="radio" name="rating" value="4" id="4"><label for="4">★</label>
            <input type="radio" name="rating" value="3" id="3"><label for="3">★</label>
            <input type="radio" name="rating" value="2" id="2"><label for="2">★</label>
            <input type="radio" name="rating" value="1" id="1"><label for="1">★</label>
        </div>
    <br>
    <label for="comment">Bình luận:</label>
     <textarea name="comment" id="comment" class="large-textarea"></textarea>
    <button type="submit" name="cmt">Đánh giá</button>
    </form>
    <?php
        $product_id = $_GET['id'];  
        $result = $conn->query("SELECT AVG(sao) as average_rating FROM binhluan WHERE id = $product_id");
        $row = $result->fetch_assoc();
        if ($row['average_rating'] !== null) {
            $average_rating = round($row['average_rating'], 1); 
            echo "<b style='font-size: 50px;'>$average_rating</b>";  
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $average_rating) {
                    echo "<span style='color: #f90; font-size: 50px;'>★</span>"; 
                } else {
                    echo "<span style='color: #ccc; font-size: 50px;'>★</span>"; 
                }
            }
        } else {
            echo "<b >Chưa có đánh giá</b>";
        }
    if (isset($_POST['cmt'])) {
            $id= $_POST['id'];
            $ten = $_POST['ten'];
            $star = $_POST['rating'];
            $comment = $_POST['comment'];
            $insert_cmt= $get_data->insert_cmt($id,$ten,$star,$comment);
            if ($insert_cmt) {
                echo "<script>alert('Thêm thành công');window.history.back();</script>";
            } else {
                echo "<script>alert('Thêm thất bại');</script>";
                echo $id.$ten.$comment;
            }
        }?>
    <?php } }?>
   <?php 
          $get_data = new data_dienthoai();
          $id = $_GET['id'];
          if (isset($id)) {
              $select_cmt = $get_data->select_bl($id);
          foreach($select_cmt as $cmt){
            ?>
            <p><b><?php echo $cmt['tenngbl'] ?></b></p>
            <p>
                <?php 
                $rating = (int)$cmt['sao']; 
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo "<span style='color: #f90;'>★</span>"; 
                    } else {
                        echo "<span style='color: #ccc;'>★</span>";  
                    }
                }
                ?>
            </p>
            <p><?php echo $cmt['noidung'] ?></p>
            <hr>
            <?php } }?>
            </div>
<?php  include'footer.php' ?>
</div>
</body>
</html>