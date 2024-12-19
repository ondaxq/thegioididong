<!DOCTYPE html>
<html lang="vi">
<head>
    <?php
    session_start();
    ?>

    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">

        <div class="container" id="container">
            <div class="form-container sign-up">
                <form action="" method="post">
                    <h1>Đăng ký</h1>
                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">
                    <input type="text" placeholder="Name" name="name">
                    <input type="tel" placeholder="PhoneNumber" name="sdt">
                    <input type="email" placeholder="Email" name="email">
                    <input type="submit" value="Đăng ký" name="txtSignUp">
                </form>

            </div>
            <div class="form-container sign-in">

                <form action="" method="post">
                    <h1>Đăng nhập</h1>

                    <input type="text" placeholder="Username" name="username">
                    <input type="password" placeholder="Password" name="password">

                    <input type="submit" value="Đăng nhập" name="txtSignIn">
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <h1>Đã có tài khoản?</h1>
                        <p>Sử dụng tài khoản của bạn để đăng nhập</p>
                        <button class="hidden" id="login">Đăng nhập</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Chưa có tài khoản?</h1>
                        <p>Đăng kí với tên đăng nhập của bạn </p>
                        <button class="hidden" id="register">Đăng ký</button>
                    </div>
                </div>
            </div>
        </div>




        <script src="../js/app.js"></script>


<?php

include('../admin/control.php');
$get_data = new data_dienthoai();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txtSignIn"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $get_data->check_user($username, $password);
            if ($user) {
                $_SESSION['user'] = $user; 
                if ($user['role'] == 0) {
                    header("Location: index.php"); 
                } elseif ($user['role'] == 1) {
                    header("Location: ../admin/danhsachsanpham.php"); 
                }
                elseif ($user['role'] == 2) {
                    header("Location: ../admin/danhsachsanpham.php"); 
                }
                exit();
            } else {
                echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng');window.location='login.php';</script>";
            }
        }
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['txtSignUp'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];

    $result = $get_data->insert_user($username, $password, $name, $sdt, $email, null);

    if ($result === "Username already exists") {
        echo "<script>alert('Tên người dùng đã tồn tại. Vui lòng chọn tên khác.');</script>";
    } elseif ($result === true) {
        echo "<script>alert('Đăng ký thành công');window.location='login.php';</script>";
    } else {
        echo "<script>alert('Đăng ký thất bại');</script>";
    }
}


?>

</div>
</body>
</html>
