<?php
            include('control.php');
            $get_data = new data_dienthoai();
            $id = $_GET['del'];
            $delete_dt= $get_data->delete_qc($id);  
                header("location:danhsachqc.php");
                if($delete_dt) echo "<script>alert('Xóa thành công');</script>";
                else echo "<script>alert('Xóa thất bại');</script>"; 
?>