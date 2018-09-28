<?php
namespace core;

use models\UsersModel;

class Auth
{
    private $users;

    public function __construct(UsersModel $users)
    {
        $this->users = $users;
    }

    public function authorize($login, $password, $remember = false)
    {
        $user = $this->users->getByLogin($login);

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

    public function register($login, $password)
    {
        $user = $this->users->getByLogin($login);
        if (!empty($user)) {
            last_error('Такой пользователь уже существует!');
            return false;
        }
        $this->users->add($login, $password);
        return true;
    }

    public function isAuthorized()
    {
        $isAuth = false;
        if (isset($_SESSION['is_auth']) && $_SESSION['is_auth'] === true) {
            $isAuth = true;
        } elseif (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            $user = $this->users->getByLogin($_COOKIE['login']);
            if (!empty($user) && $_COOKIE['password'] == hash('sha256', $user['password'] . 'salt')) {
                $isAuth = true;
                $_SESSION['is_auth'] = true;
            }
        }
        return $isAuth;
    }

    public function menu()
    {
        $menu = null;
        $isAuth = $this->isAuthorized();
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
}