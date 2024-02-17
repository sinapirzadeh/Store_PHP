<?php
include("templates/header.php");
use UserManages\UserController;

if (isset($_POST['submit'])) {
    $user_controller = new UserController;
    $result = $user_controller->login($_POST['username'], $_POST['password']);
    if ($result)
        header('location: admin.php');
    else
        header('location: index.php');
}
?>
<style>
    .slider {
        display: none;
    }
</style>
<main>
    <section id="login">
        <div class="container">
            <form class="user-form" action="auth/views/login.php" method="post">
                <h3>ورود به سایت</h3>
                <input type="text" name="username" placeholder="نام کاربری">
                <input type="password" name="password" placeholder="کلمه عبور">
                <button name="submit" type="submit">ورود به سایت</button>
                <p>حساب کاربری ندارید؟ <a href="auth/views/register.php">ثبت نام کنید.</a></p>
            </form>
        </div>
    </section>
</main>
<?php include("./templates/footer.php"); ?>