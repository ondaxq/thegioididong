
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin user</title>
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
        $select_us = $get_data->select_user_by_id($id); 
        foreach ($select_us as $i_us) {
            
        }
    } else {
        echo "ID không tồn tại."; 
    }
?>

<h2>Sửa thông tin user</h2>
<form action="" method="post">
    <table>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="<?php echo $i_us['pass']; ?>"></td>
        </tr>
        <tr>
            <td>Xác nhận Password</td>
            <td><input type="password" name="confirmpassword" value="<?php echo $i_us['pass']; ?>"></td>
        </tr>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="name" value="<?php echo $i_us['name']; ?>"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="sdt" value="<?php echo $i_us['sdt']; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $i_us['email']; ?>"></td>
        </tr>
        <tr>
            <td>Quyền</td>
            <td>
                <select name="role">
                    <option value="0" <?php echo ($i_us['role'] == 0) ? 'selected' : ''; ?>>Khách</option>
                    <option value="1" <?php echo ($i_us['role'] == 1) ? 'selected' : ''; ?>>Admin</option>
                </select>
            </td>

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
            $password = $_POST['password']; 
            $confirm_password = $_POST['confirmpassword'];
            $password = $_POST['password']; 
            $name = $_POST['name'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            if ($password !== $confirm_password) {
                echo "<script>alert('Mật khẩu và xác nhận mật khẩu không khớp!');</script>";
            } else {
            $update = $get_data->update_user( $password, $name, $sdt, $email,$role , $id);
            
            if ($update) {
                echo "<script>alert('Thành công');window.location='danhsachuser.php';</script>";
            } else {
                echo "<script>alert('Thất bại');</script>";
            }
            }
        }
    ?>
</form>
    </div>

</div>
</body>
</html>