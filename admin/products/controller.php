<style>
    * {
        direction: rtl;
        font-family: 'shabnam';
    }

    .user-form-addoredit {
        display: block;
        margin: 40px;
        width: 30%;
        display: grid;
    }

    .user-form-addoredit>h3 {
        text-align: center;
        margin: 20px;
    }

    .user-form-addoredit>input {
        padding: 20px;
        border: 1px solid gray;
        border-radius: 10px;
        outline: 0;

    }

    .user-form-addoredit>button {
        background-color: #17A2B8;
        padding: 20px;
        width: auto;
        color: white;
        border-radius: 10px;
    }

    .content {
        display: flex;
        justify-content: center;
    }
</style>
<?php
use Product\Services;

$service = new Services;
$id = $_POST['category_id'];

if (array_key_exists('btn_delete', $_POST)) {
    $service->delete($id);
    header('location: admin.php');
} else if (array_key_exists('btn_add', $_POST)) {
    $service->add($_POST['title'], $_POST['price'], $_POST['image'], $_POST['category_id']);
    header('location: admin.php');
} else if (array_key_exists('btn_edit', $_POST)) {
    $result = $service->show($id);
    $result_cate = $service->show_all("categories") ?>

            <div class="content">
                <form class="user-form-addoredit" enctype="multipart/form-data" action="#" method="post">
                    <h3>ویرایش محصول</h3>
                    <input type="text" name="name" id="name" value="<?php echo $_POST['name'] ?>"
                        placeholder="نام محصول را وارد کنید :"><br>
                    <input type="text" name="price" id="price" value="<?php echo $_POST['price'] ?>"
                        placeholder="قیمت محصول را وارد کنید :"><br>
                    <input type="file" name="image" id="image_file_product"><br>
                    <select name="category">
                        <option value="first" data-pos="first">دسته بندی را انتخاب کنید</option>
                <?php foreach ($result_cate as $select) { ?>
                            <option value="<?php echo $select['category_id'] ?>">
                        <?php echo $select['title'] ?>
                            </option>
                <?php } ?>
                    </select><br>

                    <button type="submit">ویرایش</button>
                </form>
                <div class="box_img">
                    <img width="500" src="<?php echo $edit_img ?>" alt="">
                </div>
            </div>
        <?php
        if (!empty($_POST['name'])) {
            $service->edit($id, $_POST['name'], $_POST['price'], $_POST['image'], $_POST['category']);
            header('location: admin.php');
        }
}
?>