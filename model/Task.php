<?php

namespace app\model;

class Task
{
    private string $uuid;
    private string $user_uuid;
    private string $task_description;
    private string $task_priority;
    private string $task_deadline;
    private string $task_updated;
    private string $task_done;

    public function __construct(string $user_uuid) //исправить 
    {
        $this->user_uuid = $user_uuid;
    }


    /**
     * Get the value of id
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Get the value of user_id
     */
    public function getUser_uuid()
    {
        return $this->user_uuid;
    }

    /**
     * Get the value of task_description
     */
    public function getTask_description()
    {
        return $this->task_description;
    }

    /**
     * Get the value of task_priority
     */
    public function getTask_priority()
    {
        return $this->task_priority;
    }

    /**
     * Get the value of task_deadline
     */
    public function getTask_deadline()
    {
        return $this->task_deadline;
    }

    /**
     * Get the value of task_updated
     */
    public function getTask_updated()
    {
        return $this->task_updated;
    }

    /**
     * Get the value of task_done
     */
    public function getTask_done()
    {
        return $this->task_done;
    }

    /**
     * Set the value of task_description
     *
     * @return  self
     */
    public function setTask_description($task_description)
    {
        $this->task_description = $task_description;

        return $this;
    }

    /**
     * Set the value of task_priority
     *
     * @return  self
     */
    public function setTask_priority($task_priority)
    {
        $this->task_priority = $task_priority;

        return $this;
    }

    /**
     * Set the value of task_updated
     *
     * @return  self
     */
    public function setTask_updated($task_updated)
    {
        $this->task_updated = $task_updated;

        return $this;
    }

    /**
     * Set the value of task_done
     *
     * @return  self
     */
    public function setTask_done($task_done)
    {
        $this->task_done = $task_done;

        return $this;
    }
}
