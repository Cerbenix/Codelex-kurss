<?php declare(strict_types=1);

require_once 'SavingsAccount.php';

$userStartingBalance = (int)readline('Please input your accounts starting balance: ');
$userAcc = new SavingAccount($userStartingBalance);
$userAnnualInterest = (int)readline('Please input the annual interest rate in percent: ');
$userAcc->setInterestRate($userAnnualInterest);
$userAccountAge = (int)readline('Please input the number of months the account has been open: ');
$userAcc->setAccountAge($userAccountAge);

for ($months = 1; $months <= $userAcc->getAccountAge(); $months++) {
  $monthlyDeposit = (int)readline("How much did you deposit for month: $months : ");
  $monthlyWithdraw = (int)readline("How much did you withdraw for month: $months : ");
  $userAcc->deposit($monthlyDeposit);
  $userAcc->withdraw($monthlyWithdraw);
  $userAcc->addInterest();
}
echo "Total deposited: {$userAcc->getTotalDeposited()}" . PHP_EOL;
echo "Total withdrawal: {$userAcc->getTotalWithdrawn()}" . PHP_EOL;
echo "Interest earned: {$userAcc->getTotalInterestEarned()}" . PHP_EOL;
echo "Ending balance: {$userAcc->getBalance()}";
