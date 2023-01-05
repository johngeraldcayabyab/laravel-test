<?php


use Model\Player;

$depositRequestData = [
    'name' => 'John Doe',
    'bank_name' => 'Metrobank',
    'bank_account_number' => '1212121212',
    'amount' => 10000,
    'player_category' => 1,
];

function depositRequest(array $depositRequestData)
{
    $depositProvider = null;
    if ($depositRequestData['player_category'] === Player::CHAIN) {
        $depositProvider = new JakeDepositProvider();
    } elseif ($depositRequestData['player_category'] === Player::MAN) {
        $depositProvider = new PayPnDepositProvider();
    } elseif ($depositRequestData['player_category'] === Player::SAW) {
        $depositProvider = new AutoPayDepositProvider();
    }
    $depositRequest = new DepositRequest($depositProvider);
    $depositRequest->deposit($depositRequestData);
}

depositRequest($depositRequestData);
