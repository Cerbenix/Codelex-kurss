<?php declare(strict_types=1);

class BankAccount
{
  private string $name;
  private int $balance;

  public function __construct(string $name, int $balance)
  {
    $this->name = $name;
    $this->balance = $balance;
  }

  public function showUserNameAndBalance(): void
  {
    echo "{$this->name}, " . ($this->balance < 0 ? '-' : '') . '$'
      . number_format(abs($this->balance / 100), 2);
  }
}