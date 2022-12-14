<?php

$pdo = new PDO('sqlite:database.db');

//===========================================
// users
//===========================================

$pdo->exec('DROP TABLE IF EXISTS users;
');

$pdo->exec('CREATE TABLE users (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    login VARCHAR(100) NOT NULL unique,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) not null,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL
)');

$pdo->exec('DROP TABLE IF EXISTS roles;
');

$pdo->exec('CREATE TABLE roles (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL unique,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1
)');

$pdo->exec('INSERT INTO roles ( uuid, name ) 
                                VALUES ( "266839fe-4517-4651-8790-673917d417b1", "admin" ) ');

$pdo->exec('DROP TABLE IF EXISTS user_role;');

$pdo->exec('CREATE TABLE user_role (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    user_id VARCHAR(255) NOT NULL,
    role_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1,
    FOREIGN KEY(user_id) REFERENCES users(uuid),
    FOREIGN KEY(role_id) REFERENCES roles(uuid)
)');

$pdo->exec('DROP TABLE IF EXISTS user_subordinate;');

$pdo->exec('CREATE TABLE user_subordinate (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    user_id VARCHAR(255) NOT NULL,
    chief_id VARCHAR(255) NOT NULL,
    confidant_id VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1,
    FOREIGN KEY(user_id) REFERENCES users(uuid),
    FOREIGN KEY(chief_id) REFERENCES users(uuid),
    FOREIGN KEY(confidant_id) REFERENCES users(uuid)
)');

//==================================================
// files
// =================================================

$pdo->exec('DROP TABLE IF EXISTS files;
');

$pdo->exec('CREATE TABLE files (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1
)');

//==================================================
// tasks
// =================================================

$pdo->exec('DROP TABLE IF EXISTS task_priorities;
');

$pdo->exec('CREATE TABLE task_priorities (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1
)');

$pdo->exec('INSERT INTO task_priorities ( uuid, name ) 
                                VALUES ( "70b60930-4812-445d-9774-0b12070e66aa", "самый низкий" ) ');

$pdo->exec('INSERT INTO task_priorities ( uuid, name ) 
                                VALUES ( "634304f1-3938-4854-9196-65dca7cd9838", "низкий" ) ');

$pdo->exec('INSERT INTO task_priorities ( uuid, name ) 
                                VALUES ( "c1160649-4193-46c6-9352-118f1dfa46b0", "средний" ) ');

$pdo->exec('INSERT INTO task_priorities ( uuid, name ) 
                                VALUES ( "1077fd6d-2835-44d5-ab84-1e49402af1fd", "высокий" ) ');

$pdo->exec('INSERT INTO task_priorities ( uuid, name ) 
                                VALUES ( "8351be77-690b-4a10-9bd2-884a9899f094", "самый высокий" ) ');

$pdo->exec('DROP TABLE IF EXISTS tasks;
');

$pdo->exec('CREATE TABLE tasks (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    description text NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1
)');

$pdo->exec('DROP TABLE IF EXISTS task_histories;
');

$pdo->exec('CREATE TABLE task_histories (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    priority_id VARCHAR(255) NOT NULL,
    parent_id VARCHAR(255) DEFAULT NULL,
    user_id VARCHAR(255) NOT NULL,
    responsible_id VARCHAR(255) NOT NULL,
    done_progress INTEGER DEFAULT NULL,
    deadline_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1,
    FOREIGN KEY(priority_id) REFERENCES task_priorities(uuid),
    FOREIGN KEY(user_id) REFERENCES users(uuid),
    FOREIGN KEY(responsible_id) REFERENCES users(uuid),
    FOREIGN KEY(parent_id) REFERENCES tasks(uuid)
)');

$pdo->exec('DROP TABLE IF EXISTS task_files;
');

$pdo->exec('CREATE TABLE task_files (
    uuid VARCHAR(255) PRIMARY KEY NOT NULL,
    task_id VARCHAR(255) NOT NULL,
    file_id VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT NULL,
    deleted_at TIMESTAMP DEFAULT NULL,
    comment text DEFAULT NULL,
    sort_order INTEGER DEFAULT 1,
    FOREIGN KEY(task_id) REFERENCES tasks(uuid),
    FOREIGN KEY(file_id) REFERENCES files(uuid)
)');




