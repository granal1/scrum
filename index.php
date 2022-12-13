<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'model/User.php';
require_once 'model/Task.php';
session_start();

$controller = $_GET['controller'] ?? 'index';

$routes = require 'routes.php';

if (isset($_SESSION['user'])){
    require_once $routes[$controller] ?? require_once $routes['index']; // вместо 404 просто переход на главную (всплвыающее уведомление не делал)
}
else{
    require_once $routes['security']; //если пользватель не известен, то только форма для входа
}