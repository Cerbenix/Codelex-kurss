<?php

/*
 * Exercise 6
Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
Create a for loop that iterates non-associative array using php in-built function that determines count of elements in the array.
Create a function that doubles the integer number.
Within the loop using php in-built function print out the double of the number value (using your custom function).
 */

$elements =[1,2,4,8.8,'sixteen'];

function doubling($number){
  return $number * 2;
}
foreach ($elements as $element){
  count($elements);
  if(is_int($element)){
    echo doubling($element);
    echo PHP_EOL;
  }
}