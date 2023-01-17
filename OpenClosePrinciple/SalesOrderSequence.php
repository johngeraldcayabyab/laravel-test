<?php

namespace OpenClosePrinciple;

class SalesOrderSequence implements SequenceInterface
{

    public function generate()
    {
        echo 'SO/0001';
    }
}