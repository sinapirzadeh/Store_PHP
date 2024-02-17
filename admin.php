<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
</head>

<body>
    <main>
        <div class="container-nrl">
            <div class="row">
                <div class="col-3">
                    <div class="r_nav">
                        <h2>سایت سینا</h2>
                        <ul>
                            <a onblur="open_dashbord()" onclick="open_dashbord()">
                                <li><img src="./assets/icons/home-48.png">داشبورد</li>
                            </a>
                            <a onclick="open_user()">
                                <li><img src="./assets/icons/user-48.png">مدیریت کاربران</li>
                            </a>
                            <a onclick="open_category()">
                                <li><img src="./assets/icons/category-48.png">مدیریت دسته بندی ها</li>
                            </a>
                            <a onclick="open_product()">
                                <li><img src="./assets/icons/product-48-d.png">مدیریت محصولات</li>
                            </a>
                            <a href="auth/views/logout.php">
                                <li><img src="./assets/icons/3889524.png">خروج</li>
                            </a>
                        </ul>
                    </div>
                </div>

                <div class="col-9">
                    <nav class="top-nav">
                        <ul>
                            <li><a href="/index.php"><img src="./assets/icons/home-48.png" alt="home-icon"></a></li>
                            <li><a href="#"><img src="./assets/icons/user-48.png" alt="user-icon"></a></li>
                            <li><a href="#"><img src="./assets/icons/notification-48.png" alt="notif-icon"></a></li>
                        </ul>
                    </nav>

                    <section class="main">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="dashbord">
                                    <img src="./assets./images/admin_page1.webp" alt="">
                                </div>

                                <div class="table-wrap" style="display: none" id="product_manage">
                                    <br>
                                    <h2>مدیریت محصولات</h2><br>
                                    <button class="btn-p btn-add" id="myBtn"><img width="35"
                                            src="./assets/icons/add-48.png">افزودن محصول</button><br>
                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">
                                        <?php
                                        use Product;

                                        $product = new Product\Services;
                                        $result = $product->show_all()
                                            ?>
                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                            <form class="user-form-addoredit" enctype="multipart/form-data"
                                                action="/admin/products/controller.php" method="post">
                                                <h3>افزودن محصول جدید</h3>
                                                <input type="text" name="name" id="name"
                                                    placeholder="نام محصول را وارد کنید :"><br>
                                                <input type="text" name="price" id="price"
                                                    placeholder="قیمت محصول را وارد کنید :"><br>
                                                <input type="file" name="image" id="image_file_product"><br>
                                                <select name="category">
                                                    <option value="first" data-pos="first">دسته بندی را انتخاب کنید
                                                    </option>
                                                    <?php foreach ($result as $select) { ?>
                                                        <option value="<?php echo $select['category_id'] ?>">
                                                            <?php echo $select['title'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select><br>
                                                <button name="btn_add" type="submit">افزودن</button>
                                            </form>
                                        </div>

                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>شناسه</th>
                                                <th>نام</th>
                                                <th>قیمت</th>
                                                <th>دستورات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result as $product) { ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?php echo htmlspecialchars($product['product_id']) ?>
                                                    </th>
                                                    <td>
                                                        <?php echo htmlspecialchars($product['name']) ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($product['price']) ?> تومان
                                                    </td>
                                                    <td class="btns">
                                                        <a class="btn-p btn_show"
                                                            href="/detail.php?product_id=<?php echo htmlspecialchars($product['product_id']) ?>"><img
                                                                width="30" src="./assets/icons/eye-48-w.png">جزئیات</a>

                                                        <form method="post" action="/admin/products/controller.php">
                                                            <input type="hidden" value="{$product['$product_id']}">
                                                            <input type="submit" value="ویرایش" name="btn_edit"
                                                                class="btn-p btn_edit"><img width="30"
                                                                src="./assets/icons/edit-48-b.png">
                                                            <input type="submit" value="حذف" name="btn_delete"
                                                                class="btn-p btn_delete"><img width="30"
                                                                src="./assets/icons/delete-48-w.png">
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php }
                                            mysqli_free_result($result) ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="table-wrap" style="display: none" id="category_manage">
                                    <br>
                                    <h2>مدیریت دسته بندی ها</h2><br>
                                    <button class="btn-p btn-add" id="myBtn_category"><img width="35"
                                            src="./assets/icons/add-48.png">افزودن دسته بندی
                                    </button><br>

                                    <!-- The Modal -->
                                    <div id="myModal_category" class="modal">

                                        <!-- Modal content -->
                                        <div class="modal-content">
                                            <span id="category_span" class="close">&times;</span>
                                            <form class="user-form-addoredit" enctype="multipart/form-data"
                                                action="/admin/categories/controller.php" method="post">
                                                <h3>افزودن دسته بندی جدید</h3>
                                                <input type="text" name="title" id="title"
                                                    placeholder="نام دسته بندی را وارد کنید :"><br>
                                                <input type="file" name="image" id="image_file_category"><br>
                                                <button name="btn_add" type="submit">افزودن</button>
                                            </form>
                                        </div>

                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>شناسه</th>
                                                <th>تصویر</th>
                                                <th>نام</th>
                                                <th>دستورات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            use Category;

                                            $category = new Category\Services();
                                            $category_result = $category->show_all();
                                            foreach ($category_result as $category) { ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?php echo htmlspecialchars($category['category_id']) ?>
                                                    </th>
                                                    <td><img width="300"
                                                            src="<?php echo $category['image_url'] ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($category['title']) ?>
                                                    </td>
                                                    <td class="btns">
                                                        <form method="post" action="/admin/categories/controller.php">
                                                            <input type="hidden" value="{$category['$category_id']}">
                                                            <input type="submit" value="ویرایش" name="btn_edit"
                                                                class="btn-p btn_edit"><img width="30"
                                                                src="./assets/icons/edit-48-b.png">
                                                            <input type="submit" value="حذف" name="btn_delete"
                                                                class="btn-p btn_delete"><img width="30"
                                                                src="./assets/icons/delete-48-w.png">
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="table-wrap" style="display: none" id="user_manage">
                                    <br>
                                    <h2>مدیریت کاربران</h2><br>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>شناسه</th>
                                                <th>نام کاربری</th>
                                                <th>نام</th>
                                                <th>دسترسی</th>
                                                <th>دستورات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            use User;
                                            $users = new User\Services;
                                            $user_result = $users->show_all();
                                            ?>
                                            <?php foreach ($user_result as $user) { ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?php echo htmlspecialchars($user['user_id']) ?>
                                                    </th>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['username']) ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['full_name']) ?>
                                                    </td>
                                                    <td>
                                                        <?php if (($user['user_role']) == 0) {
                                                            echo "ادمین";
                                                        } else
                                                            echo 'کاربر'; ?>
                                                    </td>
                                                    <td class="btns">
                                                        <form method="post" action="/admin/users/controller.php">
                                                            <input type="hidden" value="{$user['$category_id']}">
                                                            <input type="submit" value="حذف" name="btn_delete"
                                                                class="btn-p btn_delete"><img width="30"
                                                                src="./assets/icons/delete-48-w.png">
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <script src="./assets/js/admin.js"></script>
</body>

</html>