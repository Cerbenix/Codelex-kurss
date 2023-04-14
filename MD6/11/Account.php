<?php declare(strict_types=1);

class Account
{
  private string $name;
  private float $balance;

  public function __construct(string $name, float $balance)
  {
    $this->name = $name;
    $this->balance = $balance;
  }

  public function withdrawal(float $amount): void
  {
    $this->balance = $this->balance - $amount;
  }

  public function deposit(int $amount): void
  {
    $this->balance = $this->balance + $amount;
  }

  public function __toString(): string
  {
    return "Account name:{$this->name}, Account balance: {$this->getBalance()}";
  }

  public function getBalance(): string
  {
    return number_format($this->balance, 2);
  }

  public function transfer(Account $from, Account $to, float $howMuch)
  {
    $from->balance = $from->balance - $howMuch;
    $to->balance = $to->balance + $howMuch;
  }
}