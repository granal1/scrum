<?php


require_once 'model/TaskProvider.php';
$taskProvider = new TaskProvider($pdo);

//TODO Не работает. Удалить после удаления страницы "Управление задачами". добавление задачи
if (isset($_POST) && isset($_POST['description']) && isset($_POST['priority'])){
    if ($_POST['description'] != '' && $_POST['priority'] != ''){
        $newDescription = htmlspecialchars(strip_tags($_POST['description']));
        $newpriority = htmlspecialchars(strip_tags($_POST['priority']));
        $add = $taskProvider->addTask($newDescription, $newpriority); // Метод изменился.
        header("Location:/?controller=tasks");
        die();
    }
}

//отметить выполненной
if (isset($_GET['action']) && $_GET['action']==='done'){
    $done = $taskProvider->setIsDone($_SESSION['tasks'][$_GET['key']]->getId());
    header("Location:/?controller=tasks");
    die();
}

//отметить невыполненной
if (isset($_GET['action']) && $_GET['action']==='undone'){
    $done = $taskProvider->setUnDone($_SESSION['tasks'][$_GET['key']]->getId());
    header("Location:/?controller=tasks");
    die();
}

//получение задач
$tasks = $taskProvider->getAllTasks($_SESSION['user']->getUuid());
if ($tasks === null) {
    $_SESSION['tasks'] = [];
} else {
    $_SESSION['tasks'] = $tasks;
}

include "view/index.php";
include "view/tasks.php";