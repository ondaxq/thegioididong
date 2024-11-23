<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách user</title>
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
    <h1>Danh sách user</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Quyền</th>
            <th colspan="3">Phân quyền</th>
            <th colspan="2">Tùy chọn</th>
        </tr>
        <tr>
            <?php
                include('control.php');  
                $get_data = new data_dienthoai(); 
                $select_user = $get_data->select_user(); 
                foreach($select_user as $dt) {
            ?>
                <td><?php echo $dt['id'] ?></td>
                <td><?php echo $dt['username'] ?></td>
                <td><?php echo $dt['name'] ?></td>
                <td><?php echo $dt['sdt'] ?></td>
                <td><?php echo $dt['email'] ?></td>
                <td>
                    <?php 
                        if ($dt['role'] == 1) {
                            echo "Admin";
                        } elseif ($dt['role'] == 2) {
                            echo "Manager";
                        } else {
                            echo "Khách";
                        }
                    ?>
                </td>
                <td><a href="addadmin.php?addrole=<?php echo $dt['id']?>" 
                 onClick="if(confirm('Bạn có chắc chắn cấp quyền Admin?')) return true; else return false;">Admin</a></td>
                <td><a href="addmanager.php?addrole=<?php echo $dt['id']?>" 
                onClick="if(confirm('Bạn có chắc chắn cấp quyền Manager?')) return true; else return false;">Manager</a></td>
                <td><a href="addkhach.php?addrole=<?php echo $dt['id']?>" 
                onClick="if(confirm('Bạn có chắc chắn cấp quyền Khách?')) return true; else return false;">Khách</a></td>
                <td><a href="deleteus.php?del=<?php echo $dt['id']?>" 
                    onClick="if(confirm('Bạn có chắc chắn xóa?')) return true; else return false;">Xóa</a></td>
                <td><a href="updateus.php?up=<?php echo $dt['id']?>">Sửa</a></td>
            </tr>
            <?php } ?>
    </table>
    </div>

</div>
</body>
</html>