<?php
$isAuth = $auth->isAuthorized();

$page_title = 'Редактирование новости';

if ($isAuth === false) {
    $_SESSION['returnUrl'] = ROOT . '/edit/' . $params[1];
    header('Location: ' . ROOT . '/login');
    exit();
}

$id = $params[1] ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    $err404 = true;
} else {
    $message = $news->getById($id);
    if (empty($message)) {
        $err404 = true;
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));

    if ($title === '' || $content === '') {
        last_error('Заполните все поля');
    } else {
        $news->edit($id, $title, $content);
        header('Location: ' . ROOT . '/home');
        exit();
    }
}

$title = $title ?? '';
$content = $content ?? '';

$inner = template('v_edit', [
    'message' => $message
]);
