<?php declare(strict_types=1);

class Point
{
  private $x;
  private $y;

  public function __construct($x, $y)
  {
    $this->x = $x;
    $this->y = $y;
  }

  public function swapPoints(object $p1, object $p2): void
  {
    $tempX = $p1->x;
    $tempY = $p1->y;
    $p1->x = $p2->x;
    $p1->y = $p2->y;
    $p2->x = $tempX;
    $p2->y = $tempY;
  }

  public function getX()
  {
    return $this->x;
  }

  public function getY()
  {
    return $this->y;
  }
}