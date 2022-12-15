<?php

//namespace granal1\scrum\model;

//use PDO;
//use granal1\scrum\model\User;

use Symfony\Polyfill\Uuid\Uuid;

$pdo = require ROOT . '/db.php';

class UserProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getByUsernameAndPassword(string $login, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM users_old 
            WHERE login = :login 
            AND 
            password = :password
            LIMIT 1'
        );
        $statement->execute([
            'login' => $login,
            'password' => md5($password)
        ]);
        return $statement->fetchObject(User::class, [$login]) ?: null;
    }

    public function getByLogin(string $login): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM users_old 
            WHERE login = :login 
            LIMIT 1'
        );
        $statement->execute([
            'login' => $login,
        ]);
        return $statement->fetchObject(User::class, [$login]) ?: null;
    }

    public function addNewUser(string $new_login, string $new_name, string $new_password)
    {
        $newUserUuid = Uuid::uuid_create();

        $statement = $this->pdo->prepare(
            'INSERT INTO
            users_old (`uuid`, `login`, `name`, `password`)
            VALUES
            (:uuid, :new_login, :new_name, :new_password)
        '
        );
        $statement->execute([
            'uuid' => $newUserUuid,
            'new_login' => $new_login,
            'new_name' => $new_name,
            'new_password' => md5($new_password)
        ]);
        return $statement;
    }
}
