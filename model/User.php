<?php

namespace app\model;

class User
{
    private string $uuid;
    private string $login;
    private string $name;
    private string $password;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function getUsername(): string
    {
        return $this->name;
    }

    /**
     * Get the value of id
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}
