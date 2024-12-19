<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
</head>
<style>
.order-form label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
}

.order-form input {
    width: 97%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.order-form button {
    width: 50%;
    padding: 10px;
    background-color: gold;
    margin-bottom: 15px;
    border: 1px solid #ccc;
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



</style>
<body>
<div class="container">
<?php include 'header.php';?>
<div class="cart">
        <h2 style="text-align: center;">Phản hồi góp ý</h2>
        <form class="order-form" action="" method="POST">
            <?php
        $name = '';
        $phone = '';
        $email = '';
        $tieude = '';
        $noidung = '';
        include('../admin/control.php');
        if (isset($_SESSION['user'])) {
            $user_name=$_SESSION['user']['username'];
            $get_data = new data_dienthoai();
            $user_info = $get_data->select_user_by_username($user_name); 
            foreach($user_info as $us){
                $name = $us['name'];
                $phone = $us['sdt'];
                $email = $us['email'];
            }
        }
        ?>

        <label for="name">Họ và Tên</label>
        <input type="text" id="name" name="name" placeholder="Nhập họ và tên" value="<?php echo $name; ?>" required>

        <label for="phone">Số điện thoại</label>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" pattern="[0-9]{10}" value="<?php echo $phone; ?>" required>

        <label for="address">Địa chỉ</label>
        <input type="email" id="email" name="email" placeholder="Nhập email" value="<?php echo $email; ?>" required>

        <label for="tieude">Tiêu đề</label>
        <input type="text" id="tieude" name="tieude" placeholder="Nhập tiêu đề" required>

        <label for="nd">Nội dung</label>
        <textarea name="nd" id="nd" class="large-textarea" placeholder="Nhập nội dung" required></textarea>
            <button type="submit" name="phanhoi">Gửi</button>
        </form>
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['phanhoi'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $tieude = $_POST['tieude'];
        $nd = $_POST['nd'];
        $result = $get_data->insert_homthu($name, $phone, $email, $tieude, $nd);

        if ($result === true) {
            echo "<script>alert('Gửi góp ý thành công');window.location='phanhoi.php';</script>";
        } else {
            echo "<script>alert('Gửi góp ý thất bại');</script>";
        }
        }?>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
