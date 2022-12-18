<?php

namespace app\model\Files;

class File
{
    private string $uuid;
    private string $name;
    private string $path;
    private string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?string $comment;
    private string $sort_order;

    /**
     * Get the value of uuid
     */
    public function getUuid()
    {
        return $this->uuid;
    }


    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Get the value of deleted_at
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Get the value of sort_order
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }
}
