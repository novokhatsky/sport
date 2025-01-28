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

    <div class="row">
        <form method="post" action="/save">

            <label>
                Вид тренировки:
                <select name="id_training">
                <?php
                    foreach ($type_training as $training) {
                        echo '<option value="' . $training['id'] . '">' . $training['name'] . '</option>';
                    }
                ?>
                </select>
            </label>

            <label>
                Дата начала тренировки:
                <input type="date" name="dt" value="<?=$curr_dt?>">
            </label>

            <label>
                Время начала тренировки
                <input type="time" name="tm">
            </label>

            <label>
                Дистанция, км:
                <input type="number" step="0.1" name="distance">
            </label>

            <label>
                Продолжительность:
                <input type="time" step="1" name="duration">
            </label>

            <label>
                Примечание:
                <textarea name="note"></textarea>
            </label>

            <a href="/"><button type="button" class="button">Отмена</button></a>

            <input type="submit" value="Сохранить" class="button">

        </form>

    </div>
</body>
</html>


