<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: ../view/index.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="header">
        <div class="headerc1">
        <p>Xin chào:  <?php echo isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : 'Khách';?></p>
        <a href="../view/logout.php">Thoát</a>
        </div>
        <div class="headerc2">
        
        </div>
    </div>
</body>
</html>