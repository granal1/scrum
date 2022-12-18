<?php

namespace app\controller;

use app\model\Files\FileUploadProvider;

$username = $_SESSION['user']->getUsername() ?? null;

if (isset($_FILES['files']) && $_FILES['files']['name'][0] != "") {

    $files = $_FILES;

    $target_dir = "uploads/" . date('Y/m/d/');

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0775, true);
    }

    $fileUploadProvider = new FileUploadProvider();

    for ($i = 0; $i < count($files['files']['name']); $i++) {

        $file_type = '.' . strtolower(pathinfo($files['files']["name"][$i], PATHINFO_EXTENSION));

        $new_file_name = date('Ymd-His') . $file_type;

        $name_for_users  = $_POST["new_name"] != '' ? $_POST["new_name"] . $file_type : $files['files']["name"][$i];

        $target_file = $target_dir . $new_file_name;

        if ($file_type != ".pdf") {
            $_SESSION['file_upload_error'] = 'Можно загружать только pdf файлы';
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

        // TODO переписать проверяя совпадение в базе, а не в папке, поскольку имени такого же в папке не будет, они все разные
        if (file_exists($target_file)) {
            $_SESSION['file_upload_error'] = 'Такой файл ' . $new_file_name . ' уже есть';
            unset($_FILES['files']);
            header("Location: ?controller=file_upload");
            exit();
        }

        if (move_uploaded_file($files['files']["tmp_name"][$i], $target_file)) {
            $fileUploadProvider->saveFileData($name_for_users, $target_file);
            $_SESSION['file_upload_success'] =  $name_for_users . " загружен на сервер";
            unset($_FILES['files']);
        }
    }
}

include ROOT . "/view/index.php";
include ROOT . "/view/file_upload.php";
include ROOT . "/view/footer.php";

exit();
