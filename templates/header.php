<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sina pirzadeh</title>
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
</head>
<body>
    <header id="header">   
            <nav class="nav-bar">
            <div class="site-logo">
                <a href="/index.php">
                    <img width="200" src="./assets/images/logo.png">
                </a>
            </div>
            <ul class="nav-items">
                <li class="nav-item"><a href="./index.php">صفحه اصلی</a></li>
                <li class="nav-item"><a href="./products.php">محصولات</a></li>
                <li class="nav-item"><a href="./about.php">درباره ما</a></li>
                <li class="nav-item"><a href="./contact.php">تماس با ما</a></li>
            </ul>
            <div class="search-bar">
                <form method="" action="">
                    <input id="search" type="search" name="search">
                    <input id="btn-search" type="submit" name="search_resutl" value="جست و جو">
                </form>
            </div>
            <?php 
            if (isset($_COOKIE['user_id'])) {
                if ($_COOKIE['user_role'] == 0) {
                    echo '<a href="/cart/views/cart.php"><li><img width="30" src="./assets/icons/cart.png"></li></a>';
                    echo '<div class="login"><a href="admin.php">ادمین</a></div>';
                } else {
                    echo '<div class="login"><a href="#">'. $_COOKIE['username'] .'</a></div>';
                    echo '<div class="login"><a href="/auth/views/logout.php">خروج</a></div>';
                }
            } else echo '<div class="login"><a href="/auth/views/login.php">ورود</a></div>';
            ?>
            </nav>

            <div class="slider"></div>
    </header>


