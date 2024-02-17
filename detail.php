<?php
include('templates/header.php');

use Product\Services;

$id = $_GET['product_id'];
$product = new Services;
$show = $product->show($id);
?>

<style>.slider {display: none;}.box_detail
{text-align: center;margin: 40px;padding: 20px;border-radius: 10px;}
.buy_btn {border: 1px solid grey;border-radius: 10px;padding: 10px;transition: 1s;}
.buy_btn:hover {background-color: cornflowerblue;color: white;
transition: 1s;border: 1px solid cornflowerblue;}</style>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box_detail">
                    <img width="400" src="<?php echo $show['image_url'] ?>" alt=""><br>
                    <h3><?php echo $show['name'] ?></h3><br>
                    <p><?php echo $show['price'] ?></p><br>
                    <?php if(isset($_COOKIE['username'])) { ?>
                        <a class="buy_btn" href="/cart/views/addordelete.php?product_id=<?php echo $id ?>">اضافه کردن به سبد خرید</a>
                    <?php } else { ?>
                        <script>alert('اول وارد سایت شو بعد خرید کن عزیز دلم :))))')</script>
                        <p style="color:red;font-size: 30px;text-aling: center;">اول login شو داشم</p>
                        <a stype="color: #0b4bdb;" href="/auth/view/login.php">بریم لاگ این شیم</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script></script>
<?php include('templates/footer.php') ?>