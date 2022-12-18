
    <div class="container-fluid d-flex align-items-center pt-3 pt-lg-0 pb-5 pb-lg-0">
        <div class="container pb-4">
            <form class="" method="post" action="" enctype="multipart/form-data">
                <div class="row mx-auto mb-3">
                    <h4>Профиль пользователя</h4>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="name" class="form-label">Фамилия И.О.</label>
                        <input required placeholder="Иванов И.И." class="form-control form-control-sm" type="text" id="name" name="name">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="login" class="form-label">Логин</label>
                        <input required placeholder="Login" class="form-control form-control-sm" type="text" id="login" name="login">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="email" class="form-label">Почта</label>
                        <input required placeholder="email@email.ru" class="form-control form-control-sm" type="email" id="email" name="email">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="chief_uuid" class="form-label">Мой руководитель</label>
                        <select name="chief_uuid" class="form-select form-select-sm">
                            <option value="">Выберите ...</option>
                            <option value="">Иванов И.И.</option>
                            <option value="">Петров П.П.</option>
                            <option value="">Сидоров С.С.</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="confidant_uuid" class="form-label">Мои подчиненные</label>
                        <div class="input-group">
                            <select name="confidant_uuid[]" class="form-select form-select-sm">
                                <option value="">Выберите ...</option>
                                <option value="">Иванов И.И.</option>
                                <option value="">Петров П.П.</option>
                                <option value="">Сидоров С.С.</option>
                            </select>
                            <button type="button" class="add-act-work ps-2" style="border: none; background-color: transparent;">
                                <img src="../icons/add.svg" class="rounded" alt="Add work" height="35" width="35" title="Добавить подчиненного">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-11 col-xs-10 col-sm-10 col-md-10 mx-auto">
                        <label for="password" class="form-label">Пароль</label>
                        <input required placeholder="12345678" class="form-control form-control-sm" type="text" id="password" name="password">
                    </div>
                </div>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-between col-11 mx-auto col-sm-10">
                    <button class=" btn btn-sm    btn-danger col-sm-5" type="submit">Сохранить</button>
                    <button onClick="history.back()" class=" btn btn-sm    btn-success col-sm-5" type="button">Назад</button>
                </div>
            </form>
        </div>
    </div>
    <script src="bootstrap/bootstrap.min.js"></script>