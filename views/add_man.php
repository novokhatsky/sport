<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>добавление спортсмена</title>
    <link href="/css/foundation.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

    <div class="row">
        <h3>Новый спортсмен</h3>
    </div>

    <form method="post" action="/add_man">

        <label class="row">
            имя:
            <input type="text" name="name" value="">
        </label>

        <label class="row">
            логин:
            <input type="text" name="login" value="">
        </label>

        <label class="row">
            пароль:
            <input type="password" name="pass1" value="">
        </label>

        <label class="row">
            еще раз пароль:
            <input type="password" name="pass2" value="">
        </label>

        <div class="row">
            <div class="small-5 large-2 columns"><a href="/sportsmans"><button type="button" class="button">Отмена</button></a></div>

            <div class="small-5 large-2 columns"><input type="submit" value="Сохранить" class="button"></div>
        </div>
    </form>

</body>
</html>


