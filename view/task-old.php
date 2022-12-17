


    <div class="container text-center">
    <div class="row">
        <form method="post" action="/?controller=taskCard-old" class="sign-in-form col-lg-4 col-md-5 col-sm-8">
            <h3>Карточка задачи</h3>
            <div class="alert alert-success <?= $message == '' ? 'visually-hidden' : '' ?>">
                <?= $message ?>
            </div>
            <label for="taskPriority" class="mt-3">Приоритет задачи:</label>
            <input type="number" min="0" max="100" step="1" id="taskPriority" name="taskPriority" class="form-control" placeholder="Приоритет задачи" required="" autofocus="" value="<?= $taskPriority ?>">

            <label for="taskDescription" class="mt-3">Описание задачи:</label>
            <textarea type="text" id="taskDescription" name="taskDescription" class="form-control" placeholder="Описание задачи" rows="3" required="" ><?= $taskDescription ?></textarea>

            <label for="taskDeadline" class="mt-3">Срок выполнения:</label>
            <input type="datetime-local" id="taskDeadline" name="taskDeadline" class="form-control" placeholder="Срок выполнения задачи" required="" value="<?= $taskDeadline ?>">

            <label for="taskDone" class="mt-3">Выполнено, %:</label>
            <input style="width:100%;" type="range" min="0" max="100" step="5" id="taskDone" name="taskDone" class="" required="" value="<?= $taskDone ?>">

            <button class="w-75 btn btn-lg btn-primary mt-3" type="submit">Сохранить</button>
            <a href="/" class="w-75 btn btn-lg btn-primary mt-3">Вернуться</a>
        </form>


    </div>
    <script src="/bootstrap/bootstrap.min.js"></script>

