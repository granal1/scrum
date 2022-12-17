<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Профиль</title>
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid d-flex align-items-center pt-3 pt-lg-0 pb-5 pb-lg-0">
        <div class="container pb-4">
            <form class="" method="post" action="?controller=file_upload" enctype="multipart/form-data">
                <div class="row mx-auto mb-3">
                    <h4>Загрузка файлов</h4>
                </div>
                <?php if (isset($_SESSION['file_upload_error'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['file_upload_error']; ?>
                        <?php unset($_SESSION['file_upload_error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['file_upload_success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['file_upload_success']; ?>
                        <?php unset($_SESSION['file_upload_success']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <input required accept=".pdf" class="form-control form-control-sm" type="file" multiple id="files" name="files[]">
                    </div>
                </div>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-between col-11 mx-auto col-sm-10">
                    <button class="btn btn-sm btn-danger col-sm-3" type="submit">Сохранить</button>
                    <button onClick="history.back()" class=" btn btn-sm btn-success col-sm-3" type="button">Назад</button>
                    <a href="?controller=files" class=" btn btn-sm btn-warning col-sm-3" type="button">Все файлы</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../bootstrap/bootstrap.min.js"></script>
</body>

</html>
