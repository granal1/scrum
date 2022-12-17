<?php

$pdo = new PDO('sqlite:database.db');

$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    login VARCHAR(150) NOT NULL,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)');

$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    user_id VARCHAR(150),
    task_description TEXT NOT NULL,
    task_priority INTEGER,
    task_updated TEXT,
    task_done TINYINT
)');