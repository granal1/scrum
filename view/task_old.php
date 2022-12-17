<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Задача</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
        crossorigin="anonymous">
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
        <form method="post" action="/?controller=taskCard-old" class="sign-in-form col-lg-4 col-md-5 col-sm-8">
            <h3>Карточка задачи</h3>
            <div class="alert alert-success <?=$message == '' ? 'visually-hidden' : ''?>">
                <?=$message?>
            </div>
            <label for="taskPriority" class="mt-3">Приоритет задачи:</label>
            <input type="number" min="0" max="100" step="1" id="taskPriority" name="taskPriority" class="form-control" placeholder="Приоритет задачи" required="" autofocus="" value="<?=$taskPriority?>">

            <label for="taskDescription" class="mt-3">Описание задачи:</label>
            <textarea type="text" id="taskDescription" name="taskDescription" class="form-control" placeholder="Описание задачи" rows="3" required="" ><?=$taskDescription?></textarea>

            <label for="taskDeadline" class="mt-3">Срок выполнения:</label>
            <input type="datetime-local" id="taskDeadline" name="taskDeadline" class="form-control" placeholder="Срок выполнения задачи" required="" value="<?=$taskDeadline?>">

            <label for="taskDone" class="mt-3">Выполнено, %:</label>
            <input style="width:100%;" type="range" min="0" max="100" step="5" id="taskDone" name="taskDone" class="" required="" value="<?=$taskDone?>">

            <button class="w-75 btn btn-lg btn-primary mt-3" type="submit">Сохранить</button>
            <a href="/" class="w-75 btn btn-lg btn-primary mt-3">Вернуться</a>
        </form>


    </div>
    <br>
</div>
</body>
