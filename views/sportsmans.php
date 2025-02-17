<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Спортсмены</title>
    <link href="/css/foundation.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
    <div class="row"><h3>Список спортсменов</h3></div>
        <?php foreach ($sportsmans as $sportsman) { ?>
            <div class="row">
                <div class="large-2 columns"><?=$sportsman['name']?></div>
            </div>
        <?php } ?>
    <div class="row">
        <a href="/add_man"><button class="button">Добавить</button></a>
    </div>
</body>
</html>


