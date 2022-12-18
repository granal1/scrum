


    <div class="row col-10 mx-auto row-cols-1 mb-2">
        <form class="form-control p-3 col" id="task" method="POST" action="?controller=taskCard">
            <h3>Задание составлено: ...вставить ФИО...</h3>
            <h5 class="mt-3">Последнее изменение сделано: вставить дату изменения</h5>
            <div class="col-md-auto">
                <h5 class="mt-3">Приоритет: вставить приоритет</h5>
                <select form="task" class="form-select" name="taskPriority">
                    <option value="1">очень низкий</option>
                    <option value="2">низкий</option>
                    <option value="3">средний</option>
                    <option value="4">высокий</option>
                    <option value="5">очень высокий</option>
                </select>
            </div>
            <div class="col-md-auto">
                <h5 class="mt-3">Срок выполнения до: вставить дедлайн</h5>
                <input form="task" class="form-control" type="date" id="taskDeadline" name="taskDeadline" />
            </div>
            <div class="col-md-auto">
                <h5 class="mt-3">Исполнителем назначен: ...вставить ФИО...</h5>
                <select form="task" class="form-select" name="unit">
                    <option value="1">список исполнителей</option>
                    <option value="2">иванов</option>
                    <option value="3">петров</option>
                    <option value="4">сидоров</option>
                    <option value="5">козин</option>
                </select><br>
            </div>
            <div class="col-md-auto">
                <label for="taskDescription" class="form-label">Описание задания</label><br>
                <textarea form="task" class="input-group-text col-lg-12" name="taskDescription" id="taskDescription">текст задания</textarea><br>
            </div>
            <div class="col-md-auto">
                <h4>Выполнение работ по заданию</h4>
                <table class="table table-bordered">
                    <tr>
                        <td>исполнитель</td>
                        <td>операция</td>
                        <td>что сделано</td>
                        <td>дата последних работ</td>
                    </tr>
                    <tr>
                        <td>иван иванов</td>
                        <td>сломать мозг боссу</td>
                        <td>разрушил веру в людей</td>
                        <td>28.12.20022</td>
                    </tr>
                </table>
            </div>
            <a href="#">Ссылка на файл задания pdf</a><br>
            <div class="col-md-auto">
                <label for="taskDone" class="mt-3">Задание выполнено на %:</label>
                <input style="width:100%;" type="range" min="0" max="100" step="5" id="taskDone" name="taskDone" class="" required="" value="<?= $taskDone ?>">
            </div>
            <button form="task" class="btn btn-primary mt-3" type="submit">Сохранить</button>
        </form>
    </div>

    <!-- <div class="container text-center">
    <div class="row">
        <form method="post" action="/?controller=taskCard" class="sign-in-form col-lg-4 col-md-5 col-sm-8">
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


    </div> -->
    <script src="../bootstrap/bootstrap.min.js"></script>

