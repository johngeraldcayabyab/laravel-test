<?php

namespace OpenClosePrinciple;

class SequenceGenerator
{
    public function generate(SequenceInterface $sequence): string
    {
        return $sequence->generate();
    }
}