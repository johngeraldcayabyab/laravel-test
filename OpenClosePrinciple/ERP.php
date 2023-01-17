<?php

namespace OpenClosePrinciple;

class ERP
{
    public function run(): void
    {
        $salesOrder = new SalesOrder();
        $sequenceGenerator = new SequenceGenerator();
        $sequence = $sequenceGenerator->generate(new SalesOrderSequence());
        $salesOrder = $salesOrder->create([
            'sequence' => $sequence
        ]);

        print_r($salesOrder);
    }
}