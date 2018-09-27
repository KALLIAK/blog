<?php
$menu = menu();
$page_title = 'Регистрация';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));
    if (empty($login) || empty($password)) {
        last_error('Поля логина или пароля не могут быть пустыми!');
    } elseif (register($login, $password)) {
        header('Location: ' . ROOT . '/login');
        exit();
    }
}

$inner = template('v_register');
