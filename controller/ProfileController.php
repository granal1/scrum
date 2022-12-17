<?php

//require_once 'model/ProfileProvider.php';

$username = $_SESSION['user']->getUsername() ?? null;

//получение незавершенных задач
//$profileProvider = new ProfileProvider($pdo);
//$profile = $profileProvider->getProfile($_SESSION['user']->getId());
$profile = null;

if ($profile === null) {
    $_SESSION['profile'] = [];
} else {
    $_SESSION['profile'] = $profile;
}

include "view/index.php";
include "view/profile.php";