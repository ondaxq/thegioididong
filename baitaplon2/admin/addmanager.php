<?php
            include('control.php');
            $get_data = new data_dienthoai();
            $id = $_GET['addrole'];
            $add_role= $get_data->update_role_manager($id);  
                header("location:danhsachuser.php");
                if($add_role) echo "<script>alert('Cấp quyền thành công');</script>";
                else echo "<script>alert('Thất bại');</script>"; 
?>