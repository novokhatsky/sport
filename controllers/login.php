<?php

if (!isset($_POST['login']) || !isset($_POST['pass'])) {
    require_once 'views/login.php';
    exit;
}

$login = htmlspecialchars($_POST['login']);
$pass = htmlspecialchars($_POST['pass']);

// запрос к бд с целю получить hash пароля соответсвующий пользователю

// 123
$hash = '$2y$10$69T6b/53xbEWPr4MDkd5C.OlH2Y5pPzzP6Vf982zhhX1E0HKwMVQO';

if (password_verify($pass, $hash)) {
    $_SESSION['id_user'] = 1;
    header('Location: /');
    exit;
} else {
    require_once 'views/login.php';
}
