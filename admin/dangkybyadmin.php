<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm user</title>
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
<h1>Thêm user</h1>
<form action="" method="post">
    <table>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="sdt" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" ></td>
        </tr>
        <tr>
            <td>Quyền</td>
            <td><select name="role">
                <option value="0">Khách</option>
                <option value="1">Admin</option>
            </select></td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button type="submit" name="txtsub">Thêm mới</button>
                <button type="button" onclick="window.history.back()">Quay lại</button>
            </td>
        </tr>
    </table>
</form>
<?php
    include('../admin/control.php');
    $get_data = new data_dienthoai(); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $name = $_POST['name'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $result = $get_data->insert_user($username, $password, $name, $sdt, $email, $role);

    if ($result === "Username already exists") {
        echo "<script>alert('Tên người dùng đã tồn tại. Vui lòng chọn tên khác.');</script>";
    } elseif ($result === true) {
            echo "<script>alert('Đăng ký thành công');window.location='danhsachuser.php';</script>";
        } else {
            echo "<script>alert('Đăng ký thất bại');</script>";
        }
    }
?>
   </div>
   </div>
</body>
</html>
