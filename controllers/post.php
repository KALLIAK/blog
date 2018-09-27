<?php
$menu = menu();
$page_title = 'Просмотр новости';

$id = $params[1] ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    $err404 = true;
} else {
    $message = news_by_id($id);
    if (empty($message)) {
        $err404 = true;
    }
}

if (!$err404) {
    $inner = template('v_post', [
        'message' => $message
    ]);
}