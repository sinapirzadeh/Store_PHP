<?php
use UserManages\UserController;
$user_controller = new UserController;
$user_controller->logout();
header('location: index.php');