<?php declare(strict_types=1);

require_once 'Account.php';

$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartos_account . PHP_EOL;
echo $bartos_swiss_account . PHP_EOL;

$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->getBalance() . PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: " . $bartos_swiss_account->getBalance() . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartos_account . PHP_EOL;
echo $bartos_swiss_account . PHP_EOL;

echo '--------------------------------------------------------------------------' . PHP_EOL;

$A = new Account('A', 100.0);
$B = new Account('B', 0);
$C = new Account('C', 0);
$A->transfer($A, $B, 50);
$B->transfer($B, $C, 25);
echo $A . PHP_EOL . $B . PHP_EOL . $C . PHP_EOL;
