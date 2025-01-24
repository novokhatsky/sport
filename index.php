<?php

session_start();

date_default_timezone_set('Asia/Novosibirsk');

require_once 'models/autoload.php';

if ($_SERVER['REQUEST_URI'] === '/') {
    $action = 'index';
} else {
    $params = explode('/', $_SERVER['REQUEST_URI']);
    $action = htmlspecialchars($params[1]);
}

if ($action !== 'login' && !isset($_SESSION['id_user'])) {
    // пользователь не автоизован, переход на страницу логина
    require_once 'views/login.php';
    exit;
}

$fullname = 'controllers/' . $action . '.php';

require_once file_exists($fullname) ? $fullname : 'views/404.html';

