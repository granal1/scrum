<?php
require_once 'model/UserProvider.php';
$pdo = require 'db.php';

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: index.php");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'registration') {
    $_GET['action'] = [];
    include "view/register.php";
    die();
}

$error = null;
if (isset($_POST['login'], $_POST['password'])) {
    ['login' => $login, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($login, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        die();
    }
}

if (isset($_POST['new_login'], $_POST['new_name'], $_POST['new_password'])) {
    ['new_login' => $new_login, 'new_name' => $new_name, 'new_password' => $new_password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByLogin($new_login);
    if ($user != null) {
        $error = '"Этот логин уже занят"';
    } else {
        $user = $userProvider->addNewUser($new_login, $new_name, $new_password);
        header("Location: index.php");
        die();
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'registration') {
    include "view/register.php";
}
else{
    include "view/signin.php";
}
