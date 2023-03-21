<?php

/*
Exercise 6
Create a variable $plateNumber that stores your car plate number. Create a switch statement
that prints out that its your car in case of your number.
 */
$plateNumber = "EU1377";

switch($plateNumber){
  case 'EU1377':
    echo 'Its your car';
    break;
  default:
    echo 'Its not your car';
}
