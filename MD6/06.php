<?php declare(strict_types=1);

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculateEnergyDrinkers(int $numberSurveyed, float $percent): float
{
  return round($numberSurveyed * $percent);
}

function calculatePreferCitrus(int $numberSurveyed, float $percent, float $percentCitrusPreference): float
{
  return round($numberSurveyed * $percent * $percentCitrusPreference);
}


echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . calculateEnergyDrinkers($surveyed, $purchased_energy_drinks) .
  " bought at least one energy drink." . PHP_EOL;
echo calculatePreferCitrus($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks) . " of those " .
  "prefer citrus flavored energy drinks.";