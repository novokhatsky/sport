<?php

$trainings = $db->getList(
    'select id, name from type_training order by name'
);

require_once 'views/trainings.php';

