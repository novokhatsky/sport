<?php

if (!isset($_POST['login']) || !isset($_POST['pass'])) {
    require_once 'views/login.php';
    exit;
}

$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['pass']);

/* @var $db \Sport\Models\DbConnect */
$userData = $db->getRow(
    'select id, pass from sportsman where login = :login',
    ['login' => $login]
);

if (!is_array($userData) || $userData === []) {
    require_once 'views/login.php';
    exit;
}

if (password_verify($pass, $userData['pass'])) {
    $_SESSION['sportsman_id'] = $userData['id'];

    $hash = md5($userData['id'] . $_SERVER['REMOTE_ADDR'] . 'qg67!K3Fq091HJ');

    $res = $db->insertData(
        'insert into sessions (session, sportsman_id) values (:session, :sportsman_id)',
        ['session' => $hash, 'sportsman_id' => $userData['id']]
    );

    if ($res > 0) {
        setcookie('session', $hash, strtotime('+7 days'));
    }

    // если зашел тренер, то ему доступна панель управления
    // todo формирование панели
    if ($_SESSION['sportsman_id'] === 2) {
        header('Location: /admin');
    } else {
        header('Location: /');
    }

    exit;
}

require_once 'views/login.php';
