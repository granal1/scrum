<?php

require_once 'model/TaskProvider.php';
$taskProvider = new TaskProvider($pdo);


if (isset($_POST, $_POST['taskPriority'], $_POST['taskDescription'], $_POST['taskDeadline'])){
    if ($_POST['taskDescription'] != '' 
        && $_POST['taskPriority'] != '' 
        && $_POST['taskDeadline'] != ''
        && $_POST['taskDone'] != ''){
        $newTaskDescription = htmlspecialchars(strip_tags($_POST['taskDescription']));
        $newTaskPriority = htmlspecialchars(strip_tags($_POST['taskPriority']));
        $newTaskDeadline = htmlspecialchars(strip_tags($_POST['taskDeadline']));
        $newTaskDone = $_POST['taskDone'];
        
        if (isset($_SESSION['taskId'])){
            $inbase = $taskProvider->setUpdateTask($_SESSION['taskId'], $newTaskDescription, $newTaskPriority, $newTaskDeadline, $newTaskDone);
        }
        else{
            $inbase = $taskProvider->setAddTask($newTaskDescription, $newTaskPriority, $newTaskDeadline, $newTaskDone);
        }
        unset($_SESSION['taskId']);
        if(isset($inbase)){
            $message = 'Сохранено';
            $task = $taskProvider->getOneTask($_SESSION['user']->getId(), $inbase);
            $_SESSION['taskId'] = isset($task) ? $task->getId() : '';
        }
    }
}
else{
    unset($_SESSION['taskId']);
}

if (isset($_GET, $_GET['action'])){
    $taskId = $_SESSION['tasks'][$_GET['action']]->getId();

    $task = $taskProvider->getOneTask($_SESSION['user']->getId(), $taskId);
    $_SESSION['taskId'] = isset($task) ? $task->getId() : '';
}

$message = $message ?? '';
$taskPriority = isset($task) ? $task->getTask_priority() : '';
$taskDescription = isset($task) ? $task->getTask_description() : '';
$taskDeadline = isset($task) ? $task->getTask_deadline() : '';
$taskDone = isset($task) ? $task->getTask_Done() : '0';

include "view/index.php";
include "view/task.php";
include "view/footer.php";