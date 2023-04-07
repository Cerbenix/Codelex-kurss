<?php declare(strict_types=1);

/*
Create a class called Date that includes: three pieces of information as instance variables — a month, a day and a year.

Your class should have a constructor that initializes the three instance variables and assumes that the values
provided are correct. Provide a set and a get for each instance variable.

Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.

Write a test application named DateTest that demonstrates class Date capabilities.
 */

class Date
{
  private string $month;
  private string $day;
  private string $year;

  public function __construct(string $day, string $month, string $year)
  {
    $this->month = $month;
    $this->day = $day;
    $this->year = $year;
  }

  public function getDay(): string
  {
    return $this->day;
  }

  public function setDay(string $day): void
  {
    $this->day = $day;
  }

  public function getMonth(): string
  {
    return $this->month;
  }

  public function setMonth(string $month): void
  {
    $this->month = $month;
  }

  public function getYear(): string
  {
    return $this->year;
  }

  public function setYear(string $year): void
  {
    $this->year = $year;
  }

  public function DisplayDate(): void
  {
    echo "{$this->day}/{$this->month}/{$this->year}";
  }
}

$CurrDate = new Date('05', '30', '2022');
echo $CurrDate->getDay() . '/';
echo $CurrDate->getMonth() . '/';
echo $CurrDate->getYear() . PHP_EOL;

$CurrDate->setDay('06');
$CurrDate->setMonth('04');
$CurrDate->setYear('2023');

$CurrDate->DisplayDate();
