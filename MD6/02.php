<?php declare(strict_types=1);

/*
Write a method named swapPoints that accepts two Points as parameters and swaps their x/y values.
Consider the following example code that calls swapPoints:
The output produced from the above code should be:

(-3, 6)
(5, 2)
 */

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

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")";
echo "(" . $p2->getX() . ", " . $p2->getY() . ")";
