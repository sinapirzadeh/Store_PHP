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
use Category\Services;

$service = new Services;
$id = $_POST['category_id'];

if (array_key_exists('btn_delete', $_POST)) {
    $service->delete($id);
    header('location: admin.php');
} else if (array_key_exists('btn_add', $_POST)) {
    $service->add($_POST['title'], $_POST['image']);
    header('location: admin.php');
} else if (array_key_exists('btn_edit', $_POST)) {
    $result = $service->show($id); ?>

            <div class="content">
                <form enctype="multipart/form-data" class="user-form-addoredit" action="#" method="post">
                    <h3>ویرایش دسته بندی</h3>
                    <input type="text" name="title" id="title" value="<?php echo $result['title'] ?>"
                        placeholder="نام دسته بندی را وارد کنید :"><br>
                    <input type="file" name="image" id="image_file_category"><br>
                    <button type="submit">ویرایش</button>
                </form>

                <div class="box_img">
                    <img width="500" src="<?php echo $result['image_url'] ?>">
                </div>
            </div>


        <?php
        if (!empty($_POST['title'])) {
            $service->edit($id, $_POST['title'], $_POST['image']);
            header('location: admin.php');
        }
}
?>