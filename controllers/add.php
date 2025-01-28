<?php

$curr_dt = date('Y-m-d');

$type_training = $db->getList('select id, name from type_training order by sort, name');

require_once 'views/add.php';


