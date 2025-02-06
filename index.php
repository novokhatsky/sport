<?php

session_start();

date_default_timezone_set('Asia/Novosibirsk');

require_once 'models/autoload.php';

$config_db = require_once 'config_db.php';

$db = new Sport\Models\DbConnect($config_db);

if ($_SERVER['REQUEST_URI'] === '/') {
    $action = 'index';
} else {
    $params = explode('/', $_SERVER['REQUEST_URI']);
    $action = htmlspecialchars($params[1]);
}

if (isset($_COOKIE['session'])) {
    $session = htmlspecialchars($_COOKIE['session']);

    $sportsman_id = $db->getValue(
        'select sportsman_id from sessions where session = :session',
        ['session' => $session]
    );

    $hash = md5($sportsman_id . $_SERVER['REMOTE_ADDR'] . 'qg67!K3Fq091HJ');

    if ($hash === $session) {
        $_SESSION['sportsman_id'] = $sportsman_id;
        setcookie('session', $session, strtotime('+7 days'));
    } else {
        setcookie('session', '', strtotime('-7 days'));
    }
}

if (!isset($_SESSION['sportsman_id'])) {
    $action = 'login';
}

$fullname = 'controllers/' . $action . '.php';

require_once file_exists($fullname) ? $fullname : 'views/404.html';
