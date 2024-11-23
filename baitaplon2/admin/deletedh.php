<?php
            include('control.php');
            $get_data = new data_dienthoai();
            $id = $_GET['del'];
            $delete_h= $get_data->delete_dh($id);  
            header("location:danhsachdh.php");
                if($delete_h) echo "<script>alert('Xóa thành công');</script>";
                else echo "<script>alert('Xóa thất bại');</script>"; 
?>