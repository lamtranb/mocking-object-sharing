<?php

namespace MockSharing;

class Person
{
    public Database $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function greeting(int $personId): string
    {
        $friend = $this->database->getPersonById($personId);

        $friendName = $friend->name;

        return 'Hello ' . $friendName;
    }
}