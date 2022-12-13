<?php

$pdo = require 'db.php';

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTasks(string $user_id): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM `tasks` 
            WHERE user_id = :user_id'
        );
        $statement->execute([
            'user_id' => $user_id
        ]);
        $result = [];
        while($row = $statement->fetchObject(Task::class, [$user_id])){
            $result[] = $row;
        }
        return $result ?: null;
    }
  
    public function getOneTask(string $user_id, string $id): ?Task
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM tasks 
            WHERE `user_id` = :user_id
            AND `id` = :id'
        );
        $statement->execute([
            'user_id' => $user_id,
            'id' => $id
        ]);
        $result = $statement->fetchObject(Task::class, [$user_id]);
        return $result ?: null;
    }

    public function getUndoneTasks(string $user_id): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM tasks 
            WHERE `user_id` = :user_id
            AND `task_done` < :task_done'
        );
        $statement->execute([
            'user_id' => $user_id,
            'task_done' => 100
        ]);
        $result = [];
        while($row = $statement->fetchObject(Task::class, [$user_id])){
            $result[] = $row;
        }
        return $result ?: null;
    }

    public function setIsDone(string $id)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks
            SET 
            `task_done` = 1,
            `task_updated` =datetime()
            WHERE `id` = :id
        ');
        $statement->execute([
            'id' => $id
        ]);
        return $statement;
    }

    public function setUnDone(string $id)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks
            SET 
            `task_done` = 0,
            `task_updated` =datetime()
            WHERE `id` = :id
        ');
        $statement->execute([
            'id' => $id
        ]);
        return $statement;
    }

    public function setAddTask(string $newTaskDescription, string $newTaskPriority, string $newTaskDeadline, string $newTaskDone)
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO
            tasks (`user_id`, `task_description`, `task_priority`, `task_deadline`,`task_updated`, `task_done`)
            VALUES
            (:user_id, :task_description, :task_priority, :task_deadline, datetime(), :task_done)
        ');
        $result = $statement->execute([
            'user_id' => $_SESSION['user']->getId(),
            'task_description' => $newTaskDescription,
            'task_priority' => $newTaskPriority,
            'task_deadline' => $newTaskDeadline,
            'task_done' => $newTaskDone
        ]);
        $lastId = $this->pdo->lastInsertId();
        return $lastId;
    }

    public function setUpdateTask(string $id, string $newTaskDescription, string $newTaskPriority, string $newTaskDeadline, string $newTaskDone)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks
            SET 
            `task_description` = :task_description,
            `task_priority` = :task_priority,
            `task_deadline` = :task_deadline,
            `task_updated` = datetime(),
            `task_done` = :task_done
            WHERE `id` = :id
        ');
        $statement->execute([
            'id' => $id,
            'task_description' => $newTaskDescription,
            'task_priority' => $newTaskPriority,
            'task_deadline' => $newTaskDeadline,
            'task_done' => $newTaskDone
        ]);
        return $id;
    }

}