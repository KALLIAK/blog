<?php
include_once './models/authorization.php';
include_once './models/news.php';
include_once './models/common.php';
define('ROOT', '/php1/day6/blog_mvc');

session_start();
$err404 = false;

$params = explode('/', $_GET['querystring']);
$last = count($params) - 1;
if ($params[$last] === '') {
    unset($params[$last]);
}

$controller = $params[0] ?? 'home';

if (!check_controller($controller) || !file_exists("./controllers/$controller.php")) {
    $err404 = true;
} else {
    include_once "./controllers/$controller.php";
}

if ($err404) {
    $page_title = 'Ошибка 404';
    $inner = template('v_err404');
    $menu = menu();
}

echo template('v_main', [
    'menu' => $menu,
    'title' => $page_title,
    'content' => $inner
]);
exit();

