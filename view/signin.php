<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
        crossorigin="anonymous"> -->
    <style>
        .sign-in-form {
            margin: auto;
        }

        #username {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        #password {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <form method="post" class="sign-in-form mt-5 mt-md-5 col-lg-4 col-md-5 col-sm-8">
                <h3>Авторизация</h3>
                <div class="alert alert-danger <?= $error === null ? 'visually-hidden' : '' ?>">
                    <?= $error ?>
                </div>
                <label for="login" class="visually-hidden">Логин пользователя</label>
                <input type="text" id="login" name="login" class="form-control mt-3" placeholder="Логин пользователя" required="" autofocus="">
                <label for="password" class="visually-hidden">Пароль</label>
                <input type="password" id="password" name="password" class="form-control mt-3" placeholder="Пароль" required="">
                <button class="w-75 btn btn-lg btn-primary mt-1" type="submit">Войти</button>
                <a href="/?action=registration" class="w-75 btn btn-lg btn-primary mt-1">Зарегистрироваться</a>
            </form>
        </div>
        <br>
        <p>Например:<br>
            guest, 123</p>
    </div>
    <script src="../bootstrap/bootstrap.min.js"></script>
</body>
