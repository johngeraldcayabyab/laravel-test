<?php

use InterfaceSegregation\Magpie;
use InterfaceSegregation\Peasant;
use InterfaceSegregation\PeasantBirdHybrid;

$peasant = new Peasant();
$peasant->walk();
$peasant->talk();


$magpie = new Magpie();
$magpie->fly();


$peasantBirdHybrid = new PeasantBirdHybrid();
$peasantBirdHybrid->fly();
$peasantBirdHybrid->walk();
$peasantBirdHybrid->talk();