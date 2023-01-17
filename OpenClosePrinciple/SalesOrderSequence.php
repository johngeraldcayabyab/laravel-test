<?php

namespace OpenClosePrinciple;

class SalesOrderSequence implements SequenceInterface
{
    public function generate(): string
    {
        return 'SO/0001';
    }
}