<?php

/*
Write a program which prints “Sunday”, “Monday”, ... “Saturday” if the int variable "dayNumber" is 0, 1, ..., 6,
respectively. Otherwise, it shall print "Not a valid day".
Use:
a "nested-if" statement
a "switch-case-default" statement.
 */

$dayNumber = rand(0, 10);

if ($dayNumber <= 6) {
  switch ($dayNumber) {
    case 0:
      echo 'Monday';
      break;
    case 1:
      echo 'Tuesday';
      break;
    case 2:
      echo 'Wednesday';
      break;
    case 3:
      echo 'Thursday';
      break;
    case 4:
      echo 'Friday';
      break;
    case 5:
      echo 'Saturday';
      break;
    case 6:
      echo 'Sunday';
      break;
    default:
      echo 'Not a valid day';
  }
}