<?php declare(strict_types=1);

/*
For this exercise, you will design a set of classes that work together to simulate a car's fuel gauge and odometer.
The classes you will design are the following:

The FuelGauge Class: This class will simulate a fuel gauge. Its responsibilities are as follows:
To know the car’s current amount of fuel, in liters.
To report the car’s current amount of fuel, in liters.
To be able to increment the amount of fuel by 1 liter. This simulates putting fuel in the car.
( The car can hold a maximum of 70 liters.)
To be able to decrement the amount of fuel by 1 liter, if the amount of fuel is greater than 0 liters.
This simulates burning fuel as the car runs.

The Odometer Class: This class will simulate the car’s odometer. Its responsibilities are as follows:
To know the car’s current mileage.
To report the car’s current mileage.
To be able to increment the current mileage by 1 kilometer. The maximum mileage the odometer can store
is 999,999 kilometer. When this amount is exceeded, the odometer resets the current mileage to 0.
To be able to work with a FuelGauge object. It should decrease the FuelGauge object’s current amount of fuel by
1 liter for every 10 kilometers traveled. (The car’s fuel economy is 10 kilometers per liter.)
Demonstrate the classes by creating instances of each. Simulate filling the car up with fuel, and then run a
loop that increments the odometer until the car runs out of fuel. During each loop iteration, print the car’s
current mileage and amount of fuel.
 */

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

$car = new car(new FuelGauge(10), new Odometer(0), 20);
$fillUp = 10;
echo 'Fill up => ';
for ($l = 0; $l < $fillUp; $l++) {
  $car->getFuelGauge()->addFuel();
  echo $car->getFuelGauge()->getFuelAmount() . ';';
}
while ($car->getFuelGauge()->getFuelAmount() != 0) {
  $car->driving();
  echo "Fuel amount => {$car->getFuelGauge()->getFuelAmount()}" . PHP_EOL;
  echo "Odometer => {$car->getOdometer()->getMileage()}" . PHP_EOL;
}
