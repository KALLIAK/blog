<?php
function last_error($error = '')
{
    static $lastError = '';
    if ($error === '') {
        return $lastError;
    }
    $lastError = $error;
}

function checker($fname)
{
    return !preg_match('/[^0-9A-Za-z-_ :]/', $fname);
}

function check_controller($fname)
{
    return !preg_match('/[^0-9A-Za-z-_]/', $fname);
}

function template($view, $vars = [])
{
    extract($vars);
    ob_start();
    include "./views/{$view}.php";
    return ob_get_clean();
}

function menu()
{
    $menu = null;
    $isAuth = isAuthorized();
    $menu = '<li><a href="' . ROOT . '/home">Главная</a></li>
            <li><a href="' . ROOT . '/add">Новый пост</a></li>';

    if ($isAuth === true) {
        $menu .= '<li><a href="' . ROOT . '/logout">Выход</a></li>';
    } else {
        $menu .= '<li><a href="' . ROOT . '/login">Авторизация</a></li>';
        $menu .= '<li><a href="' . ROOT . '/register">Регистрация</a></li>';
    }
    return $menu;
}