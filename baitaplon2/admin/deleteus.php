<?php
            include('control.php');
            $get_data = new data_dienthoai();
            $id = $_GET['del'];
            $delete_us= $get_data->delete_user($id);  
                header("location:danhsachuser.php");
                if($delete_us) echo "<script>alert('Xóa thành công');</script>";
                else echo "<script>alert('Xóa thất bại');</script>"; 
?>