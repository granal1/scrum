<?php

// include '../vendor/autoload.php';

require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

require_once ROOT . '/model/User.php';
require_once ROOT . '/model/Task.php';
session_start();

$controller = $_GET['controller'] ?? 'index';

$routes = require ROOT . '/routes/routes.php';

if (isset($_SESSION['user'])) {
    require_once $routes[$controller] ?? require_once $routes['index']; // вместо 404 просто переход на главную (всплвыающее уведомление не делал)
} else {
    require_once $routes['security']; //если пользватель не известен, то только форма для входа
}
