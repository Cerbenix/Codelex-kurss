<?php

/*
Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
Take note that it is the same as factorial of N.
*/
$number = 10;

function Factorial($num)
{
  $factorial = 1;
  for ($i = 1; $i <= $num; $i++) {
    $factorial = $factorial * $i;
  }
  echo $factorial;
}

Factorial($number);