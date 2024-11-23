<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại</title>
</head>
<body>
    <div class="container">
<?php  include'header.php' ?>
<?php
    include('../admin/control.php');
    $get_data = new data_dienthoai();
    $select_dt = $get_data->selectdt(); 
    $brand_filter = isset($_GET['brand']) ? $_GET['brand'] : '';
    if ($brand_filter) {
        $select_dt = array_filter($select_dt, function($dt) use ($brand_filter) {
            return strtolower($dt['tenhang']) == strtolower($brand_filter);
        });
    }
    $sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc'; 
    if ($sort_order === 'asc') {
        usort($select_dt, function($a, $b) {
            return $a['gia'] <=> $b['gia'];
        });
    } elseif ($sort_order === 'desc') {
        usort($select_dt, function($a, $b) {
            return $b['gia'] <=> $a['gia'];
        });
    }
    $total_products = count($select_dt); 
?>
        <div class="goiy">
            <h2>Điện thoại</h2>
            <p>Có <?php echo $total_products; ?>  sản phẩm</p>
            <a href="dtdd.php?brand=Samsung" class="brand-link <?php echo ($brand_filter == 'Samsung') ? 'selected-link' : ''; ?>">
                <img class="imghang <?php echo ($brand_filter == 'Samsung') ? 'selected' : ''; ?>" src="../img/samsung.png" alt="">
            </a>
            <a href="dtdd.php?brand=iPhone" class="brand-link <?php echo ($brand_filter == 'iPhone') ? 'selected-link' : ''; ?>">
                <img class="imghang <?php echo ($brand_filter == 'iPhone') ? 'selected' : ''; ?>" src="../img/iphone.png" alt="">
            </a>
            <a href="dtdd.php?brand=OPPO" class="brand-link <?php echo ($brand_filter == 'OPPO') ? 'selected-link' : ''; ?>">
                <img class="imghang <?php echo ($brand_filter == 'OPPO') ? 'selected' : ''; ?>" src="../img/oppo.png" alt="">
            </a>
            <a href="dtdd.php?brand=Xiaomi" class="brand-link <?php echo ($brand_filter == 'Xiaomi') ? 'selected-link' : ''; ?>">
                <img class="imghang <?php echo ($brand_filter == 'Xiaomi') ? 'selected' : ''; ?>" src="../img/xiaomi.png" alt="">
            </a>
            <a href="dtdd.php?brand=realme" class="brand-link <?php echo ($brand_filter == 'realme') ? 'selected-link' : ''; ?>">
                <img class="imghang <?php echo ($brand_filter == 'realme') ? 'selected' : ''; ?>" src="../img/realme.png" alt="">
            </a>
            <div class="sapxep">
                <p>Sắp xếp theo: </p>
                <a href="dtdd.php?sort=asc&brand=<?php echo $brand_filter; ?>" >Giá thấp đến cao</a>
                <a href="dtdd.php?sort=desc&brand=<?php echo $brand_filter; ?>" >Giá cao đến thấp</a>
            </div>
            
            <?php for ($i = 0; $i < ceil($total_products / 5); $i++): ?> 
            <div class="hang1">
                <?php for ($j = 0; $j < 5; $j++): ?>
                    <?php
                        $index = $i * 5 + $j; 
                        if (isset($select_dt[$index])):
                            $dt = $select_dt[$index];
                    ?>
                    <div class="goiy1">
                    <p>Trả góp 0%</p>
                        <a href="chitietsanpham.php?id=<?php echo $dt['id']?>" >
                            <img src="../img/<?php echo $dt['hinhqc'] ?>" alt="" class="goiyimg">
                        </a>
                        <a href="chitietsanpham.php?id=<?php echo $dt['id']?>">
                            <?php echo $dt['tenhang'] . ' ' . $dt['ten'] . ' ' . $dt['ram']."GB" . '/' . $dt['rom']."GB"; ?>
                        </a>
                        <p class="gia"><?php echo $dt['gia']; ?>₫</p>
                    </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php endfor; ?>
        </div>
<?php  include'footer.php' ?>
</div>
</body>
</html>
