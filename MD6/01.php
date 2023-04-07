<?php declare(strict_types=1);

/*
Create a class Product that represents a product sold in a shop. A product has a price, amount and name.

The class should have:

A constructor Product  __construct(string name, float startPrice, int amount)
A function printProduct() that prints a product in the following form:
Banana, price 1.1, amount 13
Test your code by creating a class with main method and add three products there:

"Logitech mouse", 70.00 EUR, 14 units
"iPhone 5s", 999.99 EUR, 3 units
"Epson EB-U05", 440.46 EUR, 1 units
Print out information about them.

Add new behaviour to the Product class:

possibility to change quantity
possibility to change price
Reflect your changes in a working application.
 */

class Product
{

  private string $name;
  private float $startPrice;
  private int $amount;

  public function __construct(string $name, float $startPrice, int $amount)
  {
    $this->name = $name;
    $this->startPrice = $startPrice;
    $this->amount = $amount;
  }

  public function printProduct(): string
  {
    $conv = $this->startPrice / 100;
    return "$this->name, price $$conv, amount $this->amount";
  }

  public function changeAmount(int $newAmount): void
  {
    $this->amount = $newAmount;
  }

  public function changePrice(int $newPrice): void
  {
    $this->startPrice = $newPrice;
  }
}

class Main
{
  private array $products = [];

  public function main()
  {
    $this->products = [
      new Product('Logitech mouse', 7000, 14),
      new Product('iPhone 5s', 99999, 3),
      new Product('Epson EB-U05', 44046, 1),
    ];
  }

  public function getProducts(): array
  {
    return $this->products;
  }
}

$store = new Main;
$productList = $store->getProducts();

foreach ($productList as $product) {
  echo $product->printProduct() . PHP_EOL;
}

$productList[0]->changePrice(7500);
$productList[1]->changeAmount(10);

echo '-----------Updated----------' . PHP_EOL;

foreach ($productList as $product) {
  echo $product->printProduct() . PHP_EOL;
}