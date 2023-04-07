<?php declare(strict_types=1);

/*
Design a SavingsAccount class that stores a savings account’s annual interest rate and balance.

The class constructor should accept the amount of the savings account’s starting balance.
The class should also have methods for:
subtracting the amount of a withdrawal
adding the amount of a deposit
adding the amount of monthly interest to the balance
The monthly interest rate is the annual interest rate divided by twelve.
To add the monthly interest to the balance, multiply the monthly interest rate by the balance,
and add the result to the balance.

Test the class in a program that calculates the balance of a savings account at the end of a period of time.
It should ask the user for the annual interest rate, the starting balance, and the number of months that have
passed since the account was established. A loop should then iterate once for every month, performing the following:

Ask the user for the amount deposited into the account during the month.
Use the class method to add this amount to the account balance.
Ask the user for the amount withdrawn from the account during the month.
Use the class method to subtract this amount from the account balance.
Use the class method to calculate the monthly interest.
After the last iteration, the program should display the ending balance, the total amount of deposits,
the total amount of withdrawals, and the total interest earned.
 */

class SavingAccount
{
  private float $balance;
  private int $totalWithdrawn;
  private int $totalDeposited;
  private int $annualInterestRate;
  private int $accountAge;
  private float $totalInterestEarned;

  public function __construct(int $balance)
  {
    $this->balance = $balance;
    $this->totalDeposited = 0;
    $this->totalWithdrawn = 0;
    $this->totalInterestEarned = 0;
  }

  public function withdraw(int $withdrawalAmount): void
  {
    $this->totalWithdrawn += $withdrawalAmount;
    $this->balance -= $withdrawalAmount;
  }

  public function deposit(int $depositAmount): void
  {
    $this->balance += $depositAmount;
    $this->totalDeposited += $depositAmount;
  }

  public function setInterestRate(int $annualInterestRate): void
  {
    $this->annualInterestRate = $annualInterestRate;
  }

  public function addInterest(): void
  {
    $interest = round($this->balance * ($this->annualInterestRate / 12 / 100), 2);
    $this->balance += $interest;
    $this->totalInterestEarned += $interest;
  }

  public function getTotalDeposited(): string
  {
    return number_format($this->totalDeposited, 2, '.', "'");
  }

  public function getTotalWithdrawn(): string
  {
    return number_format($this->totalWithdrawn, 2, '.', "'");
  }

  public function getTotalInterestEarned(): string
  {
    return number_format($this->totalInterestEarned, 2, '.', "'");
  }

  public function getBalance(): string
  {
    return number_format($this->balance, 2, '.', "'");
  }

  public function getAccountAge(): int
  {
    return $this->accountAge;
  }

  public function setAccountAge(int $accountAge): void
  {
    $this->accountAge = $accountAge;
  }
}

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
