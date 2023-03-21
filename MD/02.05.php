<?php

/*
Exercise 5
Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
Range should be stored within the 2 separated variables $y and $z.
 */
$number = 50;
$y = 100;
$x = 1;

if($number > $x && $number < $y) {
    echo "correct";
}