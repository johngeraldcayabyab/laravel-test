<?php

interface DatabaseInterface
{
    public function get();
    public function insert();
    public function update();
    public function delete();
}