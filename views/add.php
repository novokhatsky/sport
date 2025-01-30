<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>добавление тренировки</title>
    <link href="/css/foundation.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

    <div class="row">
        <h3>Новая тренировка</h3>
    </div>

    <form method="post" action="/save">

        <label class="row">
            Вид тренировки:
            <select name="type_training_id">
            <?php
                foreach ($type_training as $training) {
                    echo '<option value="' . $training['id'] . '">' . $training['name'] . '</option>';
                }
            ?>
            </select>
        </label>

        <label class="row">
            Дата начала тренировки:
            <input type="date" name="dt" value="<?=$curr_dt?>">
        </label>

        <label class="row">
            Время начала тренировки
            <input type="time" name="tm">
        </label>

        <label class="row">
            Дистанция, км:
            <input type="number" step="0.1" name="distance">
        </label>

        <div class="row">
            <label><div>Продолжительность:</div>
                <input type="number" step="1" name="duration_h" max="23" class="small-3 large-2 columns" style="display: inline-block">:
                <input type="number" step="1" name="duration_m" max="59" class="small-3 large-2 columns" style="display: inline-block">:
                <input type="number" step="1" name="duration_s" max="59" class="small-3 large-2 columns" style="display: inline-block">
            </label>
        </div>

        <label class="row">
            Примечание:
            <textarea name="note"></textarea>
        </label>

        <div class="row">
            <div class="small-5 large-2 columns"><a href="/"><button type="button" class="button">Отмена</button></a></div>

            <div class="small-5 large-2 columns"><input type="submit" value="Сохранить" class="button"></div>
        </div>
    </form>

</body>
</html>


