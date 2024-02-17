<?php
include('./templates/header.php');
use db\Queries;

$products = new Queries;
$result = $products->select(table: 'products');
?>
<style>
    .slider {
        display: none;
    }
</style>
<main>
    <section id="products">
        <div class="container">
            <div class="page-title">
                <h1>محصولات سایت</h1>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="filter">
                        <h4>دسته بندی ها</h4>
                        <ul>
                            <li><input type="checkbox">مبلمان</li>
                            <li><input type="checkbox">راحتی</li>
                            <li><input type="checkbox">کاری</li>
                            <li><input type="checkbox">غذاخوری</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <?php foreach ($result as $product) { ?>
                            <div class="cart_product">
                                <div class="cart-image">
                                    <img src="<?php echo $product['image_url'] ?>" alt="p1">
                                </div>
                                <div class="cart-title">
                                    <h3>
                                        <?php echo htmlspecialchars($product['name']) ?>
                                    </h3>
                                </div>
                                <div class="cart-price">
                                    قیمت :
                                    <?php echo htmlspecialchars($product['price']) ?> تومان
                                </div>
                                <div class="cart-add">
                                    <a href="/detail.php?product_id=<?php echo $product['product_id'] ?>">مشاهده محصول</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include('./templates/footer.php') ?>