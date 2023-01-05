<?php

class AutoPayDepositProvider implements DepositProviderInterface
{

    public function request(array $depositRequestData)
    {
        print_r($depositRequestData);
        return true;
    }
}