<?php

namespace app\controller;

use app\model\Pagination;
use app\model\TaskProvider;
use Symfony\Polyfill\Uuid\Uuid;

$taskProvider = new TaskProvider();


//TODO Не работает. Удалить после удаления страницы "Управление задачами". добавление задачи
if (isset($_POST) && isset($_POST['description']) && isset($_POST['priority'])) {
    if ($_POST['description'] != '' && $_POST['priority'] != '') {
        $newDescription = htmlspecialchars(strip_tags($_POST['description']));
        $newPriority = htmlspecialchars(strip_tags($_POST['priority']));
        $newUuid = Uuid::uuid_create();
        $add = $taskProvider->setAddTask($newUuid, $newDescription, $newPriority, '', ''); // Метод изменился.
        header("Location:/public/?controller=tasks");
        die();
    }
}

//отметить выполненной
if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $done = $taskProvider->setIsDone($_SESSION['tasks'][$_GET['key']]->getId());
    header("Location:/?controller=tasks");
    die();
}

//отметить невыполненной
if (isset($_GET['action']) && $_GET['action'] === 'undone') {
    $done = $taskProvider->setUnDone($_SESSION['tasks'][$_GET['key']]->getId());
    header("Location:/?controller=tasks");
    die();
}

//получение задач
$tasks = $taskProvider->getAllTasks($_SESSION['user']->getUuid());
$paginator = new Pagination($tasks, $_GET['page']);
if ($tasks === null) {
    $_SESSION['tasks'] = [];
} else {
    $_SESSION['tasks'] = $paginator->getCurrentPages();
    $_SESSION['pagination'] = $paginator->getButtonNumber();
}

include ROOT . "/view/index.php";
include ROOT . "/view/tasks.php";
