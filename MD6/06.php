<?php declare(strict_types=1);

/*
A soft drink company recently surveyed 12,467 of its customers and found that approximately 14 percent of
those surveyed purchase one or more energy drinks per week. Of those customers who purchase energy drinks,
approximately 64 percent of them prefer citrus flavored energy drinks.

Write a program that displays the following:

The approximate number of customers in the survey who purchased one or more energy drinks per week
The approximate number of customers in the survey who prefer citrus flavored energy drinks
 */

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed, float $percent): float
{
  return round($numberSurveyed * $percent);
}

function calculate_prefer_citrus(int $numberSurveyed, float $percent, float $percentCitrusPreference): float
{
  return round($numberSurveyed * $percent * $percentCitrusPreference);
}


echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . calculate_energy_drinkers($surveyed, $purchased_energy_drinks) .
  " bought at least one energy drink." . PHP_EOL;
echo calculate_prefer_citrus($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks) . " of those " .
  "prefer citrus flavored energy drinks.";