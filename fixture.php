<?php

$pdo = new PDO('sqlite:database.db');

$pdo->exec('DROP TABLE IF EXISTS users;
');

$pdo->exec('CREATE TABLE users (
    uuid varchar(255) primary key not null,
    login VARCHAR(100) NOT NULL unique,
    name VARCHAR(100) NOT NULL,
    email varchar(100) not null,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp default null,
    deleted_at timestamp default null,
    comment text default null
)');

$pdo->exec('DROP TABLE IF EXISTS roles;
');

$pdo->exec('CREATE TABLE roles (
    uuid varchar(255) primary key not NULL,
    name VARCHAR(100) NOT NULL unique,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT NULL,
    deleted_at timestamp DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1
)');

$pdo->exec('INSERT INTO roles ( uuid, name ) 
                                VALUES ( "266839fe-4517-4651-8790-673917d417b1", "admin" ) ');

$pdo->exec('DROP TABLE IF EXISTS user_role;
');

$pdo->exec('CREATE TABLE user_role (
    uuid varchar(255) primary key not NULL,
    user_id varchar(255) not null,
    role_id varchar(255) not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT NULL,
    deleted_at timestamp DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1,
    FOREIGN KEY(user_id) REFERENCES users(uuid),
    FOREIGN KEY(role_id) REFERENCES roles(uuid)
)');
