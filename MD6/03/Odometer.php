<?php declare(strict_types=1);

class Odometer
{
  private int $mileage;

  public function __construct(int $mileage)
  {
    $this->mileage = $mileage;
  }

  public function getMileage(): int
  {
    return $this->mileage;
  }

  public function addMileage(): void
  {
    if ($this->mileage > 999999) {
      $this->mileage = 0;
    }
    $this->mileage++;
  }
}