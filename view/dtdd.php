<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="range-price-filter.css">
    <title>Điện thoại</title>
</head>
<body>
    <div class="container">
<?php  include'header.php' ?>
        <?php
        include ('../admin/control.php');
        $get_data = new data_dienthoai();
        $select_dt = $get_data->selectdt();


        foreach ($select_dt as &$dt) {
            $dt['gia_number'] = (int)str_replace(',', '', $dt['gia']);
        }
        unset($dt);

        $brand_filter = isset($_GET['brand']) ? $_GET['brand'] : '';
        if ($brand_filter) {
            $select_dt = array_filter($select_dt, function($dt) use ($brand_filter) {
                return strtolower($dt['tenhang']) == strtolower($brand_filter);
            });
        }

        $min_price = isset($_GET['min-price']) ? (int)$_GET['min-price'] : 0;
        $max_price = isset($_GET['max-price']) ? (int)$_GET['max-price'] : PHP_INT_MAX;

        $select_dt = array_filter($select_dt, function($dt) use ($min_price, $max_price) {
            return $dt['gia_number'] >= $min_price && $dt['gia_number'] <= $max_price;
        });

        $sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
        if ($sort_order === 'asc') {
            usort($select_dt, function($a, $b) {
                return $a['gia_number'] <=> $b['gia_number'];
            });
        } elseif ($sort_order === 'desc') {
            usort($select_dt, function($a, $b) {
                return $b['gia_number'] <=> $a['gia_number'];
            });
        }

        $total_products = count($select_dt);

        ?>


        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const togglePrice = document.querySelector(".toggle-price");
                const priceContainer = document.querySelector(".price-container");
                const cancelBtn = document.querySelector(".cancel-price");
                const rangeInputs = document.querySelectorAll(".range-price input");
                const numberInputs = document.querySelectorAll(".price-field input");
                const progress = document.querySelector(".slider-price .progress");
                const priceGap = 5000000;
                togglePrice.addEventListener("click", () => {
                    priceContainer.classList.toggle("hidden");

                });

                const updateRange = (minVal, maxVal) => {
                    progress.style.left = (minVal / rangeInputs[0].max) * 100 + "%";
                    progress.style.right = 100 - (maxVal / rangeInputs[1].max) * 100 + "%";
                };

                rangeInputs.forEach((input) => {
                    input.addEventListener("input", (e) => {
                        let minVal = parseInt(rangeInputs[0].value);
                        let maxVal = parseInt(rangeInputs[1].value);

                        if (maxVal - minVal < priceGap) {
                            if (e.target.classList.contains("range-min")) {
                                rangeInputs[0].value = maxVal - priceGap;
                            } else {
                                rangeInputs[1].value = minVal + priceGap;
                            }
                        } else {
                            updateRange(minVal, maxVal);
                            numberInputs[0].value = minVal;
                            numberInputs[1].value = maxVal;
                        }
                    });
                });

                numberInputs.forEach((input) => {
                    input.addEventListener("input", (e) => {
                        let minVal = parseInt(numberInputs[0].value);
                        let maxVal = parseInt(numberInputs[1].value);

                        if (maxVal - minVal >= priceGap && maxVal <= 63000000) {
                            if (e.target.classList.contains("input-min")) {
                                rangeInputs[0].value = minVal;
                            } else {
                                rangeInputs[1].value = maxVal;
                            }
                            updateRange(minVal, maxVal);
                        }
                    });
                });


                cancelBtn.addEventListener("click", () => {
                    priceContainer.classList.add("hidden");

                });


                updateRange(parseInt(rangeInputs[0].value), parseInt(rangeInputs[1].value));
            });

        </script>
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
            <div class="locgia">
                <p class="toggle-price">Khoảng giá:</p>
                <div class="price-container hidden">
                    <div class="group-filter">
                    <form method="GET" action="dtdd.php" class="price-form">
                        <div class="price-input">

                            <div class="price-field">

                                <input type="number" class="input-min" name="min-price" value="12500000">
                                <div class="separator">-</div>
                                <input type="number" class="input-max" name="max-price" value="45000000">
                            </div>
                        </div>
                        <div class="slider-price">
                            <div class="progress"></div>
                        </div>
                        <div class="range-price">
                            <input type="range" class="range-min" min="0" max="63000000" value="12500000" step="500000">
                            <input type="range" class="range-max" min="0" max="63000000" value="45000000" step="500000">
                        </div>
                        <div class="price-buttons">
                            <button type="button" class="cancel-price">Hủy</button>
                            <button type="submit" class="confirm-price">Xem kết quả</button>

                        </div>
                    </form></div>
                </div>
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
