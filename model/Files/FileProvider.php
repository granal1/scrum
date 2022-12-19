<?php

namespace app\model\Files;

use app\db\Db;

class FileProvider
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Db::getDb();
    }

    public function getAllFiles(): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM `files`'
        );

        $statement->execute([]);

        $result = [];

        while ($row = $statement->fetchObject(File::class, [])) {
            $result[] = $row;
        }
        return $result ?: null;
    }
}
