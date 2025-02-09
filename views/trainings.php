<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Вид тренировки</title>
    <link href="/css/foundation.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width">
    <style>
        .inline-block {
            display: inline-block;
        }
    </style>
</head>
<body>

    <div class="row"><h3>Виды тренировок</h3></div>
        <?php foreach ($trainings as $training) { ?>
            <div class="row">
                <div class="large-2 columns"><?=$training['name']?></div>
            </div>
        <?php } ?>
    <div class="row">
        <a href="/add_type"><button class="button">Добавить вид</button></a>
    </div>
</body>
</html>


