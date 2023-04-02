<?php declare(strict_types=1);

function GravityCalc(int $time, int $initialVelocity = null, int $initialPosition = null): void
{
  $acceleration = -981;
  $x = 0.5 * $acceleration * pow($time, 2) + $initialVelocity * $time + $initialPosition;
  echo $x / 100;
}

GravityCalc(10);