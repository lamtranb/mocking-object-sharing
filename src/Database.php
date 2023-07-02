<?php

namespace MockSharing;
class Database
{
    public array $pepple = [
        1 => [
            'name' => 'John',
        ],
        2 => [
            'name' => 'Vanessa',
        ],
    ];

    public function getPersonById(int $id): \stdClass
    {
        // Call to database.
        return (object) $this->pepple[$id];
    }
}