<?php

session_start();

date_default_timezone_set('Asia/Novosibirsk');

require_once 'models/autoload.php';

$config_db = require_once 'config_db.php';

$db = new Sport\Models\DbConnect($config_db);

function check_cookie($session): bool {
    if ($session === 'ba3dce2394f727a218d1c8f8bce8b6b8389b1cd2') {
        // авторизуем пользователя
        $_SESSION['sportsman_id'] = 1;
        // обновляем куку
        //
        // !!!!   дублировние кода, подобные шаги делаются при авторизации
        return true;
    } else {
        // проверка не пройдена
        return false;
    }
}


if ($_SERVER['REQUEST_URI'] === '/') {
    $action = 'index';
} else {
    $params = explode('/', $_SERVER['REQUEST_URI']);
    $action = htmlspecialchars($params[1]);
}

if (!isset($_SESSION['sportsman_id'])) {

    if (isset($_COOKIE['session'])) {

        $session = htmlspecialchars($_COOKIE['session']);

        if (check_cookie($session)) {
            $_SESSION['sportsman_id'] = 1;
        } else {
            $action = 'login';
        }
    } else {
        $action = 'login';
    }
}

$fullname = 'controllers/' . $action . '.php';

require_once file_exists($fullname) ? $fullname : 'views/404.html';
