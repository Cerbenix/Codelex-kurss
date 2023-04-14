<?php declare(strict_types=1);

class car
{
  private object $fuelGauge;
  private object $odometer;
  private int $fuelEconomy;

  public function __construct(FuelGauge $fuelGauge, Odometer $odometer, int $fuelEconomy)
  {
    $this->fuelGauge = $fuelGauge;
    $this->odometer = $odometer;
    $this->fuelEconomy = $fuelEconomy;
  }

  public function driving(): void
  {
    for ($km = 0; $km < $this->fuelEconomy; $km++) {
      $this->odometer->addMileage();
    }
    $this->fuelGauge->burnFuel();
  }

  public function getFuelGauge(): object
  {
    return $this->fuelGauge;
  }

  public function getOdometer(): object
  {
    return $this->odometer;
  }
}