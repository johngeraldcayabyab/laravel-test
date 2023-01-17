<?php

namespace OpenClosePrinciple;

class InventoryOperationSequence implements SequenceInterface
{

    public function generate(): string
    {
        return 'INV/0001';
        // TODO: Implement generate() method.
    }
}