<?php

namespace OpenClosePrinciple;

class PurchaseOrderSequence implements SequenceInterface
{

    public function generate(): string
    {
        return 'PO/0001';
    }
}