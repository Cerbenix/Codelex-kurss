<?php declare(strict_types=1);

class Video
{

  private string $title;
  private array $ratings;
  private bool $available;


  public function __construct(string $title)
  {
    $this->title = $title;
    $this->ratings = [];
    $this->available = true;
  }

  public function setAvailable(bool $bool): void
  {
    $this->available = $bool;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getAvailable(): bool
  {
    return $this->available;
  }

  public function receiveRating(int $receivedRating): void
  {
    $this->ratings[] = $receivedRating;
  }

  public function getAvgRating(): float
  {
    if (count($this->ratings) != 0) {
      return array_sum($this->ratings) / count($this->ratings);
    }
    return 0;
  }
}