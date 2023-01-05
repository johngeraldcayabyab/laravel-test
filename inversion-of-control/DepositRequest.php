<?php

class DepositRequest
{
    private DepositProviderInterface $depositProvider;

    public function __construct(DepositProviderInterface $depositProvider)
    {
        $this->depositProvider = $depositProvider;
    }

    public function deposit(array $depositRequestData)
    {
        return $this->depositProvider->request($depositRequestData);
    }
}