<?php declare(strict_types=1);

class Video
{

  private string $title;
  private string $avgRating;
  private bool $isCheckedOut;
  private int $numberOfRatings;
  private int $receivedRatings;

  public function __construct(string $title)
  {
    $this->title = $title;
    $this->avgRating = '-';
    $this->isCheckedOut = false;
    $this->numberOfRatings = 0;
    $this->receivedRatings = 0;
  }

  public function checkedOut(): void
  {
    $this->isCheckedOut = true;
  }

  public function returned(): void
  {
    $this->isCheckedOut = false;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getIsCheckedOut(): bool
  {
    return $this->isCheckedOut;
  }

  public function setReceivedRatings(int $receivedRatings): void
  {
    $this->receivedRatings += $receivedRatings;
    $this->numberOfRatings++;
    $this->avgRating = number_format($this->receivedRatings / $this->numberOfRatings, 1);
  }

  public function getAvgRating(): string
  {
    return $this->avgRating;
  }
}