<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>страница входа</title>
    <link href="/css/foundation.min.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

    <form method="post" action="/login">

        <div class="row">
            <div class="large-4 columns">
                <label>логин:
                    <input type="text" name="login">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-4 columns">
                <label>пароль:
                    <input type="password" name="pass">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="large-2 columns">
                <input class="button" type="submit" value="Вход">
            </div>
        </div>
    </form>

</body>
</html>
