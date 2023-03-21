<?php

/*
Exercise 4
Create a non associative array with integers and print out only integers that divides by 3 without any left.
 */

$numbers = [3,6,9,10,11,13];

foreach ($numbers as $number){
  if ($number % 3 === 0){
    echo $number;
    echo PHP_EOL;
  }
}