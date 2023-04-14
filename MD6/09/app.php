<?php declare(strict_types=1);

require_once 'BankAccount.php';

$ben = new BankAccount('Benson', 1750);
$ben->showUserNameAndBalance();