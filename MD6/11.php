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
