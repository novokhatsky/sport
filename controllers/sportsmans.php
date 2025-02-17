<?php

$sportsmans = $db->getList(
    'select id, name from sportsman where id <> 2 order by name'
);

require_once 'views/sportsmans.php';

