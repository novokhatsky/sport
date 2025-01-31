<?php

if (!isset($_POST['login']) || !isset($_POST['pass'])) {
    require_once 'views/login.php';
    exit;
}

$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['pass']);

// запрос к бд с целю получить hash пароля соответсвующий пользователю

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

    // todo формирование метки сессии, и ее сохранение
    setcookie('session', 'ba3dce2394f727a218d1c8f8bce8b6b8389b1cd2', strtotime('+7 days'));
    header('Location: /');
    exit;
} else {
    require_once 'views/login.php';
}
