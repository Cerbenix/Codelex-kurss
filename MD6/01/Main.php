<?php declare(strict_types=1);

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