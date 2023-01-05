<?php

interface DepositProviderInterface
{
    public function request(array $depositRequestData);
}