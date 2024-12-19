
    <?php
    include('control.php');
    $get_data = new data_dienthoai(); 
        if (isset($_POST['updatedh'])) {
            $tinhtrangdon = $_POST['tinhtrangdon'];
            $iddh = $_POST['iddh'];
            $time = $_POST['time'];
            $update = $get_data->update_dh($iddh,$tinhtrangdon,$time);
            if ($update) {
                echo "<script>alert('Thành công');window.location='danhsachdh.php';</script>";
            } else {
                echo "<script>alert('Thất bại');</script>";
            }
        }
    ?>