<?php

use Symfony\Polyfill\Uuid\Uuid;

$pdo = require ROOT . '/db.php';

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTasks(string $user_uuid): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM `tasks_old` 
            WHERE user_uuid = :user_uuid'
        );
        $statement->execute([
            'user_uuid' => $user_uuid
        ]);
        $result = [];
        while ($row = $statement->fetchObject(Task::class, [$user_uuid])) {
            $result[] = $row;
        }
        return $result ?: null;
    }

    public function getOneTask(string $user_uuid, string $uuid): ?Task
    {


        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM tasks_old 
            WHERE `user_uuid` = :user_uuid
            AND `uuid` = :uuid'
        );
        $statement->execute([
            'user_uuid' => $user_uuid,
            'uuid' => $uuid
        ]);
        $result = $statement->fetchObject(Task::class, [$user_uuid]);
        return $result ?: null;
    }

    public function getUndoneTasks(string $user_uuid): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT * 
            FROM tasks_old 
            WHERE `user_uuid` = :user_uuid
            AND `task_done` < :task_done'
        );
        $statement->execute([
            'user_uuid' => $user_uuid,
            'task_done' => 100
        ]);
        $result = [];
        while ($row = $statement->fetchObject(Task::class, [$user_uuid])) {
            $result[] = $row;
        }
        return $result ?: null;
    }

    public function setIsDone(string $uuid)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks_old
            SET 
            `task_done` = 1,
            `task_updated` =datetime()
            WHERE `uuid` = :uuid
        '
        );
        $statement->execute([
            'uuid' => $uuid
        ]);
        return $statement;
    }

    public function setUnDone(string $uuid)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks_old
            SET 
            `task_done` = 0,
            `task_updated` =datetime()
            WHERE `uuid` = :uuid
        '
        );
        $statement->execute([
            'uuid' => $uuid
        ]);
        return $statement;
    }

    public function setAddTask(string $uuid, string $newTaskDescription, string $newTaskPriority, string $newTaskDeadline, string $newTaskDone)
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO
            tasks_old (`uuid`, 
                    `user_uuid`, 
                    `task_description`, 
                    `task_priority`, 
                    `task_deadline`,
                    `task_updated`, 
                    `task_done`
                )
            VALUES (:uuid, 
                :user_uuid, 
                :task_description, 
                :task_priority, 
                :task_deadline, 
                datetime(), 
                :task_done
            )
        '
        );
        $result = $statement->execute([
            'uuid' => $uuid,
            'user_uuid' => $_SESSION['user']->getUuid(),
            'task_description' => $newTaskDescription,
            'task_priority' => $newTaskPriority,
            'task_deadline' => $newTaskDeadline,
            'task_done' => $newTaskDone
        ]);
        $lastUuid = $uuid;
        return $lastUuid;
    }

    public function setUpdateTask(string $uuid, string $newTaskDescription, string $newTaskPriority, string $newTaskDeadline, string $newTaskDone)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks_old
            SET 
            `task_description` = :task_description,
            `task_priority` = :task_priority,
            `task_deadline` = :task_deadline,
            `task_updated` = datetime(),
            `task_done` = :task_done
            WHERE `uuid` = :uuid
        '
        );
        $statement->execute([
            'uuid' => $uuid,
            'task_description' => $newTaskDescription,
            'task_priority' => $newTaskPriority,
            'task_deadline' => $newTaskDeadline,
            'task_done' => $newTaskDone
        ]);
        return $uuid;
    }
}
