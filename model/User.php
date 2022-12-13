<?php

class User
{
    private string $id;
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
    public function getId()
    {
        return $this->id;
    }
}