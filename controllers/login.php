<?php

if (!isset($_POST['login']) || !isset($_POST['pass'])) {
    require_once 'views/login.php';
    exit;
}

$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['pass']);

// запрос к бд с целю получить hash пароля соответсвующий пользователю

$hash = '$2y$10$hHvu952/LqJla7aIXxvBMus2FWnGewD3MGtLhKA9SctT2fmApUlCO';

if (password_verify($pass, $hash)) {
    $_SESSION['id_user'] = 1;
    setcookie('session', 'ba3dce2394f727a218d1c8f8bce8b6b8389b1cd2', strtotime('+7 days'));
    header('Location: /');
    exit;
} else {
    require_once 'views/login.php';
}
