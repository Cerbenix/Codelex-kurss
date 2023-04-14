<?php declare(strict_types=1);

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
