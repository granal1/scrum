<?php

$pdo = require 'db.php';

require_once 'model/Files/File.php';

class FileProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllFiles(): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM `files`'
        );

        $statement->execute([
        ]);

        $result = [];

        while($row = $statement->fetchObject(File::class, [])){
            $result[] = $row;
        }
        return $result ?: null;
    }

}