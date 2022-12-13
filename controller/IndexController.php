<?php

require_once 'model/TaskProvider.php';

$username = $_SESSION['user']->getUsername() ?? null;

//получение незавершенных задач
$taskProvider = new TaskProvider($pdo);
$tasks = $taskProvider->getUndoneTasks($_SESSION['user']->getId());

if ($tasks === null) {
    $_SESSION['tasks'] = [];
} else {
    $_SESSION['tasks'] = $tasks;
}

include "functions/main.php";
include "view/index.php";
include "view/main.php";