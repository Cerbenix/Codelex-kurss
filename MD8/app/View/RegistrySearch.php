<?php declare(strict_types=1);

namespace App\View;

class RegistrySearch
{
  public function inquire(): int
  {
    return (int)readline('Input registry code: ');
  }

  public function outputResults(object $report): void
  {
    foreach ($report as $key => $value) {
      if($key == "birthDate" && strpos($value, '*')){
        $value = str_replace(['-', '*'], '', $value);
        $value = date_create_from_format('dmy', $value)->format('d.m.y');
      }
      $cleanValue = str_replace('"', "'", $value);
      $cleanKey = ucfirst(preg_replace('/(?<!\ )[A-Z]/', ' $0', $key));
      echo "$cleanKey : $cleanValue" . PHP_EOL;
    }
  }

  public function displayOptions(): int
  {
    echo "=====================================================\n";
    echo "Choose the operation you want to perform \n";
    echo "Choose 0 for EXIT\n";
    echo "Choose 1 to find information about business\n";
    echo "Choose 2 to find information about business owner\n";
    echo "Choose 3 to find all\n";
    return (int)readline('Input: ');
  }

  public function die(): void
  {
    echo "Bye Bye!";
  }

  public function invalidInput(): void
  {
    echo "Invalid input, try again.";
  }
}