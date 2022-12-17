<?php

namespace granal1\scrum\model;

class UUID
{

    public function __construct(
        private string $uuidString
    ) 
    {
/* Выдает ошибку, если не верный uuid

        if (!uuid_is_valid($uuidString)) {
            throw new InvalidArgumentException(
                "Malformed UUID: $this->uuidString"
            );
        }
        
*/
    }

    public static function random(): self
    {
        return new self(uuid_create(UUID_TYPE_RANDOM));
    }

    public function __toString(): string
    {
        return $this->uuidString;
    }


    /**
     * Get the value of uuidString
     */ 
    public function getUuidString()
    {
            return $this->uuidString;
    }
}