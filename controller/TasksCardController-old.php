<?php

namespace app\controller;

use app\model\TaskProvider;
use Symfony\Polyfill\Uuid\Uuid;

$taskProvider = new TaskProvider();

if (isset($_POST, $_POST['taskPriority'], $_POST['taskDescription'], $_POST['taskDeadline'])) {
    if (
        $_POST['taskDescription'] != ''
        && $_POST['taskPriority'] != ''
        && $_POST['taskDeadline'] != ''
        && $_POST['taskDone'] != ''
    ) {

        $newTaskUuid = Uuid::uuid_create();
        $newTaskDescription = htmlspecialchars(strip_tags($_POST['taskDescription']));
        $newTaskPriority = htmlspecialchars(strip_tags($_POST['taskPriority']));
        $newTaskDeadline = htmlspecialchars(strip_tags($_POST['taskDeadline']));
        $newTaskDone = $_POST['taskDone'];

        if (isset($_SESSION['taskUuid'])) {
            $inbase = $taskProvider->setUpdateTask($_SESSION['taskUuid'], $newTaskDescription, $newTaskPriority, $newTaskDeadline, $newTaskDone);
        } else {
            $inbase = $taskProvider->setAddTask($newTaskUuid, $newTaskDescription, $newTaskPriority, $newTaskDeadline, $newTaskDone);
        }
        unset($_SESSION['taskUuid']);
        if (isset($inbase)) {
            $message = 'Сохранено';
            $task = $taskProvider->getOneTask($_SESSION['user']->getUuid(), $inbase);
            $_SESSION['taskUuid'] = isset($task) ? $task->getUuid() : '';
        }
    }
} else {
    unset($_SESSION['taskUuid']);
}

if (isset($_GET, $_GET['action'])) {
    $taskUuid = $_SESSION['tasks'][$_GET['action']]->getUuid();
    $task = $taskProvider->getOneTask($_SESSION['user']->getUuid(), $taskUuid);
    $_SESSION['taskUuid'] = isset($task) ? $task->getUuid() : '';
}

$message = $message ?? '';
$taskPriority = isset($task) ? $task->getTask_priority() : '';
$taskDescription = isset($task) ? $task->getTask_description() : '';
$taskDeadline = isset($task) ? $task->getTask_deadline() : '';
$taskDone = isset($task) ? $task->getTask_Done() : '0';

include ROOT . "/view/index.php";
include ROOT . "/view/task-old.php";
include ROOT . "/view/footer.php";
