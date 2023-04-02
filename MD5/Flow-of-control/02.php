<?php

$number = readline("Enter the number: ");

//todo print if number is positive or negative
if ($number > 0) {
  echo 'Number is positive.';
} elseif ($number == 0) {
  echo 'Number is 0.';
} else {
  echo 'Number is negative.';
}