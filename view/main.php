<h1>Рады вас приветствовать, <?= $username ?></h1>

<a href="?controller=taskCard" class="btn btn-lg btn-primary mt-1">Добавить задачу</a>
<a href="?controller=taskCard-old" class="btn btn-lg btn-primary mt-1">Добавить(стар)</a>

<h3>Список незавершенных задач:</h3>

<table class="table table-striped">
  <thead>
    <tr align="center">
      <th>Приоритет</th>
      <th>Задача</th>
      <th>Срок выполнения</th>
      <th>Выполнено, %</th>
    </tr>
  </thead>
  <tbody>

    <?php

    use function app\functions\percent;

    foreach ($_SESSION['tasks'] as $key => $task) : ?>
      <tr style="cursor: pointer" ; onclick="window.location.href='/?controller=taskCard-old&action=<?= $key ?>'; return false">
        <td align="center"><?= $task->getTask_priority() ?></td>
        <td><?= $task->getTask_description() ?></td>
        <td align="center"><?= date('d.m.Y H:i', strtotime($task->getTask_deadline())) ?></td>
        <td align="center"><?= percent($task->getTask_done()) ?></td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<?php include "footer.php" ?>
