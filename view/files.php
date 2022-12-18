
    <div class="container-fluid d-flex align-items-center pt-3 pt-lg-0 pb-5 pb-lg-0">
        <div class="container pb-4">
            <h4>Файлы</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Uuid</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Path</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($files)) { ?>
                        <?php foreach ($files as $file) { ?>
                            <tr>
                                <th><?php echo $file->getUuid(); ?></th>
                                <td><?php echo $file->getCreatedAt(); ?></td>
                                <td><?php echo $file->getPath(); ?></td>
                                <td><a target="_blank" href="<?php echo $file->getPath(); ?>"><?php echo $file->getName(); ?></a></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <th colspan="4">Нет файлов</th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="bootstrap/bootstrap.min.js"></script>

