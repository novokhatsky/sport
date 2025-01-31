<?php

$sportsman_id = $_SESSION['sportsman_id'];

$training = $db->getList(
    'select
        tt.name as vid,
        date_format(dt, "%d.%m.%Y") as dt,
        date_format(tm, "%H:%i") as tm,
        duration,
        distance,
        pace
    from
        training as t
        join type_training as tt on t.type_training_id = tt.id
    where
        sportsman_id = :sportsman_id
    order by
        dt desc, tm
    ',
    ['sportsman_id' => $sportsman_id]
);

require_once 'views/index.php';

