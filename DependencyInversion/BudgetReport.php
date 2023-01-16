<?php

namespace DependencyInversion;

use DatabaseInterface;

class BudgetReport
{
    public $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
    }

    public function open()
    {
        $this->database->get();
    }

    public function save()
    {
        $this->database->insert();
    }
}