<?php
if ($_SESSION['sportsman_id'] !== 2) {
    header('Location: /');
    exit;
}

require_once 'views/admin.php';
