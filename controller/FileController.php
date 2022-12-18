<?php

namespace app\controller;

use app\model\Files\FileProvider;

$username = $_SESSION['user']->getUsername() ?? null;

$fileProvider = new FileProvider();

$files = $fileProvider->getAllFiles();

include ROOT . "/view/index.php";
include ROOT . "/view/files.php";
include ROOT . "/view/footer.php";

exit();
