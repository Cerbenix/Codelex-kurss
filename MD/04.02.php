<?php

/*
Exercise 2
Create an array with integers (up to 10) and print them out using for loop.
 */
$numbers = [1,2,4,8,16,32,64,128];

for ($i = 0; $i<=count($numbers);$i++){
  echo $numbers[$i];
  echo PHP_EOL;
}