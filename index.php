<?php
use core\DB;
use core\Auth;
use models\NewsModel;
use models\UsersModel;

include_once './models/common.php';
define('ROOT', '/blog');
define('CLASS_DIR', '');
set_include_path(__DIR__ . DIRECTORY_SEPARATOR . CLASS_DIR . PATH_SEPARATOR. get_include_path());
spl_autoload_extensions('.class.php');
spl_autoload_register();

session_start();
$db = DB::connect();
$news = new NewsModel($db);
$auth = new Auth(new UsersModel($db));
$menu = $auth->menu();
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
    $menu = $auth->menu();
}

echo template('v_main', [
    'menu' => $menu,
    'title' => $page_title,
    'content' => $inner
]);
exit();

