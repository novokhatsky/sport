<?php

function calcPace($distance, $duration)
{
    $seconds = explode(':', $duration);

    if ($distance <= 0 || count($seconds) !== 3) {
        return 0;
    }

    return round(($seconds[0] * 3600 + $seconds[1] * 60 + $seconds[2]) / $distance);
}


$type_training_id = $_POST['type_training_id'] ?? filter_var($_POST['type_training_id'], FILTER_VALIDATE_INT);
$dt = $_POST['dt'] ?? htmlspecialchars($_POST['dt']);
$tm = $_POST['tm'] ?? htmlspecialchars($_POST['tm']);
$distance = $_POST['distance'] ?? htmlspecialchars($_POST['distance']);
$duration_h = $_POST['duration_h'] ?? htmlspecialchars($_POST['duration_h']);
$duration_m = $_POST['duration_m'] ?? htmlspecialchars($_POST['duration_m']);
$duration_s = $_POST['duration_s'] ?? htmlspecialchars($_POST['duration_s']);
$note = $_POST['note'] ?? htmlspecialchars($_POST['note']);


$duration = $duration_h . ':' . $duration_m . ':' . $duration_s;

$pace = gmdate('H:i:s', calcPace($distance, $duration));
$sportsman_id = $_SESSION['sportsman_id'];

try {
    $res = $db->insertData(
        'insert into training (
            sportsman_id,
            type_training_id,
            dt,
            tm,
            distance,
            duration,
            pace,
            note
        ) values (
            :sportsman_id,
            :type_training_id,
            :dt,
            :tm,
            :distance,
            :duration,
            :pace,
            :note
        )',
        [
            'sportsman_id' => $sportsman_id,
            'type_training_id' => $type_training_id,
            'dt' => $dt,
            'tm' => $tm,
            'distance' => $distance,
            'duration' => $duration,
            'pace' => $pace,
            'note' => $note,
        ]
    );
} catch (Exception $e) {
    echo $e;
    die;
    $res = -1;
}


if ($res === -1) {
    // ранее введеные значения вернуть на форму
    header('Location: /add');
    exit;
}

header('Location: /');
exit;

