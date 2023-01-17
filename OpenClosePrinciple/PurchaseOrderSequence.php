<?php

namespace OpenClosePrinciple;

class PurchaseOrderSequence implements SequenceInterface
{

    public function generate()
    {
        echo 'PO/0001';
    }
}