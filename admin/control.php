<?php
        include("connect.php");
        class data_dienthoai{
            public function selectdt(){
                global $conn;
                $sql="select dienthoai.*, hang.tenhang from dienthoai join hang on dienthoai.idhang = hang.idhang";
                $run=mysqli_query($conn,$sql);
                $result = [];
                while ($row = mysqli_fetch_assoc($run)) {
                    $result[] = $row;
                }  
                return $result; 
            }
            public function insert_dienthoai($ten, $idhang, $hedieuhanh, $cpu, $gpu, $ram, $rom, $camsau, $camtruoc,$tamnen, $dophangiai, $rong, $pin , $sac, $gia, $urlhsp, $urlhts, $urlhqc,$linkrv) {
                global $conn;
                $sql = "INSERT INTO dienthoai (ten, idhang, hedieuhanh, cpu, gpu, ram, rom, camsau, camtruoc,tamnen,dophangiai,rong,pin,sac, gia, hinhsp, hinhthongso, hinhqc,linkrv)
                        VALUES ('$ten', '$idhang', '$hedieuhanh', '$cpu', '$gpu', '$ram', '$rom', '$camsau', '$camtruoc','$tamnen', '$dophangiai', '$rong ', '$pin' , '$sac ', '$gia', '$urlhsp', '$urlhts', '$urlhqc', '$linkrv')";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function delete_dienthoai($id) {
                global $conn;
                $sql = "DELETE FROM dienthoai WHERE id = $id";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
             
            public function select_dt_id($id){
                global $conn;
                $sql="select dienthoai.*, hang.tenhang from dienthoai join hang on dienthoai.idhang = hang.idhang where id = $id";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function select_dt_hang($idhang){
                global $conn;
                $sql="select * from dienthoai where idhang = $idhang";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function select_hang(){
                global $conn;
                $sql="select * from hang";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function insert_hang($tenhang)
            {
                global $conn;
                $sql="INSERT INTO hang( tenhang) VALUES
                 ('$tenhang')";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function delete_hang($id){
                global $conn;
                $sql="delete  from hang where idhang = $id";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function select_hang_id($id){
                global $conn;
                $sql="select * from hang where idhang = $id";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function update_hang($tenhang,$id)
            {
                global $conn;
                $sql="update hang set tenhang ='$tenhang' where idhang = $id";
                $run=mysqli_query($conn,$sql);
                echo $sql;
                return $run;
            }
            public function sapxepasc(){
                global $conn;
                $sql="select * from dienthoai order by gia asc";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function sapxepdesc(){
                global $conn;
                $sql="select * from dienthoai order by gia desc";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function update_dt($ten, $hang, $hedieuhanh, $cpu, $gpu, $ram, $rom, $camsau, $camtruoc, $gia, $id, $urlhsp, $urlhts, $urlhqc,$linkrv){
                global $conn;
                $sql = "UPDATE dienthoai 
                        SET ten = '$ten', 
                            idhang = '$hang', 
                            hedieuhanh = '$hedieuhanh', 
                            cpu = '$cpu', 
                            gpu = '$gpu', 
                            ram = '$ram', 
                            rom = '$rom', 
                            camsau = '$camsau', 
                            camtruoc = '$camtruoc', 
                            gia = '$gia', 
                            hinhsp = '$urlhsp', 
                            hinhthongso = '$urlhts', 
                            hinhqc = '$urlhqc',
                            linkrv = '$linkrv'
                        WHERE id = $id";
                $run = mysqli_query($conn, $sql);
                echo $sql;
                return $run;
            }
            public function insert_user($username, $password, $name, $sdt, $email, $role ) {
                global $conn;
                $check_sql = "SELECT * FROM user WHERE username = '$username'";
                $check_result = mysqli_query($conn, $check_sql);
                
                if (mysqli_num_rows($check_result) > 0) {
                    return "Username already exists";
                }
                $sql = "INSERT INTO user (username, pass, name, sdt, email, role) 
                        VALUES ('$username', '$password', '$name', '$sdt', '$email', '$role')";
                  $insert_result = mysqli_query($conn, $sql);
                  return $insert_result ? true : false;
            }
            
            public function check_user($username, $password) {
                global $conn;
                $sql = "SELECT * FROM user WHERE username = '$username' AND pass = '$password'";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    die("Query failed: " . mysqli_error($conn));
                }
                return mysqli_fetch_assoc($result);
            }
            public function select_user(){
                global $conn;
                $sql="select * from user";
                $run=mysqli_query($conn,$sql);
                $result = [];
                while ($row = mysqli_fetch_assoc($run)) {
                    $result[] = $row;
                }  
                return $result; 
            }
            public function delete_user($id) {
                global $conn;
                $sql = "DELETE FROM user WHERE id = $id";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            
            public function select_user_by_id($id) {
                global $conn;
                $sql = "SELECT * FROM user WHERE id = $id";
                $run = mysqli_query($conn, $sql);
                return $run; 
            }
            public function select_user_by_username($username) {
                global $conn;
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $run = mysqli_query($conn, $sql);
                return $run; 
            }
            
            public function update_user($pass, $name, $sdt, $email, $role, $id) {
                global $conn;
                $sql = "UPDATE user 
                        SET     pass = '$pass', 
                            name = '$name', 
                            sdt = '$sdt', 
                            email = '$email', 
                            role = '$role' 
                        WHERE id = $id";
                $run = mysqli_query($conn, $sql);   
                return $run;
            }
            public function select_us_tk($key) {
                global $conn;
                $sql = "select * from user where sdt = '$key' or email = '$key' or username like '%$key%' or name like '%$key%'";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function update_role_admin($id) {
                global $conn;
                $sql = "UPDATE user 
                        SET role = '1' 
                        WHERE id = $id";
                $run = mysqli_query($conn, $sql);   
                return $run;
            }
            public function update_role_khach($id) {
                global $conn;
                $sql = "UPDATE user 
                        SET role = '0' 
                        WHERE id = $id";
                $run = mysqli_query($conn, $sql);   
                return $run;
            }
            public function searchProduct($key) {
                global $conn;
                $key = mysqli_real_escape_string($conn, $key);
                $key = "%" . $key . "%";
                $sql = "
                SELECT dienthoai.*, hang.tenhang 
                FROM dienthoai 
                JOIN hang ON dienthoai.idhang = hang.idhang 
                WHERE dienthoai.ten LIKE ? OR hang.tenhang LIKE ? ";   
                $stmt = mysqli_prepare($conn, $sql);
            
                if (!$stmt) {
                    die("Lỗi chuẩn bị truy vấn: " . mysqli_error($conn)); 
                }
                mysqli_stmt_bind_param($stmt, "ss", $key, $key);
            
                if (!mysqli_stmt_execute($stmt)) {
                    die("Lỗi thực thi truy vấn: " . mysqli_stmt_error($stmt));
                }
                $result = mysqli_stmt_get_result($stmt);
                $products = $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
                mysqli_stmt_close($stmt);
                return $products;
            }
            
            public function selectBannerQC() {
                global $conn;
                $sql = "SELECT * FROM quangcao";
                $run=mysqli_query($conn,$sql);
                $result = [];
                    while ($row = mysqli_fetch_assoc($run)) {
                        $result[] = $row;
                    }
                    return $result; 
            }
            public function getBanner() {
                global $conn;
                $sql = "SELECT idqc, hinh, id FROM quangcao";
                $result = mysqli_query($conn, $sql);
            
                return $result;

            }
            public function insert_dh($tenkh, $sdt, $dc, $mathang, $giatridon,$id,$mavandon,$pttt) {
                global $conn;
                $sql = "INSERT INTO donhang (tenkh, sdt , dc , mathang , giatridon,username,mavandon,ptthanhtoan)
                        VALUES ('$tenkh', '$sdt', '$dc', '$mathang', '$giatridon','$id','$mavandon','$pttt')";
                $run = mysqli_query($conn, $sql);
                return $run;

            }
            public function select_dh() {
                global $conn;
                $sql = "select * from donhang ";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function select_dh_tk($key) {
                global $conn;
                $sql = "select * from donhang where mavandon = '$key' or sdt = '$key' or tenkh like '%$key%'";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function delete_dh($id) {
                global $conn;
                $sql = "delete from donhang where iddh = $id";
                $run = mysqli_query($conn, $sql);
                return $run;

            }
            public function update_dh($iddh,$ttd,$time)
            {
                global $conn;
                $sql="update donhang set tinhtrangdon ='$ttd', `timeupd` = '$time' where iddh = $iddh";
                $run=mysqli_query($conn,$sql);
                echo $sql;
                return $run;
            }
            public function select_dh_damua($username) {
                global $conn;
                $sql = "select * from donhang where username = '$username' ";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function select_dh_bymvd($mavandon) {
                global $conn;
                //$sql = "select * from donhang where mavandon = '$mavandon' or sdt = '$mavandon' ";
                $sql = "select * from donhang where mavandon = '$mavandon' ";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function select_dh_dagiao( $start_date, $end_date) {
                global $conn;
                $sql = "SELECT * FROM donhang 
                        WHERE tinhtrangdon = 2 
                        AND timeupd BETWEEN '$start_date' AND '$end_date'";
            
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function sum_giatridon($start_date , $end_date ) {
                global $conn;
                $sql = "SELECT SUM(giatridon) as total FROM donhang WHERE timeupd BETWEEN '$start_date' AND '$end_date' AND tinhtrangdon = 2";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                return $data['total'];
            }
            
            public function selectqc(){
                global $conn;
                $sql="select quangcao.*, dienthoai.ten from quangcao join dienthoai on quangcao.id = dienthoai.id ";
                $run=mysqli_query($conn,$sql);
                $result = [];
                while ($row = mysqli_fetch_assoc($run)) {
                    $result[] = $row;
                }  
                return $result; 
            }
            public function insert_qc($id, $hinh) {
                global $conn;
                $sql = "INSERT INTO quangcao(id,hinh)
                        VALUES ($id, '$hinh')";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
            public function delete_qc($id) {
                global $conn;
                $sql = "DELETE FROM quangcao WHERE idqc = $id";
                $run = mysqli_query($conn, $sql);
                return $run;
            }
             
            public function select_qc_id($id){
                global $conn;
                $sql="select quangcao.*, dienthoai.ten from quangcao join dienthoai on quangcao.id = dienthoai.id where idqc = $id";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function update_qc($idqc,$id,$hinh)
            {
                global $conn;
                $sql="update quangcao set id = $id ,hinh = '$hinh'  where idqc = $idqc";
                $run=mysqli_query($conn,$sql);
                echo $sql;
                return $run;
            }
            public function select_homthu(){
                global $conn;
                $sql="select * from homthu";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function insert_homthu($ten ,$sdt,$email,$tieude,$nd) {
                global $conn;
                $sql = "INSERT INTO homthu(tennggui,sdt,email,tieude,noidung)
                        VALUES ('$ten','$sdt','$email','$tieude','$nd')";
                $run = mysqli_query($conn, $sql);
                echo $sql;
                return $run;
            }
            public function insert_cmt($id, $ten,$sao ,$cmt) {
                global $conn;
                $sql = "INSERT INTO binhluan(id,tenngbl,sao,noidung)
                        VALUES ($id, '$ten','$sao','$cmt')";
                $run = mysqli_query($conn, $sql);
                echo $sql;
                return $run;
            }
            public function select_bl($id){
                global $conn;
                $sql="select * from binhluan where id = $id";
                $run=mysqli_query($conn,$sql);
                return $run;
            }
            public function check_tracking_code_exists($code) {
                global $conn;
                $sql = "SELECT COUNT(*) as count FROM donhang WHERE mavandon = '$code'";
                $result = $conn->query($sql);
                
                if ($result) {
                    $row = $result->fetch_assoc();
                    return $row['count'] > 0; 
                } else {
                    return false;
                }
            }

            
        }
        
?>