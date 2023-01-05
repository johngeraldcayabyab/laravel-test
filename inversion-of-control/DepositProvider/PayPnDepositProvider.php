<?php

class PayPnDepositProvider implements DepositProviderInterface
{
    public function request($depositRequestData)
    {
        print_r($depositRequestData);
        return true;
    }
}