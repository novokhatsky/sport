<?php

$_SESSION = [];
setcookie('session', '', strtotime('-7 days'));

header('Location: /');

