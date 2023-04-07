<?php declare(strict_types=1);

/*
Add the following method:

function show_user_name_and_balance() { }
Your method should return a string that contains the account's name and balance separated by a comma and space.
For example, if an account object named ben has the name "Benson" and a balance of 17.25,
the call of ben.show_user_name_and_balance() should return:

Benson, $17.25
There are some special cases you should handle. If the balance is negative, put the - sign before the dollar sign.
Also, always display the cents as a two-digit number. For example, if the same object had a balance of -17.5,
your method should return:

Benson, $17.50
 */

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

$ben = new BankAccount('Benson', 1750);
$ben->showUserNameAndBalance();