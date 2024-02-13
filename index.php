<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuickTXT <?php if(!isset($_GET['buy'])) { echo "> ".$_GET['page'].""; } ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5efd6bd50f.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Kanit", sans-serif;
        }
    </style>
</head>

<body>
    <?php if(!isset($_GET['buy'])) : ?>
    <nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b><i class="fa-solid fa-bolt"></i>&nbsp;QuickTXT</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if($_GET['page'] == 'shop'){ echo 'active'; } ?>" href="?page=shop"><i class="fa-solid fa-shop"></i>&nbsp;ร้านค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_GET['page'] == 'managetype'){ echo 'active'; } ?>" href="?page=managetype"><i class="fa-solid fa-box"></i>&nbsp;จัดการประเภทสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_GET['page'] == 'manageproduct'){ echo 'active'; } ?>" href="?page=manageproduct"><i class="fa-solid fa-boxes-stacked"></i>&nbsp;จัดการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_GET['page'] == 'credit'){ echo 'active'; } ?>" href="?page=credit"><i class="fa-solid fa-credit-card"></i>&nbsp;จำลองบัตรเครดิต</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>
    <?php
        if(isset($_GET['page'])){
            include './page/'.$_GET["page"].'.php';
        } elseif(isset($_GET['buy'])) {
            include 'buy.php';
        } else {
            header('location: ?page=shop');
        }
    ?>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-body-secondary">© 2023 JIRATHX | Project สำหรับ Portfolio เท่านั้น</span>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>