<?php
$menu = menu();
$page_title = 'Авторизация';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));
    $remember = $_POST['remember'] ?? false;

    if (empty($login) || empty($password)) {
        last_error('Поля логина или пароля не могут быть пустыми!');
    } elseif (authorize($login, $password, $remember)) {
        if (isset($_SESSION['returnUrl'])) {
            header('Location: ' . $_SESSION['returnUrl']);
            unset($_SESSION['returnUrl']);
            exit();
        } else {
            header('Location: ' . ROOT . '/home');
            exit();
        }
    } else {
        last_error('Неверный логин или пароль!');
    }
}

$inner = template('v_login');