<?php declare(strict_types=1);

class FuelGauge
{
  private int $fuelAmount;

  public function __construct(int $fuelAmount)
  {
    if ($fuelAmount > 70) {
      $fuelAmount = 70;
    } elseif ($fuelAmount < 0) {
      $fuelAmount = 0;
    }
    $this->fuelAmount = $fuelAmount;
  }

  public function getFuelAmount(): int
  {
    return $this->fuelAmount;
  }

  public function addFuel(): void
  {
    if ($this->fuelAmount < 70) {
      $this->fuelAmount++;
    }
  }

  public function burnFuel(): void
  {
    if ($this->fuelAmount > 0) {
      $this->fuelAmount--;
    }
  }
}