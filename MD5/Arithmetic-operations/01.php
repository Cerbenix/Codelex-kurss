<?php declare(strict_types=1);

//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

$first = (int)readline('Input 1st number: ');
$second = (int)readline('Input 2st number: ');

function isFifteen(int $num1, int $num2): bool
{
  if ($num1 == 15 || $num2 == 15 || $num1 + $num2 == 15 || abs($num1 - $num2) == 15) {
    echo 'true';
    return true;
  } else {
    echo 'false';
    return false;
  }
}

isFifteen($first, $second);
