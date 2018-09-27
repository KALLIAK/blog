<?php
$isAuth = isAuthorized();
$menu = menu();
$page_title = 'Добавление новости';

if ($isAuth === false) {
    $_SESSION['returnUrl'] = ROOT . '/add';
    header('Location: ' . ROOT . '/login');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    $msg = '';

    if ($title == '' || $content == '') {
        last_error('Заполните все поля');
    } else {
        news_add($title, $content);
        header('Location: ' . ROOT . '/home');
        exit();
    }
}
$title = $title ?? '';
$content = $content ?? '';

$inner = template('v_add', [
    'title' => $title,
    'content' => $content
]);
