<?php

namespace app\model\Files;

use app\db\Db;
use Symfony\Polyfill\Uuid\Uuid;


class FileUploadProvider
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Db::getDb();
    }

    public function saveFileData(string $name, string $path)
    {
        $uuid = Uuid::uuid_create();

        $statement = $this->pdo->prepare(
            'INSERT INTO files 
            ( `uuid`, `name`, `path` ) 
            VALUES ( :uuid, :name, :path)'
        );

        $statement->execute([
            'uuid' => $uuid,
            'name' => $name,
            'path' => $path
        ]);
    }
}
