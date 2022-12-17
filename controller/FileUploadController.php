<?php

namespace app\controller;

use app\model\Files\FileUploadProvider;

$username = $_SESSION['user']->getUsername() ?? null;

if (isset($_FILES['files']) && $_FILES['files']['name'][0] != "") {

    $files = $_FILES;

    $target_dir = "uploads/" . date('Y-m-d') . '/';

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0775, true); // may need 775 ?
    }

    $fileUploadProvider = new FileUploadProvider();

    $error = [];
    $message = [];

    for ($i = 0; $i < count($files['files']['name']); $i++) {

        $target_file = $target_dir . basename($files['files']["name"][$i]);

        $pdfFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $_SESSION['file_upload_error'] = 'Такой файл ' . $files['files']["name"][$i] . ' уже есть';
            unset($_FILES['files']);
            header("Location: ?controller=file_upload");
            exit();
        }

        if ($files['files']["size"][$i] > 25000000) {
            $_SESSION['file_upload_error'] = 'Слишком большой файл, больше чем 25Мб';
            unset($_FILES['files']);
            header("Location: ?controller=file_upload");
            exit();
        }

        if ($pdfFileType != "pdf") {
            $_SESSION['file_upload_error'] = 'Можно загружать только pdf файлы';
            unset($_FILES['files']);
            header("Location: ?controller=file_upload");
            exit();
        }

        if (move_uploaded_file($files['files']["tmp_name"][$i], $target_file)) {
            $fileUploadProvider->saveFileData($files['files']["name"][$i], $target_dir);
            $_SESSION['file_upload_success'] =  htmlspecialchars(basename($files['files']["name"][$i])) . " загружен на сервер";
            unset($_FILES['files']);
        }
    }
}

include ROOT . "/view/index.php";
include ROOT . "/view/file_upload.php";

exit();
