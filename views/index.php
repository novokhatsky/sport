<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>дневник</title>
    <link href="/css/foundation.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width">
    <style>
        .inline-block {
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="row"><h3>Список тренировок <?=$sportsman_id?></h3></div>
        <?php foreach ($training as $row) { ?>
            <div class="row">
                <div class="large-2 columns"><?=$row['dt']?></div>
                <div class="large-2 columns"><?=$row['tm']?></div>
            </div>
            <div class="row">
                <div class="large-4 columns"><b><i><?=$row['vid']?></i></b></div>
            </div>
            <div class="row">
                <div class="large-2 columns">
                    <img src="/img/distance.png" width="20" class="inline-block">
                    <?=$row['distance']?> км
                </div>
                <div class="large-2 columns">
                    <img src="/img/clock.png" width="20" class="inline-block">
                    <?=$row['duration']?></div>
                <div class="large-2 columns">
                    <img src="/img/speed.png" width="20" class="inline-block">
                    <?=$row['pace']?>
                </div>
            </div>
            <br>
        <?php } ?>
    <div class="row">
        <a href="/add"><button class="button">Добавить тренировку</button></a>
    </div>
    <div class="row"><a href="/logout"><button class="button">Выйти</button></a></div>
</body>
</html>

