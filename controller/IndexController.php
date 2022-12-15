<?php

require_once ROOT . '/model/TaskProvider.php';

$username = $_SESSION['user']->getUsername() ?? null;

//получение незавершенных задач
$taskProvider = new TaskProvider($pdo);
$tasks = $taskProvider->getUndoneTasks($_SESSION['user']->getUuid());

if ($tasks === null) {
    $_SESSION['tasks'] = [];
} else {
    $_SESSION['tasks'] = $tasks;
}

include ROOT . "/functions/main.php";
include ROOT . "/view/index.php";
include ROOT . "/view/main.php";
