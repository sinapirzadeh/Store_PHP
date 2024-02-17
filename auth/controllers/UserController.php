<?php
namespace UserManages;

use db\Queries;

class UserController
{
    private static $context;
    public function __construct()
    {
        self::$context = new Queries;
    }


    public function register($username, $full_name, $password, $confirm_password)
    {
        if (empty($username) && empty($password)) {
            echo 'خواهر من, username و password رو وارد کنید تنکیووووو...';
        } else {
            if ($password === $confirm_password && strlen($password) >= 8) {
                self::$context->insert(table: "users", keys: ['username', 'full_name', 'password', 'user_role'], values: [$username, $full_name, $password, 1]);
                return true;
            } else
                echo 'your password is this :' . $password . '<br> bot your confirm-password is this : ' . $confirm_password . ' go and fix this Thank you';
        }
    }


    public function login($username, $password)
    {
        if (empty($username) && empty($password)) {
            // <<<<<<<<<<<<<<< comment >>>>>>>>>>>>>>>>>>
            // if you wnte show this message in form, return this string
            echo 'خواهر من, username و password رو وارد کنید تنکیووووو...';
        } else {
            $user = self::$context->select(table: 'users', where: ['username'=>$username], fetch: true);
            if ($user['username'] == $username && $user['password'] == $password) {
                if ($user['user_role'] == 0) {
                    setcookie('username', $user['username'], time() + (36800 * 5), '/');
                    setcookie('user_id', $user['user_id'], time() + (36800 * 5), '/');
                    setcookie('user_role', $user['user_role'], time() + (36800 * 5), '/');
                    return true;
                } else {
                    setcookie('username', $user['username'], time() + (36800 * 22), '/');
                    setcookie('user_id', $user['user_id'], time() + (36800 * 22), '/');
                    setcookie('user_role', $user['user_role'], time() + (36800 * 22), '/');
                    return false;
                }
            } else
                echo 'کاربر با این مشخصات یافت نشد';
        }
    }

    public function logout()
    {
        setcookie('username', '', -1, '/');
        setcookie('user_id', '', -1, '/');
        setcookie('user_role', '', -1, '/');
    }
}