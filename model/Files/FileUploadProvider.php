<?php

$pdo = require 'db.php';

use Symfony\Polyfill\Uuid\Uuid;


class FileUploadProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
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