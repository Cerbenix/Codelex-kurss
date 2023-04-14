<?php

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