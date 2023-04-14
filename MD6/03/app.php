<?php declare(strict_types=1);

require_once 'FuelGauge.php';
require_once 'Odometer.php';
require_once 'Car.php';

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
