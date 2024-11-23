<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>

        <?php
            include('../admin/control.php');
            $get_data = new data_dienthoai();
            $search_keyword = htmlspecialchars(strip_tags(trim($_POST['inputSearch'] ?? '')));
            if ($search_keyword) {
                $random_products = $get_data->searchProduct($search_keyword);  
            } else {
                $random_products = $get_data->selectdt(); 
            }
            
            $total_products = count($random_products);  
        ?>
        <div class="goiy">
            <h2>Từ khóa: <?php echo $search_keyword; ?></h2>
            <p>Có <?php echo $total_products; ?> sản phẩm</p>
            <?php if ($total_products > 0): ?>
                <?php for ($i = 0; $i < ceil($total_products / 5); $i++): ?> 
                <div class="hang1">
                    <?php for ($j = 0; $j < 5; $j++): ?>
                        <?php
                            $index = $i * 5 + $j;
                            if (isset($random_products[$index])):
                                $dt = $random_products[$index];
                        ?>
                        <div class="goiy1">
                            <p>Trả góp 0%</p>
                            <a href="chitietsanpham.php?id=<?php echo $dt['id']; ?>">
                                <img src="../img/<?php echo $dt['hinhqc']; ?>" alt="" class="goiyimg">
                            </a>
                            <a href="chitietsanpham.php?id=<?php echo $dt['id']; ?>">
                                <?php echo $dt['tenhang'] . ' ' . $dt['ten'] . ' ' . $dt['ram'] . "GB/" . $dt['rom'] . "GB"; ?>
                            </a>
                            <p class="gia"><?php echo $dt['gia']; ?>₫</p>
                        </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <?php endfor; ?>
            <?php else: ?>
                <p>Không tìm thấy sản phẩm nào với từ khóa "<?php echo $search_keyword; ?>"</p>
            <?php endif; ?>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
