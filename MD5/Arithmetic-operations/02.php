<?php declare(strict_types=1);

/*
Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number”
otherwise. The program shall always print “bye!” before exiting.
 */

function CheckOddEven(int $num): void
{
  if ($num % 2 == 0 || $num == 0) {
    echo 'Even Number';
  } else {
    echo 'Odd Number';
  }
  echo PHP_EOL . 'bye!';
}

CheckOddEven(5);