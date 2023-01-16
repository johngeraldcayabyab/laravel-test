<?php

namespace DependencyInversion;

use DatabaseInterface;

class MySqlDatabase implements DatabaseInterface
{
    public function get()
    {
        // get by id
    }

    public function insert()
    {
        // inserts into db
    }

    public function update()
    {
        // update some values in db
    }

    public function delete()
    {
        // delete some records in db
    }
}