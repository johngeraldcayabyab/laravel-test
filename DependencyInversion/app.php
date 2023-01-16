<?php

use DependencyInversion\BudgetReport;
use DependencyInversion\MySqlDatabase;

$mysqlDb = new MySqlDatabase();
$budgedReport = new BudgetReport($mysqlDb);

$mongoDb = new MongoDatabase();
$budgedReport = new BudgetReport($mongoDb);

