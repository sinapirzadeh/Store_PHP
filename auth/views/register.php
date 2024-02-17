<?php
include("templates/header.php");
use UserManages\UserController;

if (isset($_POST['submit'])) {
    $user_controller = new UserController;
    $result = $user_controller->register($_POST['username'], $_POST['full_name'], $_POST['password'], $_POST['confirm-password']);
    if ($result)
        header('location: auth/views/login.php');
}
?>
<style>
    .slider {
        display: none;
    }
</style>
<main>
    <section id="login">
        <form class="user-form" action="auth/views/register.php" method="post">
            <h3>ثبت نام در سایت</h3>
            <input type="text" name="full_name" placeholder="نام">
            <input type="text" name="username" placeholder="نام کاربری">
            <input type="password" name="password" placeholder="کلمه عبور">
            <input type="password" name="confirm-password" placeholder="تکرار کلمه عبور">
            <button name="submit" type="submit">ثبت نام کاربر جدید</button>
            <p>حساب کاربری دارید؟ <a href="auth/views/login.php">وارد سایت شوید.</a></p>
        </form>
    </section>
</main>
<?php include("templates/footer.php"); ?>