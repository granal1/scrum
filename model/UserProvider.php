<?php

$pdo = require 'db.php';

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
            FROM users 
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
            FROM users 
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
        $statement = $this->pdo->prepare(
            'INSERT INTO
            users (`login`, `name`, `password`)
            VALUES
            (:new_login, :new_name, :new_password)
        ');
        $statement->execute([
            'new_login' => $new_login,
            'new_name' => $new_name,
            'new_password' => md5($new_password)
        ]);
        return $statement;
    }
}
