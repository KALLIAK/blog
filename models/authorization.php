<?php
include_once 'users.php';

function authorize($login, $password, $remember = false)
{
    $user = user_by_login($login);

    if (!empty($user) && $user['password'] == $password) {
        $_SESSION['is_auth'] = true;
        if ($remember) {
            setcookie('login', $login, time() + 3600 * 24 * 7, '/');
            setcookie('password', hash('sha256', $user['password'] . 'salt'), time() + 3600 * 24 * 7, '/');
        }
        return true;
    }

    return false;

}

function register($login, $password)
{
    $user = user_by_login($login);

    if (!empty($user)) {
        last_error('Такой пользователь уже существует!');
        return false;
    }

    user_add($login, $password);
    return true;
}

function isAuthorized()
{
    $isAuth = false;

    if (isset($_SESSION['is_auth']) && $_SESSION['is_auth'] === true) {
        $isAuth = true;
    } elseif (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        $user = user_by_login($_COOKIE['login']);
        if (!empty($user) && $_COOKIE['password'] == hash('sha256', $user['password'] . 'salt')) {
            $isAuth = true;
            $_SESSION['is_auth'] = true;
        }
    }
    return $isAuth;
}
