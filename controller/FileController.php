<?php

require_once 'model/Files/FileProvider.php';

$username = $_SESSION['user']->getUsername() ?? null;

$fileProvider = new FileProvider($pdo);

$files = $fileProvider->getAllFiles();

include "view/index.php";
include "view/files.php";