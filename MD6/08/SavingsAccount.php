<?php declare(strict_types=1);

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