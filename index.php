<?php
include('./templates/header.php');
use db\Queries;

$objects = new Queries;
$result = $objects->select(table: 'products', limit: 4);
$sql_cate = $objects->select(table: 'categories', limit: 2);
?>
<main>
    <section id="category">
        <div class="container">
            <div class="category-head">
                <h2>دسته بندی ها</h2>
            </div>
            <div class="row">
                <?php foreach ($sql_cate as $category) { ?>
                    <div class="col-md-6">
                        <div class="category-cart">
                            <img src="<?php echo $category['image_url'] ?>">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section id="product">
        <div class="container">
            <div class="category-head">
                <h2>محصولات پرفروش</h2>
            </div>
            <div class="row">
                <?php foreach ($result as $top_product) { ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="cart">
                            <img src="./assets/images/product.webp">
                            <h3>
                                <?php echo htmlspecialchars($top_product['name']) ?>
                            </h3>
                            <div class="cart-btn">
                                <a href="/detail?<?php echo $top_product['product_id'] ?>">مشاهده</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php include('./templates/footer.php') ?>