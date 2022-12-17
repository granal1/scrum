<div class="container mt-3">
  <h2>Управление текущими задачами</h2>

  <table class="table table-striped">
    <thead>
      <tr align="center">
        <th>Выполнено</th>
        <th>Приоритет</th>
        <th>Задача</th>
        <th>Обновлено</th>
      </tr>
    </thead>
    <tbody>

      <form action="/?controller=tasks" method="POST">
        <tr valign="middle">
          <td></td>
          <td><input type="number" class="form-control" id="priority" placeholder="Приоритет задачи" name="priority"></td>
          <td><textarea class="form-control" id="description" rows="2" placeholder="Описание новой задачи" name="description"></textarea></td>
          <td align="center"><button type="submit" class="btn btn-primary">ДОБАВИТЬ</button></td>
        </tr>
      </form>

      <?php foreach ($_SESSION['tasks'] as $key => $task) : ?>
        <tr>
          <td class="h4" align="center"><?= ($task->getTask_done())
                                          ? "<a href=\"/?controller=tasks&action=undone&key=$key\" style=\"text-decoration: none; \">&#x1F5F9</a>"
                                          : "<a href=\"/?controller=tasks&action=done&key=$key\" style=\"text-decoration: none; \">&#x2610</a>" ?>
          </td>
          <td align="center"><?= $task->getTask_priority() ?></td>
          <td><?= $task->getTask_description() ?></td>
          <td align="center"><?= $task->getTask_updated() ?></td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>

<?php include "footer.php" ?>
