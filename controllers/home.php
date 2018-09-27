<?php
$isAuth = isAuthorized();
$messages = news_all();
$menu = menu();
$page_title = 'Главная';

if ($isAuth === true) {
    $inner = template('v_index_auth', [
        'messages' => $messages
    ]);
} else {
    $inner = template('v_index_notauth', [
        'messages' => $messages
    ]);
}
